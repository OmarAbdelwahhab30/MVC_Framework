<?php

namespace PHPMVC\lib;

class FileUploader
{
    private $FileName ;

    private $FileType ;

    private $FileSize ;

    private $TargetFile;

    // BY BYTES
    const REQUIRED_SIZE = 1862923 ;

    const FILE_REQUIRED_TYPE = array('image/jpg','image/png','image/jpeg','image/gif','image/jfif');

    private $File_Temp_Name ;

    public function __construct($FileParam,$TargetFile)
    {
        $this->FileName         = $FileParam['name'];
        $this->FileType         = $FileParam['type'];
        $this->FileSize         = $FileParam['size'];
        $this->File_Temp_Name   = $FileParam['tmp_name'];
        $this->File_Error_Code  = $FileParam['error'];
        $this->TargetFile       = $TargetFile.$this->FileName;
    }

    public function CheckFileSize()
    {
        if ($this ->FileSize <= self::REQUIRED_SIZE) {
           return true ;
        }
        return false;
    }

    public function CheckFileType()
    {
        if (in_array($this->FileType,self::FILE_REQUIRED_TYPE)){
            return true;
        }
        return false;
    }

    public function Move_File()
    {
        move_uploaded_file($this->File_Temp_Name,$this->TargetFile);
    }

    public function DeleteFile($ImgPath)
    {
        unlink($ImgPath);
    }
}