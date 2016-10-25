<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25-09-16
 * Time: 2:29 PM
 */
class UploadImage
{
    protected $fileToUpload;
    public $imageFileType;
    function __construct($fileName,$fileToUpload)
    {
        $this->fileToUpload = $fileToUpload;
        $target_dir = "../../Public/uploads/";
        $this->imageFileType = pathinfo(basename($this->fileToUpload["name"]),PATHINFO_EXTENSION);
        $target_file = $target_dir .$fileName.".".$this->imageFileType;
        $uploadOk = 1;
// Check if image file is a actual image or fake image
        /*
        if(isset($_POST["submit"])) {
            $check = getimagesize($fileToUpload["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }*/
// Check if file already exists
        /* if (file_exists($target_file)) {
             echo "Sorry, file already exists.";
             $uploadOk = 0;
         }*/
// Check file size
        /*  if ($fileToUpload["size"] > 500000) {
              echo "Sorry, your file is too large.";
              $uploadOk = 0;
          }*/
// Allow certain file formats
      /*  if($this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg"
            && $this->imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }*/
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($fileToUpload["tmp_name"], $target_file)) {
                echo "The file ". basename( $fileToUpload["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}