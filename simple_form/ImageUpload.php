<?php
class ImageUpload
{
    public $uploadOk = 1;
    public $path = "";
    public $val = "";
    public $Err = "";
    /**
     * [__construct check if image valid or not and display image]
     *
     * @param [string] $tmp_path [temporary path of image]
     * @param [string] $img_name [new path of image where will image saved to]
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
}

