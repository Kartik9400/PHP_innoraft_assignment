<?php
include "Fetch.php";
?>

<?php
$obj = new Fetch("https://www.innoraft.com/jsonapi/node/services");
$result = $obj->get_file();

foreach($result as $value){
  $attributes = $value->attributes;
  $sec_title = $attributes->field_secondary_title;
  if(!is_null($sec_title)){
      $order[$attributes->field_item_weight]["title"] = $sec_title->value;
      $services = $attributes->field_services;
      $order[$attributes->field_item_weight]["services"] = $services->value;
      $img_json_file = new Fetch($value->relationships->field_image->links->related->href);
      $img_url = $img_json_file->get_file()->attributes->uri->url;
      $img_url = "https://www.innoraft.com" . $img_url;
      $order[$attributes->field_item_weight]["images"] = $img_url;
  }

}
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
      ksort($order);
      foreach ($order as $key => $value) {
        # code...
          echo '<div class = "smallbox">';
          echo '<div class = "boxleft">';
          echo "<img src ='".$value["images"]."' width='250'>";
          echo '</div>';
          echo '<div class = "boxright">';
          echo $value["title"];
          echo $value["services"];
          echo "<button>Explore more</button>";
          echo '</div>';
          echo '</div>';

      }
    ?>
  </div>

</body>
</html>
