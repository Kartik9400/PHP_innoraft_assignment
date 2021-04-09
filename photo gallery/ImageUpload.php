<?php
require 'Image.php';

/**
 * Class image upload uploads the image
 */
class ImageUpload
{
    public $uploadOk = 1;
    public $path = "";
    public $val = "";
    public $Err = "";
    /**
     * [__construct uploading the image]
     *
     * @param [string] $tmp_path [path of the image]
     * @param [string] $img_name [temporary name of the image]
     */
    function __construct($tmp_path, $img_name)
    {
        $check = getimagesize($tmp_path);
        $this->path = $img_name;
        if ($check !== false) {
            if (move_uploaded_file($tmp_path, $this->path)) {
                $this->val = "file uploaded";
            }
            $this->uploadOk = 1;
        } else {
            $this->Err = "File is not an image";
            $this->uploadOk = 0;
        }
    }
    /**
     * [store to store data inside the table]
     *
     * @param [string] $img_description [contain description of image]
     *
     * @return [null]                  []
     */
    function store($img_description)
    {
        $image_store = new Image();
        $image_store->insertData($this->path, $img_description);
    }
}

