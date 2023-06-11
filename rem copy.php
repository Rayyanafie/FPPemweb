<?php
include('conn.php');
session_start();
if (!isset($_SESSION['ID'])) {
    header("Location: Landing.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reminder</title>
    <link rel="stylesheet" href="Asset/rem.css" />
    <link href="https://fonts.googleapis.com/css?family=Gelasio" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Gabriela" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Newsreader" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="garis">
            <div class="garis1"></div>
            <div class="garis2"></div>
        </div>
        <div class="konten-container">
            <div class="sidebar">
                <ul>
                    <li>
                        <select name="bulan" id="bulan">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                        </select>
                    </li>
                    <li>
                        <img src="Asset/home1.png" alt="" class="Icon" />
                        <a href="index.php">
                            <span class="Description">Home</span>
                        </a>
                    </li>
                    <li>
                        <img src="Asset/writing1.png" alt="" class="Icon" />
                        <a href="desc.php">
                            <span class="Description">Description</span>
                        </a>
                    </li>
                    <li>
                        <img src="Asset/notification1.png" alt="" class="Icon" />
                        <a href="rem.php">
                            <span class="Description">Reminder</span>
                        </a>
                    </li>
                    <li>
                        <img src="Asset/sand-watch1.png" alt="" class="Icon" />
                        <a href="History.php">
                            <span class="Description">History</span>
                        </a>
                    </li>
                    <li>
                        <div class="logout">
                            <a href="logout.php">Log Out</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="konten">
                <div class="garis">
                    <div class="garis1"></div>
                    <div class="garis2"></div>
                </div>
                <div>
                    <div class="header">
                        <div class="dekor">
                        </div>
                        <h1>History</h1>
                        <div class="dekor">
                            <div class="lingkaran"></div>
                            <div class="garis4"></div>
                        </div>
                    </div>
                    <div class="info">
                        <table>
                            <thead>
                                <th>ID Tugas</th>
                                <th>Judul</th>
                                <th>Tanggal Selesai</th>
                                <th>Notes</th>
                            </thead>
                            <?php
                            //proses menampilkan data dari database:
                            //siapkan query SQL
                            $idPengguna = $_SESSION['ID'];
                            $query = "SELECT *from history where ID_Pengguna ='$idPengguna'";
                            $result = mysqli_query(connection(), $query);
                            ?>

                            <?php while ($data = mysqli_fetch_array($result)): ?>
                                <tr>
                                    <td>
                                        <?php echo $data['ID_History']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Judul']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Tanggal']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Catatan']; ?>
                                    </td>
                                </tr>
                            <?php endwhile ?>


                        </table>
                    </div>
                    <div class="garis">
                        <div class="garis2"></div>
                        <div class="garis1"></div>
                    </div>
                </div>
</body>

</html>