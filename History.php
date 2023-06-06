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
    <link rel="stylesheet" href="Asset/history.css">
    <link href="https://fonts.googleapis.com/css?family=Gelasio" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Gabriela" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Newsreader" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li>
                    <input type="text" name="search" id="search" placeholder="Search">
                </li>
                <li>
                    <select name="bulan" id="bulan">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                    </select>
                </li>
                <li>
                    <a href="index.php">
                        <img src="Asset/home (3) 1.png" alt="" class="Icon">
                        <span class="Description">Home</span>
                    </a>
                </li>
                <li>
                    <a href="desc.php">
                        <img src="Asset/writing 1.png" alt="" class="Icon">
                        <span class="Description">Description</span>
                    </a>
                </li>
                <li>
                    <a href="rem.php">
                        <img src="Asset/notification (1) 1.png" alt="" class="Icon">
                        <span class="Description">Reminder</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo "History.php"; ?>">
                        <img src="Asset/sand-watch 1.png" alt="" class="Icon">
                        <span class="Description">History</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="Asset/Star 2.png" alt="" class="Icon">
                        <span class="Description">Priority</span>
                    </a>
                </li>
                <li class="logout.php">

                    <div class="LogOut"><a href="#">Log Out</a></div>

                </li>
            </ul>
        </div>
        <div class="main">
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
                            <th>Judul</th>
                            <th>Deskrpsi</th>
                            <th>Tanggal Selesai</th>
                            <th>Notes</th>
                        </thead>
                        <?php
                        //proses menampilkan data dari database:
                        //siapkan query SQL
                        $idPengguna = $_SESSION['ID'];
                        $query = "SELECT * FROM history WHERE ID_Pengguna = '$idPengguna'";
                        $result = mysqli_query(connection(), $query);
                        ?>

                        <?php while ($data = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td>
                                <?php echo $data['ID_History']; ?>
                            </td>
                            <td>
                                <?php echo $data['ID_Tugas']; ?>
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

                <div class="garis" style="position: fixed; bottom: 0;">
                    <div class="garis2"></div>
                    <div class="garis1"></div>
                </div>
            </div>
        </div>
    </div>

    </div>


    <div class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <h2>Detail</h2>
            <p id="popup-description"></p>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var popup = document.querySelector('.popup');
        var popupDescription = document.getElementById('popup-description');

        var tableCells = document.querySelectorAll('td');

        tableCells.forEach(function(cell) {
            cell.addEventListener('click', function() {
                var description = this.textContent;
                popupDescription.textContent = description;
                popup.style.display = 'block';
            });
        });

        var closeBtn = document.querySelector('.close-btn');
        closeBtn.addEventListener('click', function() {
            popup.style.display = 'none';
        });
    });
    </script>
</body>

</html>