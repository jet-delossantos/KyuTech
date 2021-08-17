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
      <button type="button" class="btn btn-success mx-1 my-1" name="adduser-button"><a class='text-light' href="register.php?status=adduser">Add User</a></button>
      <button type="button" class="btn btn-success mx-1 my-1" name="adduser-button"><a class='text-light' href="main.php">Upload Sat File</a></button>
      <h4></br>User List</h4>
      <table class="table">
        <thead>
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

          <?php
            $showAllObj = new UsersView();
            $result = $showAllObj -> showAllUsers();

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
  </body>
</html>