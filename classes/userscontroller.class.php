<?php
//NAKA MVC(Model-View-Controller) tayo 
//Class na gagamitin pag mag hahandle ng user data within database

class UsersController extends Users {

        //Method for creating new user
    public function createUser($username,$email,$password,$country,$contact)
    {
        $this->setUser($username,$email,$password,$country,$contact);
    }    

        //Method for deleting usern
    public function removeUser($id) {
        $this->deleteUser($id);
    }

    public function editUser($id,$username,$email,$country,$contact) {
        $this->updateUser($id,$username,$email,$country,$contact);
    }

}