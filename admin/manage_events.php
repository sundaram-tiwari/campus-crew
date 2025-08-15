<?php
session_start();
include "config/db_connect.php";
include "../config/constant.php";

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$start = 0;
$page = 1;

$srno = 1;
$records = mysqli_query($conn, "SELECT * FROM events");
$num_of_rows = $records->num_rows;
$pages = ceil($num_of_rows / PAGINATION_LIMIT);
if (isset($_GET['page-no']) && is_numeric($_GET['page-no'])) {
    $page = max(1, min($pages, intval($_GET['page-no'])));
    $start = ($page - 1) * PAGINATION_LIMIT;
    $srno = $start + 1;
}

$limit = PAGINATION_LIMIT;

$sql = "SELECT * FROM events LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <link rel="stylesheet" href="assets/css/manage_events.css">
</head>

<body>
      <?php $page_id = "events"; ?>
    <?php include "includes/admin_sidebar.php"; ?>
    <main class="main-content">
        <header class="topbar">
            <h1>Manage Events</h1>
            <a href="add_events.php" class="btn-add">+ Add New Event</a>
        </header>

        <section class="event-section">
            <div class="search-box">
                <input type="text" placeholder="Search events..." id="searchInput">
                <button>Search</button>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>SR No</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Category</th>
                            <th>Course</th>
                            <th>Target Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    echo $srno;
                                    $srno++;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $row["title"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["event_date"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["event_time"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["category"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["target_course"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["target_year"]; ?>
                                </td>
                                <td> <a href="edit_event.php?id=101" class="btn-edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="delete_event.php?id=101" class="btn-delete"
                                        onclick="return confirm('Delete this event?')">
                                        <i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                <?php if ($page > 1) { ?>
                    <a href="?page-no=<?php echo $page - 1; ?>" class="page-link">Prev
                    <?php } else { ?>
                        <a href="#" class="page-link disabled">Prev</a>
                    </a>
                <?php } ?>

                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                    <a href="?page-no=<?php echo $i; ?>"
                        class="page-link <?php echo ($i == $page) ? 'active' : '' ?>"><?php echo $i; ?></a>
                <?php } ?>

                <?php if ($page < $pages): ?>
                    <a href="?page-no=<?php echo $page + 1; ?>" class="page-link">Next</a>
                <?php else: ?>
                    <a href="#" class="page-link disabled">Next</a>
                <?php endif; ?>
            </div>
        </section> 
    </main>
</body>

</html>