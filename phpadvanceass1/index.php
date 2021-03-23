<?php
include "guzzleapi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    #box{
      max-width: 1000px;
      margin: auto;
    }
    p{
      text-align: center;
      color: black;
    }
    .boxleft{
      float: left;
      width: 50%;
      margin: auto;
      height: 200px;
      /*border: 1px solid black;*/
    }
    .boxright{
      float: right;
      width: 50%;
      margin: auto;
      height: 200px;
      /*border: 1px solid blue;*/
    }
    .boxsmall:after{
      content: "";
      display: table;
      clear: both;
    }
    a{
      text-decoration: none;
    }
    span{
      font-size: xx-large;
    }
  </style>
</head>
<body>
  <div id = "box">
    <p>Innoraft has been successfully delivering web and mobile solutions to esteemed global clientele. Our key solutions include website design and development, Drupal development and maintenance, mobile app design and development, and E-Commerce solutions. The quality-driven processes for all these services is our USP and we live by them every single day. We love to work with startups, small, medium, and large scale enterprises in the same way i.e. as partners.</p>
    <!-- 1 -->
    <div class = "smallbox">
      <div class = "boxleft">
        <a href="<?php echo $result->data[15]->attributes->path->alias; ?>"><img src = "https://www.innoraft.com/sites/default/files/2020-07/img-1.jpg" width = "200"></a>
      </div>
      <div class = "boxright">
        <a href="<?php echo $result->data[15]->attributes->path->alias; ?>"><span>WEBSITE DESIGN &</span><br><span>DEVELOPMENT</span></a>
        <ul>
          <li>
            <a href="<?php echo $result->data[2]->attributes->path->alias; ?>">Progressive Web Application</a>
          </li>
        </ul>
        <button><a href="<?php echo $result->data[15]->attributes->path->alias; ?>">Explore more</a></button>
      </div>
    </div>
    <!-- 2 -->
    <div class = "smallbox">
      <div class = "boxleft">
        <a href="<?php echo $result->data[12]->attributes->path->alias; ?>"><span>DRUPAL DEVELOPMENT</span><br><span>& MAINTENANCE</span></a>
        <ul>
          <li>
            <a href="<?php echo $result->data[7]->attributes->path->alias; ?>">Website Development Using Drupal 9 CMS</a>
          </li>
          <li>
            <a href="<?php echo $result->data[0]->attributes->path->alias; ?>">Migration to D8 or D9</a>
          </li>
          <li>
            <a href="<?php echo $result->data[12]->attributes->path->alias; ?>">Support & Maintenance of Drupal Website</a>
          </li>
          <li>
            <a href="<?php echo $result->data[11]->attributes->path->alias; ?>">Headless Drupal & Decoupled Application</a>
          </li>
        </ul>
        <button><a href="<?php echo $result->data[12]->attributes->path->alias; ?>">Explore more</a></button>
      </div>
      <div class = "boxright">
        <a href="<?php echo $result->data[12]->attributes->path->alias; ?>"><img src = "https://www.innoraft.com/sites/default/files/2020-07/img-2.jpg" width = "200"></a>
      </div>
    </div>
    <!-- 3 -->
    <div class = "smallbox">
      <div class = "boxleft">
        <a href="<?php echo $result->data[13]->attributes->path->alias; ?>"><img src = "https://www.innoraft.com/sites/default/files/2020-07/img-3.jpg" width = "200"></a>
      </div>
      <div class = "boxright">
        <a href="<?php echo $result->data[13]->attributes->path->alias; ?>"><span>MOBILE APP</span><br><span>DEVELOPMENT</span></a>
        <ul>
          <li>
            <a href="<?php echo $result->data[3]->attributes->path->alias; ?>">Hybrid Mobile App</a>
          </li>
          <li>
            <a href="<?php echo $result->data[1]->attributes->path->alias; ?>">Android Mobile App</a>
          </li>
          <li>
            <a href="<?php echo $result->data[8]->attributes->path->alias; ?>">iOS Mobile App</a>
          </li>
          <li>
            <a href="<?php echo $result->data[9]->attributes->path->alias; ?>">eCommerce Mobile App</a>
          </li>
        </ul>
        <button><a href="<?php echo $result->data[13]->attributes->path->alias; ?>">Explore more</a></button>
      </div>
    </div>
    <!-- 4 -->
    <div class = "smallbox">
      <div class = "boxleft">
        <a href="<?php echo $result->data[4]->attributes->path->alias; ?>"><span>ECOMMERCE</span><br><span>WEB SOLUTION</span></a>
        <ul>
          <li>
            <a href="<?php echo $result->data[10]->attributes->path->alias; ?>">Shopping Cart Development</a>
          </li>
          <li>
            <a href="<?php echo $result->data[4]->attributes->path->alias; ?>">Ecommerce Website Design & Development</a>
          </li>
          <li>
            <a href="<?php echo $result->data[5]->attributes->path->alias; ?>">Marketplace Development</a>
          </li>
          <li>
            <a href="<?php echo $result->data[6]->attributes->path->alias; ?>">Product Catalog & Microsite Development </a>
          </li>
        </ul>
        <button><a href="<?php echo $result->data[4]; ?>">Explore more</a></button>
      </div>
      <div class = "boxright">
        <a href="<?php echo $result->data[4]->attributes->path->alias; ?>"><img src = "https://www.innoraft.com/sites/default/files/2020-07/img-4.jpg" width = "200"></a>
      </div>
    </div>
  </div>

</body>
</html>
