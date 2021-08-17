<?php
include_once 'includes/classautoloader.inc.php';
include_once 'header.php';


/* 

WARNING: WORK IN PROGRESS DO NOT BOTHER WITH THIS
WARNING: WORK IN PROGRESS DO NOT BOTHER WITH THIS
WARNING: WORK IN PROGRESS DO NOT BOTHER WITH THIS
WARNING: WORK IN PROGRESS DO NOT BOTHER WITH THIS
WARNING: WORK IN PROGRESS DO NOT BOTHER WITH THIS
WARNING: WORK IN PROGRESS DO NOT BOTHER WITH THIS
WARNING: WORK IN PROGRESS DO NOT BOTHER WITH THIS

*/
if (isset($_GET['updatebutton'])) {

    $id = $_GET['updatebutton'];
    
    $showUsersObj = new UsersView();
    $results = $showUsersObj-> showOneUser($id);

    $username = $results[0]['usernameUsers'];
    $email = $results[0]['emailUsers'];
    $country = $results[0]['countryUsers'];
    $contact = $results[0]['contactUsers'];

}
   if (isset($_POST['updateuser-button'])) {

     $usernameUpdate = $_POST['upusername'];
     $emailUpdate = $_POST['upemail'];
     $countryUpdate = $_POST['upcountry'];
     $contactUpdate = $_POST['upcontact'];

     $updateUsersObj = new UsersController();
     $updateUsersObj-> editUser($id,$usernameUpdate ,$emailUpdate, $countryUpdate, $contactUpdate);
   }

?>
<?php  ?>
<div class="container">
  <h1>UPDATE USER INFO</h1>
  <form class="" method="post">

    <p class = "my-0">Username</p>
    <div class="input-group flex-nowrap my-4 mt-0">
      <span class="input-group-text"><i class="far fa-user"></i></span>
      <input type="text" class="form-control" name= "upusername" value = <?php echo $username ?>>
    </div>

    <p class = "my-0">Email</p>
    <div class="input-group flex-nowrap my-4 mt-0">
      <span class="input-group-text"><i class="far fa-envelope"></i></span>
      <input type="text" class="form-control" name= "upemail" value = <?php echo $email ?>>
    </div>

    <p class = "my-0">Country</p>
    <div class="input-group flex-nowrap my-4 mt-0">
      <span class="input-group-text"><i class="far fa-flag"></i></span>
      <input type="text" class="form-control" name= "upcountry" value = <?php echo $country ?>>
    </div>

    <p class = "my-0">Contact</p>
    <div class="input-group flex-nowrap my-4 mt-0">
      <span class="input-group-text"><i class="far fa-address-book"></i></span>
      <input type="text" class="form-control" name= "upcontact" value = <?php echo $contact ?>>
    </div>
    <button type="submit" class="btn btn-primary text-light" name="updateuser-button">Update</button>
    </div>  
  </form>
</div>