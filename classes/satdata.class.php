<?php
//Main Class to Handle SatData
//Extends to DBH Connection
class SatData extends Dbh {

 
    //**********************SELECT QUERIES******************//

            //Get rows of all files
    protected function getAllFiles() {
        $sql = "SELECT * FROM satdatameta";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    } 
            //Get rows of all files
    protected function getAllBytes() {
        $sql = "SELECT * FROM satdata";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    } 

            //get file row by index
    protected function getOneFile($fileId) {
        $sql = "SELECT * FROM satdatameta WHERE idSatDataMeta = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fileId]);
        $results = $stmt->fetchAll();
        return $results;
    }   
            

    //**************INSERT/UPDATE QUERIES******************//

            //Insert rows into database
    protected function setSatDataMeta($fileNameSatDataMeta, $fileSatDataMeta, $fileFormat, $dateUploadedSatDataMeta, $uploaderSatDataMeta) {
        $sql = "INSERT INTO satdatameta (fileNameSatDataMeta, fileSatDataMeta, formatSatDataMeta, dateUploadedSatDataMeta, uploaderSatDataMeta) 
                VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        if ($stmt->execute([$fileNameSatDataMeta, $fileSatDataMeta, $fileFormat, $dateUploadedSatDataMeta, $uploaderSatDataMeta])){
            $sql = "SELECT idSatDataMeta FROM satdatameta ORDER BY idSatDataMeta DESC LIMIT 1";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            foreach($results as $row){
                $last_id = $row['idSatDataMeta'];
            }
            if ($fileFormat == '16'){
                $lines = explode("<br />", $fileSatDataMeta);
                foreach ($lines as $line){
                    $words = explode("\t", $line); 
    
                    $gst = $words[0]."\t".$words[1]."\t";
                    $gst = str_replace("\r\n","",$gst);
    
                    $dataType = $words[2]."\t";
    
                    $time = "";
                    foreach (range(3,6) as $index){
                        $time = $time.$words[$index]."\t";  
                    }
    
                    $sensordata = "";
                    foreach (range(7,count($words)-2) as $index){
                        $sensordata = $sensordata.$words[$index]."\t";  
                    }
    
                    $checksum = end($words)."\r\n";
    
                    $sql1 = "INSERT INTO satdata (gstidSatData, datatypeSatData, timeSatData, sensorSatData, checksumSatData,idSatMetaData) 
                    VALUES (?, ?, ?, ?, ?, ?);";
                    $stmt1 = $this->connect()->prepare($sql1);
                    $stmt1->execute([$gst, $dataType, $time, $sensordata, $checksum, $last_id]);
                }
            } else if ($fileFormat == '33'){
                $lines = explode("<br />", $fileSatDataMeta);
                foreach ($lines as $line){
                    $words = explode("\t", $line); 
    
                    $gst = $words[0]."\t".$words[1]."\t";
                    $gst = str_replace("\r\n","",$gst);
    
                    $dataType = $words[2]."\t";
    
                    $time = "";
                    foreach (range(3,6) as $index){
                        $time = $time.$words[$index]."\t";  
                    }
    
                    $sensordata = "";
                    foreach (range(7, count($words)-1) as $index){
                        $sensordata = $sensordata.$words[$index]."\t";  
                    }
    
                    $checksum = "00"."\r\n";
    
                    $sql1 = "INSERT INTO satdata (gstidSatData, datatypeSatData, timeSatData, sensorSatData, checksumSatData, idSatMetaData) 
                    VALUES (?, ?, ?, ?, ?, ?);";
                    $stmt1 = $this->connect()->prepare($sql1);
                    $stmt1->execute([$gst, $dataType, $time, $sensordata, $checksum, $last_id]);
                }
            } 
            header('Location:../dashboard.php?status=fileuploadsuccess');
        } else {
            header('Location:../dashboard.php?status=fileuploadfailed');
        }     
    }

    //*********************DELETE QUERIES******************//
            
            //Delete row based on id      
    protected function deleteFile($id, $filelocation){
        $sql = "DELETE FROM satdatameta WHERE idSatDataMeta = ?;
                DELETE FROM satdata WHERE idSatMetaData = ?";
        $stmt = $this->connect()->prepare($sql);
        
        if ($stmt->execute([$id,$id])) {
            unlink($filelocation);
            header('Location:../dashboard.php?status=filedeletesuccess');
            exit();
        } else {
            header('Location:../dashboard.php?status=filedeletefailed');
            exit();
        }
    }
}
