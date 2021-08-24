<?php
//Main Class to Handle SatData
//Extends to DBH Connection
class SatData extends Dbh {

    /* NOTES: 

        Naka MVC Model tayo para sa system na to.
        Protected ang methods na naghahandle ng database shit kasi sensitive yun.
        Magagamit lang ang class na to through the view and controller classes na naka extend dito.

    */

    //**************SELECT QUERIES******************//

//         //Get a rowcount based on username
//     protected function getUser($username) {
//         $sql = "SELECT * FROM users WHERE usernameUsers = ?";
//         $stmt = $this->connect()->prepare($sql);
//         $stmt->execute([$username]);
//         $results = $stmt->fetchAll();
//         $no_of_rows = $stmt -> rowCount();
//         return $no_of_rows;
//     } 
//         //Get rows of all users
//     protected function getAllUsers() {
//         $sql = "SELECT * FROM users";
//         $stmt = $this->connect()->prepare($sql);
//         $stmt->execute();
//         $results = $stmt->fetchAll();
//         return $results;
//     } 
//         //get user row by index
//     protected function getOneUser($id) {
//         $sql = "SELECT * FROM users WHERE idUsers = ?";
//         $stmt = $this->connect()->prepare($sql);
//         $stmt->execute([$id]);
//         $results = $stmt->fetchAll();
//         return $results;
//     }   
              
//         //Select and log user in based on credentials
//     protected function countUser($username,$password){
//         $sql = "SELECT * FROM users WHERE usernameUsers = ?";
//         $stmt = $this->connect()->prepare($sql);
//         $stmt->execute([$username]);
//         $results = $stmt->fetchAll();
//         $no_of_rows = $stmt -> rowCount();
//         if ($no_of_rows> 0) {
            
//             $passwordCheck = password_verify($password,$results[0]['passwordUsers']);
//             if ($passwordCheck == false){
//                 header('Location:../index.php?status=wrongpassword');
//                 exit();
//             } else if ($passwordCheck == true) {
//                 session_start();
//                 $_SESSION['userId'] = $results[0]['idUsers'];
//                 $_SESSION['userUsername'] = $results[0]['usernameUsers'];
//                 $_SESSION['userCountry'] = $results[0]['countryUsers'];
//                 if ($_SESSION['userUsername'] == 'admin'){
//                     header('Location:../dashboard.php?status=loginsuccess');
//                 exit();
//                 } else {
//                     header('Location:../satdata.php?status=loginsuccess');
//                     exit();
//                 }
//             } else {
//                 header('Location:../index.php?status=loginfailedsql');
//                 exit();
//             }
//         } else {
//             header('Location:../index.php?status=loginfailed');
//             exit();
//         }
//     }

//     //**************INSERT/UPDATE QUERIES******************//

//         //Insert rows into database
//     protected function setUser($username,$email,$password,$country,$contact) {
//         $sql = "INSERT INTO users(usernameUsers, emailUsers, passwordUsers, countryUsers, contactUsers) 
//                 VALUES (?, ?, ?, ?, ?);";
//         $stmt = $this->connect()->prepare($sql);

//             //hash the password for protection
//         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//         if ($stmt->execute([$username,$email,$hashedPassword,$country,$contact])){
//             header('Location:../index.php?status=registersuccess');
//         } else {
//             header('Location:../register.php?status=registerfailed');
//         }     
//     }
//         //Update row based on id
//     protected function updateUser($id,$username,$email,$country,$contact) {
//         $sql = "UPDATE users SET usernameUsers = ?, emailUsers = ?, countryUsers = ?, contactUsers = ? WHERE idUsers = ?";
//         $stmt = $this->connect()->prepare($sql);
        
//         if ($stmt->execute([$username,$email,$country,$contact,(int)$id])) {
//             header('Location:dashboard.php?status=editsuccess');
//             exit();
//         } else {
//             header('Location:edituser.php?updatebutton='.$id.'&status=editfailedsql');
//             exit();
//         }
//     }

//     //**************DELETE QUERIES******************//
//         //Delete row based on id
//     protected function deleteUser($id){
//         $sql = "DELETE FROM users WHERE idUsers = ?;";
//         $stmt = $this->connect()->prepare($sql);
        
//         if ($stmt->execute([$id])) {
//             header('Location:../dashboard.php?status=deletesuccess');
//             exit();
//         } else {
//             header('Location:../dashboard.php?status=deletefailedsql');
//             exit();
//         }
//     }
    
// }
    //**********************SELECT QUERIES******************//

            //Get rows of all users
    protected function getAllFiles() {
        $sql = "SELECT * FROM satdatameta";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    } 

            //get user row by index
    protected function getOneFile($fileId) {
        $sql = "SELECT * FROM satdatameta WHERE idSatDataMeta = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fileId]);
        $results = $stmt->fetchAll();
        return $results;
    }   
            

    //**************INSERT/UPDATE QUERIES******************//

            //Insert rows into database
    protected function setSatDataMeta($fileNameSatDataMeta, $fileSatDataMeta, $dateUploadedSatDataMeta, $uploaderSatDataMeta) {
        $sql = "INSERT INTO satdatameta (fileNameSatDataMeta, fileSatDataMeta, dateUploadedSatDataMeta, uploaderSatDataMeta) 
                VALUES (?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([$fileNameSatDataMeta, $fileSatDataMeta, $dateUploadedSatDataMeta, $uploaderSatDataMeta])){
            header('Location:../dashboard.php?status=fileuploadsuccess');
        } else {
            header('Location:../dashboard.php?status=fileuploadfailed');
        }     
    }

    //*********************DELETE QUERIES******************//
            
            //Delete row based on id      
    protected function deleteFile($id, $filelocation){
        $sql = "DELETE FROM satdatameta WHERE idSatDataMeta = ?;";
        $stmt = $this->connect()->prepare($sql);
        
        if ($stmt->execute([$id])) {
            unlink($filelocation);
            header('Location:../dashboard.php?status=filedeletesuccess');
            exit();
        } else {
            header('Location:../dashboard.php?status=filedeletefailed');
            exit();
        }
    }
}
