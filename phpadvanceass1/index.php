<?php
include "Fetch.php";
?>

<?php
$obj = new Fetch("https://www.innoraft.com/jsonapi/node/services");
$result = $obj->get_file();
// var_dump($result);
// $headings = array();
// $content_list = array();
// $imge = array();
foreach($result as $value){
  $var1 = $value->attributes;
  $var11 = $var1->field_secondary_title;
  if(!is_null($var11)){
    $headings[$var1->title] = $var11->value;
    $var12 = $var1->field_services;
    $content_list[$var1->title] = $var12->value;
  }
  $var2 = new Fetch($value->relationships->field_image->links->related->href);
  $var21 = $var2->get_file()->attributes->uri->url;
  $var21 = "https://www.innoraft.com" . $var21;
  //  echo $var21;
  // echo "<img src ='".$var21."' width='100'>";
  $imge[$var1->title] = $var21;
}
// var_dump($headings);
// var_dump($content_list);
// var_dump($imge);
// echo "<img src ='"."/sites/default/files/2020-07/img-1.jpg"."' width='100'>";
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type = "text/css" href = "style.css" />
</head>
<body>
  <div id = "box">
    <p>Innoraft has been successfully delivering web and mobile solutions to esteemed global clientele. Our key solutions include website design and development, Drupal development and maintenance, mobile app design and development, and E-Commerce solutions. The quality-driven processes for all these services is our USP and we live by them every single day. We love to work with startups, small, medium, and large scale enterprises in the same way i.e. as partners.</p>
    <!-- 1 -->
    <?php
      $flag = 0;
      foreach ($headings as $key => $value) {
        # code...
        if ($flag == 0) {
          echo '<div class = "smallbox">';
          echo '<div class = "boxleft">';
          echo "<img src ='".$imge[$key]."' width='250'>";
          echo '</div>';
          echo '<div class = "boxright">';
          echo $value;
          echo $content_list[$key];
          echo "<button>Explore more</button>";
          echo '</div>';
          echo '</div>';
          $flag = 1;
        } else {
          echo '<div class = "smallbox">';
          echo '<div class = "boxleft">';
          echo $value;
          echo $content_list[$key];
          echo "<button>Explore more</button>";
          echo '</div>';
          echo '<div class = "boxright">';
          echo "<img src ='".$imge[$key]."' width='250'>";
          echo '</div>';
          echo '</div>';
          $flag = 0;
        }
      }
    ?>
  </div>

</body>
</html>
