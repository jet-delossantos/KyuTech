<?php
include_once 'includes/classautoloader.inc.php';
include_once 'header.php';

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
      <select class="form-select" name= "upcountry" value ="">
            <option selected><?php echo $country ?></option>
            <option value="KyuTech"><i class="fas fa-satellite-dish"></i> KyuTech</option>
            <option value="Ghana"><i class="fas fa-flag"></i> Ghana</option>
            <option value="Nigeria"><i class="fas fa-flag"></i> Nigeria</option>
            <option value="Mongolia"><i class="fas fa-flag"></i> Mongolia</option>
            <option value="Bangladesh"><i class="fas fa-flag"></i> Bangladesh</option>
            <option value="Thailand"><i class="fas fa-flag"></i> Thailand</option>
            <option value="Taiwan"><i class="fas fa-flag"></i> Taiwan</option>
            <option value="Bhutan"><i class="fas fa-flag"></i> Bhutan</option>
            <option value="Malaysia"><i class="fas fa-flag"></i> Malaysia</option>
            <option value="Philippines"><i class="fas fa-flag"></i> Philippines</option>
            <option value="Sri Lanka"><i class="fas fa-flag"></i> Sri Lanka</option>
            <option value="Nepal"><i class="fas fa-flag"></i> Nepal</option>
            <option value="Costa Rica"><i class="fas fa-flag"></i> Costa Rica</option>
            <option value="Paraguay"><i class="fas fa-flag"></i> Paraguay</option>
            <option value="Argentina"><i class="fas fa-flag"></i> Argentina</option>
            <option value="Sudan"><i class="fas fa-flag"></i> Sudan</option>
            <option value="Zimbabwe"><i class="fas fa-flag"></i> Zimbabwe</option>
            <option value="Ugandas"><i class="fas fa-flag"></i> Uganda</option>
          </select>
    </div>

    <p class = "my-0">Contact</p>
    <div class="input-group flex-nowrap my-4 mt-0">
      <span class="input-group-text"><i class="far fa-address-book"></i></span>
      <input type="text" class="form-control" name= "upcontact" value = <?php echo $contact ?>>
    </div>

    <button type="submit" class="btn btn-primary text-light" name="updateuser-button">Update</button>
    <button onclick="history.go(-1)"class="btn btn-primary">Back</button>
    </div>  
  </form>
</div>