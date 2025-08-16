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
$records = mysqli_query($conn, "SELECT * FROM users");
$num_of_rows = $records->num_rows;
$pages = ceil($num_of_rows / PAGINATION_LIMIT);
if (isset($_GET['page-no']) && is_numeric($_GET['page-no'])) {
    $page = max(1, min($pages, intval($_GET['page-no'])));
    $start = ($page - 1) * PAGINATION_LIMIT;
    $srno = $start + 1;
}

$limit = PAGINATION_LIMIT;

$sql = "SELECT * FROM users LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="assets/css/manage_events.css">
</head>

<body>
    <?php
    $page_id = "users"; 
    include "includes/admin_sidebar.php";
    ?>

    <main class="main-content">
        <header class="topbar">
            <h1>Users</h1>
        </header>

        <section class="event-section">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>SR No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Phone</th>
                            <th>Created At</th>
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
                                    <?php echo $row["full_name"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["email"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["course"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["year"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["phone"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["created_at"]; ?>
                                </td>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
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
    </main>
</body>

</html>