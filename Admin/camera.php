<?php
include('../koneksi.php');
session_start();
$message = "";
$i = 1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $camera_name = $koneksi->real_escape_string($_POST['camera_name']);
    $stok = (int)$_POST['stok'];
    $payment_method = $koneksi->real_escape_string($_POST['payment_method']);
    $status = $koneksi->real_escape_string($_POST['status']);

    // Query untuk memasukkan data
    $sql = "INSERT INTO cameras (camera_name, stok, payment_method, status) 
            VALUES ('$camera_name', $stok, '$payment_method', '$status')";

    // Eksekusi query
    if ($koneksi->query($sql) === TRUE) {
        $message = "Data successfully saved!";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $message = "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    // Ambil data dari form
    $update_id = (int)$_POST['update_id'];
    $camera_name = $koneksi->real_escape_string($_POST['camera_name']);
    $stok = (int)$_POST['stok'];
    $payment_method = $koneksi->real_escape_string($_POST['payment_method']);
    $status = $koneksi->real_escape_string($_POST['status']);

    // Query untuk update data
    $sql = "UPDATE cameras SET 
            camera_name = '$camera_name',
            stok = $stok,
            payment_method = '$payment_method',
            status = '$status'
            WHERE id = $update_id";

    if ($koneksi->query($sql) === TRUE) {
        $message = "Data successfully updated!";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $message = "Error: " . $koneksi->error;
    }
}

$see = "SELECT * FROM cameras";
$result = $koneksi->query($see);

if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id']; // Get the ID from the URL
    $sql = "DELETE FROM cameras WHERE id = $id";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit(); // Stop further script execution
    } else {
        $message = "Error: " . $koneksi->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mavers | Camera</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="index.html">
                        <span class="icon">
                            <img src="assets/imgs/logo.png" alt="">
                        </span>
                        <span class="title">Mavers</span>
                    </a>
                </li>

                <li>
                    <a href="index.html">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="camera.php">
                        <span class="icon">
                            <ion-icon name="camera-outline"></ion-icon>
                        </span>
                        <span class="title">Kamera & Aksesoris</span>
                    </a>
                </li>


                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/user.png" alt="">
                </div>
            </div>

            <!-- ================ Camera Details List ================= -->
            <div class="details">
                <div class="recentOrders" style="min-width: 1200px;overflow-x: auto;">
                    <div class="cardHeader">
                        <h2>Camera List</h2>
                        <a href="#" id="openModalBtn" class="btn">Add Camera</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Camera Name</td>
                                <td>Stock</td>
                                <td>Payment Method</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if ($result->num_rows > 0): ?>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $i;
                                            $i++; ?></td>
                                        <td><?= htmlspecialchars($row['camera_name']); ?></td>
                                        <td><?= $row['stok']; ?></td>
                                        <td><?= htmlspecialchars($row['payment_method']); ?></td>
                                        <td><span class="status delivered"><?= htmlspecialchars($row['status']); ?></span></td>
                                        <td>
                                            <a href="#" id="openupdate" class="btn-edit" id="myBtn">Edit</a>
                                            <a href="?delete_id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">No data available</td>
                                </tr>
                            <?php endif; ?>
                            <div id="myModal" class="modal">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <h2>Detail Camera</h2>
                                    <form id="cameraForm" method="POST">
                                        <label for="camera_name">Camera Name:</label>
                                        <input type="text" id="camera_name" name="camera_name" placeholder="Camera Name" required><br>
                                        <label for="stok">Stock:</label>
                                        <input type="text" id="stok" name="stok" placeholder="Stok" required><br>
                                        <label for="payment">Payment Method:</label>
                                        <input type="text" id="payment" name="payment_method" placeholder="Payment Method" required><br>
                                        <label for="status">Status:</label>
                                        <input type="text" id="status" name="status" placeholder="Status" required><br>
                                        <button type="submit" id="saveButton">Save</button>
                                    </form>
                                    <?php if (!empty($message)): ?>
                                        <p class="message"><?= $message; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div id="updateModal" class="modal">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <h2>Edit Camera</h2>
                                    <form id="updateForm" method="POST">
                                        <!-- Hidden input untuk ID saat update -->
                                        <input type="hidden" id="update_id" name="update_id" value="">

                                        <label for="edit_camera_name">Camera Name:</label>
                                        <input type="text" id="edit_camera_name" name="camera_name" placeholder="Camera Name" required><br>

                                        <label for="edit_stok">Stock:</label>
                                        <input type="text" id="edit_stok" name="stok" placeholder="Stock" required><br>

                                        <label for="edit_payment">Payment Method:</label>
                                        <input type="text" id="edit_payment" name="payment_method" placeholder="Payment Method" required><br>

                                        <label for="edit_status">Status:</label>
                                        <input type="text" id="edit_status" name="status" placeholder="Status" required><br>

                                        <button type="submit" id="updateButton">Update</button>
                                    </form>
                                </div>
                            </div>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>