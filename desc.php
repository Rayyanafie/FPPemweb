<?php
  include ('conn.php')
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Describe</title>
    <link rel="stylesheet" href="Asset/desc.css" />
    <link href="https://fonts.googleapis.com/css?family=Gelasio" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Cousine" rel="stylesheet" />
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
          <div class="header">
            <h1>Describe</h1>
            <div class="dekor">
              <div class="lingkaran"></div>
              <div class="garis4"></div>
            </div>
            <button class="addplan" onclick="showPopup()">
              <div class="addplan-text">Add Plan <b>+</b></div>
            </button>
          </div>
          <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM tugas";
                  $result = mysqli_query(connection(),$query);
                 ?>
          <div class="describe-container">
              <?php while($data = mysqli_fetch_array($result)): ?>
              <?php $datetime = new DateTime($data['Deadline']);
              $tanggal = $datetime->format('Y-m-d');
              $jam = $datetime->format('H:i:s');?>
            <div class="describe">
              <div>
                <h1><?php echo $data['Judul'];  ?></h1>
                <div class="isi"><?php echo $data['Deskripsi'];  ?></div>
                <div class="date-buttons">
                  <div class="datetime">
                    <div class="date1"><?php echo $tanggal;  ?></div>
                    <div class="date2"><?php echo $jam;  ?></div>

                  </div>
                  <div class="add-upd">
                    <button class="adduser" onclick="showPopup1()"> <div class="adduser-text">Add User</div> </button>
                    <button class="update" onclick="showPopup2()"> <div class="update-text">Update</div> </button>
  
                  </div>
                </div>
              </div>
            </div>
            <?php endwhile ?>
          </div>
          <div class="garis" style="position: fixed; bottom: 0;">
                <div class="garis2"></div>
                <div class="garis1"></div>
            </div>
        </div>
      </div>
    </div>
    <div id="overlay" onclick="hidePopup()"></div>
    <div id="overlay" onclick="hidePopup1()"></div>
    <div id="overlay" onclick="hidePopup2()"></div>

    <div id="popup">
      <button class="close-button" onclick="hidePopup()">x</button>
      <form action="" class="form-addplan">
        <h3>Judul</h3>
        <textarea type="textarea" id="Deskripsi" name="deskripsi" placeholder="Deskripsi Tugas"></textarea>
        <div class="deadline-container">
          Deadline :
          <input type="date" />
          <input type="time" />
        </div>

        <div class="category">
          <label for="category">Category :</label>
          <select id="category" name="category">
            <option value=" "></option>
            <option value=" ">School</option>
            <option value=" ">Work</option>
            <option value=" ">Home</option>
          </select>
        </div>
        <div class="label">
          <label for="label">Label :</label>
          <select id="label" name="label">
            <option value=" "></option>
            <option value="3">Red</option>
            <option value="2">Yellow</option>
            <option value="1">Green</option>
          </select>
        </div>

        <button type="submit">Selesai</button>
      </form>
    </div>

    <div id="add-user">
      <button class="close-button" onclick="hidePopup1()">x</button>
      <form action="" class="form-adduser">
        <h3>Tambahkan Pengguna</h3>
        <textarea type="textarea" id="Deskripsi" name="deskripsi" placeholder="Deskripsi Pembagian Tugas"></textarea>

        <div class="category">
          <label for="iduser">Id Pengguna :</label>
          <select id="iduser" name="iduser">
            <option value=" "></option>
            <option value=" "></option>
            <option value=" "></option>
            <option value=" "></option>
          </select>
        </div>
        <button type="submit">Add User</button>
      </form>
    </div>

    <div id="update">
      <button class="close-button" onclick="hidePopup2()">x</button>
      <form action="" class="form-update">
        <h3>Update</h3>
        <textarea type="textarea" id="Deskripsi" name="deskripsi" placeholder="Deskripsi Tugas"></textarea>
        <div class="deadline-container">
          Deadline :
          <input type="date" />
          <input type="time" />
        </div>

        <div class="category">
          <label for="category">Category :</label>
          <select id="category" name="category">
            <option value=" "></option>
            <option value=" ">School</option>
            <option value=" ">Work</option>
            <option value=" ">Home</option>
          </select>
        </div>
        <div class="label">
          <label for="label">Label :</label>
          <select id="label" name="label">
            <option value=" "></option>
            <option value="3">Red</option>
            <option value="2">Yellow</option>
            <option value="1">Green</option>
          </select>
        </div>

        <button type="submit">Simpan</button>
        <button type="reset">Hapus</button>
      </form>
    </div>

    <script>
      function showPopup() {
        document.getElementById("overlay").style.display = "block";
        document.getElementById("popup").style.display = "block";
      }

      function hidePopup() {
        document.getElementById("overlay").style.display = "none";
        document.getElementById("popup").style.display = "none";
      }
    </script>

<script>
    function showPopup1() {
      document.getElementById("overlay").style.display = "block";
      document.getElementById("add-user").style.display = "block";
    }

    function hidePopup1() {
      document.getElementById("overlay").style.display = "none";
      document.getElementById("add-user").style.display = "none";
    }
  </script>
  <script>
    function showPopup2() {
      document.getElementById("overlay").style.display = "block";
      document.getElementById("update").style.display = "block";
    }

    function hidePopup2() {
      document.getElementById("overlay").style.display = "none";
      document.getElementById("update").style.display = "none";
    }
  </script>
</html>