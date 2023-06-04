<?php
  include ('conn.php')
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container">
      <div class="konten-container">
        <div class="sidebar">
          
          <ul>
            <li>
              <input type="text" name="search" id="search" placeholder="Search" />
            </li>
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
              <img src="Asset/Star2.png" alt="" class="Icon" />
              <a href="#">
                <span class="Description">Priority</span>
              </a>
            </li>
            <li >
              <a href="logout.php"> 
                <div class="logout">
                  Log Out
                </div>
              </a>
            </li>
          </ul>
        </div>
        <div class="konten">
          <div class="garis" style="position: fixed; top: 0;">
              <div class="garis1"></div>
              <div class="garis2"></div>
            </div>
            <div>
            <div class="header">
                <div class="dekor">
                  <h1>Reminder</h1>
                  <div class="dekor">
                    <div class="lingkaran"></div>
                    <div class="garis4"></div>
                  </div>
                </div>
              </div>
          </div>
          <div class="describe-container">
            <div>
                <div class="dropdown">
                    <select id="sort" name="sort" class="sort">
                        <option value=" "><b>Sort</b></option>
                        <option value=" ">By Date</option>
                        <option value=" ">By Category</option>
                        <option value=" ">By Label</option>
                    </select>
                  </div>
                  <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM tugas INNER JOIN kategori ON tugas.ID_Kategori=kategori.ID_Kategori";
                  $result = mysqli_query(connection(),$query);
                 ?>
                <table cellspacing="10">
                    <tr>
                      <td>
                        <div class="grid-container">
                        <?php while($data = mysqli_fetch_array($result)): ?>
                        <?php $datetime = new DateTime($data['Deadline']);
                        $tanggal = $datetime->format('Y-m-d');
                        $jam = $datetime->format('H:i:s');?>
                          <div class="grid-item">
                            <h1><?php echo $data['Judul'];  ?>  <span class="submit"><input type="checkbox"/></span><span class="fa fa-star"></span></h1>
                            <div class="category"><?php echo "Kategori : ". $data['Nama_Kategori'];  ?></div>
                            <div class="date1"><?php echo $tanggal;  ?></div>
                            <div class="date2"><?php echo $jam;  ?></div>
                          </div>
                        <?php endwhile ?>
                        </div>
                      </td>
                      </tr>
                      <br>
                </table>
            </div>
           </div>

          <div class="garis" style="position: fixed; bottom: 0;">
            <div class="garis2"></div>
            <div class="garis1"></div>
        </div>
    </div>
    </div>
</div> 
</body>
</html>