<?php

class SaveInfo {
    function __construct(){
      file_put_contents("myfile.doc", ob_get_contents());

      header("Content-type: application/vnd.ms-word");
      header("Content-Disposition: attachment; filename=myfile.doc");
      ob_get_contents();
      ob_clean();
      flush();
    }
}
