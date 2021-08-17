<?php

//Class na gagamitin pag magview lang ng user data from database
//Galing sa user class ang protected methods
class UsersView extends Users {

    //method para tingnan kung nasa database na ang user based on username entry
    public function showUser($name) {
        $results = $this->getUser($name);
        return $results;
    }
    //method para i-verify kung meron sa database nung username at password
    public function checkLoginUser($username,$password) {
        $results = $this->countUser($username,$password);
        return $results;
    }
    //method para ipakita lahat ng users na nasa database
    public function showAllUsers() {
        $results = $this->getAllUsers();
        return $results;
    }   
    //method para kumuha ng row ng user based sa id
    public function showOneUser($id) {
        $results = $this->getOneUser($id);
        return $results;
    }
}