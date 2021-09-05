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
    protected function getAllBytes($argumentslist) {
        if ($argumentslist[0] == "0") {
            $sql = "SELECT * FROM satdata";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
        }
        if ($argumentslist[0] == "1") {
            $dateFrom = $argumentslist[1];
            $dateTo = $argumentslist[2];
            $sql = "SELECT * FROM satdata WHERE datetimeSatData BETWEEN CAST(? AS DATE) AND CAST(? AS DATE)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$dateFrom,$dateTo]);
        }
        if ($argumentslist[0] == "2") {
            $dataType = '^'.$argumentslist[1];
            $sql = "SELECT * FROM satdata WHERE datatypeSatData REGEXP ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$dataType]);
        } 
        if ($argumentslist[0] == "3") {
            $dataType = '^'.$argumentslist[1];
            $dateFrom = $argumentslist[2];
            $dateTo = $argumentslist[3];
            $sql = "SELECT * FROM satdata WHERE datatypeSatData REGEXP ? AND datetimeSatData BETWEEN CAST(? AS DATE) AND CAST(? AS DATE)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$dataType,$dateFrom,$dateTo]);
        }
        if ($argumentslist[0] == "4") {
            $dateOn = '^'.$argumentslist[1];
            $sql = "SELECT * FROM satdata WHERE datetimeSatData REGEXP ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$dateOn]);
        }
        if ($argumentslist[0] == "5") {
            $dataType = '^'.$argumentslist[1];
            $dateOn = '^'.$argumentslist[2];
            $sql = "SELECT * FROM satdata WHERE datatypeSatData REGEXP ? AND datetimeSatData REGEXP ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$dataType, $dateOn]);
        }
        $results = $stmt->fetchAll();
        return $results;
    } 
            //Get rows of all files by GST
    protected function getAllBytesByGst($gst) {
        $sql = "SELECT * FROM satdata WHERE gstidSatData REGEXP ?";
        $stmt = $this->connect()->prepare($sql);
        $gst = '^'.$gst;
        $stmt->execute([$gst]);
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
    
                    $checksum = end($words);
    
                    $sql1 = "INSERT INTO satdata (gstidSatData, datetimeSatData, datatypeSatData, timeSatData, sensorSatData, checksumSatData,idSatMetaData) 
                    VALUES (?, DATE_ADD('1899-12-30 00:00:00', INTERVAL ? SECOND), ?, ?, ?, ?, ?);";
                    $stmt1 = $this->connect()->prepare($sql1);

                    $hextime = str_replace("\t","",$time);

                    $secs = hexdec($hextime);

                    $timestamp = ((float)$secs + 3818448000);

                    $stmt1->execute([$gst, $timestamp, $dataType, $time, $sensordata, $checksum, $last_id]);
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
    
                    $checksum = end($words);
                    
                    $hextime = str_replace("\t","",$time);

                    $secs = hexdec($hextime);

                    $timestamp = ((float)$secs + 3818448000);

                    $sql1 = "INSERT INTO satdata (gstidSatData, datetimeSatData, datatypeSatData, timeSatData, sensorSatData, checksumSatData, idSatMetaData) 
                    VALUES (?, DATE_ADD('1899-12-30 00:00:00', INTERVAL ? SECOND), ?, ?, ?, ?, ?);";
                    $stmt1 = $this->connect()->prepare($sql1);
                    $stmt1->execute([$gst, $timestamp, $dataType, $time, $sensordata, $checksum, $last_id]);
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
