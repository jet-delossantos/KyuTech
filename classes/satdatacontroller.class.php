<?php
//NAKA MVC(Model-View-Controller) tayo 
//Class na gagamitin pag mag hahandle ng user data within database

class SatDataController extends Satdata {

        //Method for creating new user
    public function createSatDataMeta($fileNameSatDataMeta, $fileSatDataMeta,  $dateUploadedSatDataMeta, $uploaderSatDataMeta)
    {
        $this->setSatDataMeta($fileNameSatDataMeta, $fileSatDataMeta, $dateUploadedSatDataMeta, $uploaderSatDataMeta);
    }  
    
        //Method for deleting user
    public function removeFile($id,$filelocation) {
        $this->deleteFile($id,$filelocation);
    }
    
}