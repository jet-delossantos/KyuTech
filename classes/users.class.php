<?php
//Main Class to Handle Users Table
//Extends to DBH Connection
class Users extends Dbh {

    /* NOTES: 

        Naka MVC Model tayo para sa system na to.
        Protected ang methods na naghahandle ng database shit kasi sensitive yun.
        Magagamit lang ang class na to through the view and controller classes na naka extend dito.

    */

    //************************SELECT QUERIES**************************//

        //Get a rowcount based on username
    protected function getUser($username) {
        $sql = "SELECT * FROM users WHERE usernameUsers = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $results = $stmt->fetchAll();
        $no_of_rows = $stmt -> rowCount();
        return $no_of_rows;
    } 
        //Get rows of all users
    protected function getAllUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    } 
        //get user row by index
    protected function getOneUser($id) {
        $sql = "SELECT * FROM users WHERE idUsers = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $results = $stmt->fetchAll();
        return $results;
    }   
              
        //Select and log user in based on credentials
    protected function countUser($username,$password){
        $sql = "SELECT * FROM users WHERE usernameUsers = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $results = $stmt->fetchAll();
        $no_of_rows = $stmt -> rowCount();

        if ($no_of_rows> 0) {         
            $passwordCheck = password_verify($password,$results[0]['passwordUsers']);
            if ($passwordCheck == false){
                header('Location:../pages/index.php?status=wrongpassword');
                exit();
            } else if ($passwordCheck == true) {
                session_start();
                $_SESSION['userId'] = $results[0]['idUsers'];
                $_SESSION['userUsername'] = $results[0]['usernameUsers'];
                $_SESSION['userCountry'] = $results[0]['countryUsers'];
                $_SESSION['userPermission'] = $results[0]['permissionsUsers'];

                if ($_SESSION['userPermission'] != '2'){
                    header('Location:../pages/dashboard.php?status=loginsuccess');
                exit();
                } else {
                    header('Location:../pages/satdata.php?status=loginsuccess&query=default');
                    exit();
                }
            } else {
                header('Location:../pages/index.php?status=loginfailedsql');
                exit();
            }
        } else {
            header('Location:../pages/index.php?status=loginfailed');
            exit();
        }
    }

    //**********************INSERT/UPDATE QUERIES**************************//

        //Insert rows into database
    protected function setUser($username, $email, $password, $country, $contact) {
        $sql = "INSERT INTO users(usernameUsers, emailUsers, passwordUsers, countryUsers, contactUsers) 
                VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);

        //hash the password for protection
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($stmt->execute([$username,$email,$hashedPassword,$country,$contact])){
                header('Location:../pages/index.php?status=registersuccess'); 
                exit(); 
        } else {
            header('Location:../pages/register.php?status=registerfailed');
            exit();
        }     
    }

    protected function addUser($username, $email, $password, $country, $contact) {
        $sql = "INSERT INTO users(usernameUsers, emailUsers, passwordUsers, countryUsers, contactUsers) 
                VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);

        //hash the password for protection
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($stmt->execute([$username,$email,$hashedPassword,$country,$contact])){
                header('Location:../pages/dashboard.php?status=registersuccess'); 
                exit(); 
        } else {
            header('Location:../pages/dashboard.php?status=registerfailed');
            exit();
        }     
    }
        //Update row based on id
    protected function updateUser($id,$username,$email,$country,$contact,$access) {
        $sql = "UPDATE users SET usernameUsers = ?, emailUsers = ?, countryUsers = ?, contactUsers = ?, permissionsUsers = ? WHERE idUsers = ?";
        $stmt = $this->connect()->prepare($sql);
        
        if ($stmt->execute([$username,$email,$country,$contact,$access,(int)$id])) {
            header('Location:dashboard.php?status=editsuccess');
            exit();
        } else {
            header('Location:edituser.php?updatebutton='.$id.'&status=editfailedsql');
            exit();
        }
    }

    //*********************************DELETE QUERIES**********************//
        //Delete row based on id
    protected function deleteUser($id){
        $sql = "DELETE FROM users WHERE idUsers = ?;";
        $stmt = $this->connect()->prepare($sql);
        
        if ($stmt->execute([$id])) {
            header('Location:../pages/dashboard.php?status=deletesuccess');
            exit();
        } else {
            header('Location:../pages/dashboard.php?status=deletefailedsql');
            exit();
        }
    }  
}
