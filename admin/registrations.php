<?php
include 'includes/admin_login_check.php';
include 'config/db_connect.php';
include '../config/constant.php';

$start = 0;
$page = 1;

$srno = 1;
$records = mysqli_query($conn, "SELECT * FROM users");
$num_of_rows = mysqli_num_rows($records);
$pages = ceil($num_of_rows / PAGINATION_LIMIT);
if (isset($_GET['page-no']) && is_numeric($_GET['page-no'])) {
    $page = max(1, min($pages, intval($_GET['page-no'])));
    $start = ($page - 1) * PAGINATION_LIMIT;
    $srno = $start + 1;
}

$search = "";
$where = "";

if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $where .= " AND e.title LIKE '%$search%'";
}

$limit = PAGINATION_LIMIT;

$sql = "SELECT er.reg_id AS reg_id, e.title, e.event_date, er.registered_at, 
               u.full_name, u.phone, u.email 
        FROM event_registration er
        JOIN events e ON er.event_id = e.event_id
        JOIN users u ON er.user_id = u.id
        WHERE 1=1 $where
        ORDER BY er.registered_at DESC
        LIMIT $start, $limit";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/manage_events.css">
    <title>Registration</title>
</head>

<body>
    <?php $page_id = "registrations"; ?>
    <?php include 'includes/admin_sidebar.php'; ?>
    <main class="main-content">
        <header class="topbar">
            <h1>Users</h1>
        </header>
        <section class="event-section">
            <div class="search-box">
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Search events..."
                        value="<?php echo htmlspecialchars($search); ?>">
                    <button type="submit">Search</button>
                </form>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>SR No</th>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>User Name</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <th>Registered At</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $srno; $srno++; ?></td>
                <td><?php echo $row["title"]; ?></td>
                <td><?php echo $row["event_date"]; ?></td>
                <td><?php echo $row["full_name"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["registered_at"]; ?></td>
            </tr>
        <?php
        }
    } else {
        echo "<tr><td colspan='7'>No registrations found.</td></tr>";
    }
    ?>
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