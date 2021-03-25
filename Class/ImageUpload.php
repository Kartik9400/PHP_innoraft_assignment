<?php
  class ImageUpload{
    public $uploadOk = 1;
    public $path = "";
    public $val = "";
    public $Err = "File not uploaded";
    function __construct($tmp_path, $img_name){
      $check = getimagesize($tmp_path);
      $this->path = "../Class/".$img_name;
      if($check !== false){
        if(move_uploaded_file($tmp_path, $this->path)){
          $this->val = "file uploaded";
        }
        $this->uploadOk = 1;
      } else {
        $this->Err = "File is not an image";
        $this->uploadOk = 0;
      }
    }
  }
?>
