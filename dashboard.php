<?php
    include_once "header.php";
?>

<!--Font awesome and bootstrap links-->
<script src="https://kit.fontawesome.com/fde27cd9e3.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-lg ">
      <h2 class='text-center my-3'>Admin Dashboard</h2>
      <button type="button" class="btn btn-success mx-1 my-1" name="adduser-button"><a class='text-light' href="adduser.php">Add User</a></button>
      <h4></br>User List</h4>
      <!-- CREATING A TABLE FOR USER MANAGEMENT -->
      <table class="table">
        <thead>
          <!-- TABLE COLUMN NAMES -->
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Country</th>
            <th scope="col">Contact</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
        <!-- VIEW OBJECT FOR QUERYING ALL USERS WITHIN DATABASE -->
        <!-- AND DISPLAYING INTO TABLE -->
          <?php
            $showAllUsersObj = new UsersView();
            $result = $showAllUsersObj -> showAllUsers();
            foreach ($result as $row){
                $id = $row['idUsers'];
                $name = $row['usernameUsers'];
                $email = $row['emailUsers'];
                $country = $row['countryUsers'];
                $mobile = $row['contactUsers'];
                echo '
                <tr>
                  <th scope="row">'.$id.'</th>
                  <td>'.$name.'</td>
                  <td>'.$email.'</td>
                  <td>'.$country.'</td>
                  <td>'.$mobile.'</td>
                  <td>
                    <button class ="btn btn-primary" name="edit-btn">
                      <a class="text-light" href="edituser.php?updatebutton='.$id.'"><i class="far fa-edit"></i></a>
                    </button>
                  </td>
                  <td>
                    <button class = "btn btn-warning" name="delete-btn">
                      <a href="includes/deleteuser.inc.php?deletebutton='.$id.'"><i class="far fa-trash-alt"></i></a>
                    </button>
                  </td>
                </tr>
                ';
            }
           ?>
        </tbody>
      </table>
    </div>
    <!-- horizontal line lang to -->
    <hr>

    <div class="container-lg ">
      <form class="form-horizontal" action="includes/uploadfile.inc.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="satfile">
        <br>
        <button type="submit" class="btn btn-success my-3" name="upload-button">Upload Sat File</button>
      </form>
      <h4>SatData Files</h4>
      <!-- CREATING A TABLE FOR USER MANAGEMENT -->
      <table class="table">
        <thead>
          <!-- TABLE COLUMN NAMES -->
          <tr>
            <th scope="col">ID</th>
            <th scope="col">File Name</th>
            <th scope="col">Upload Date</th>
            <th scope="col">UploaderID</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
        <!-- VIEW OBJECT FOR QUERYING ALL USERS WITHIN DATABASE -->
        <!-- AND DISPLAYING INTO TABLE -->
          <?php
            $showAllFilesObj = new SatDataView();
            $resultFile = $showAllFilesObj -> showAllFiles();
            foreach ($resultFile as $rowFile){
                $idFile = $rowFile['idSatDataMeta'];
                $nameFile = $rowFile['fileNameSatDataMeta'];
                $dateFile = $rowFile['dateUploadedSatDataMeta'];
                $uploaderFile = $rowFile['uploaderSatDataMeta'];
                echo '
                <tr>
                  <th scope="row">'.$idFile.'</th>
                  <td><a target="_blank" href=includes/viewfile.inc.php?fileid='.$idFile.'>'.$nameFile.'</a></td>
                  <td>'.$dateFile.'</td>
                  <td>'.$uploaderFile.'</td>
                  <td>
                    <button class = "btn btn-warning" name="delete-btn">
                      <a href="includes/deletefile.inc.php?deletefile='.$idFile.'&filelocation='.$nameFile.'"><i class="far fa-trash-alt"></i></a>
                    </button>
                  </td>
                </tr>
                ';
            }
           ?>
        </tbody>
      </table>
    </div> 
  </body>
</html>