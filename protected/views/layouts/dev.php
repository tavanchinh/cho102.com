<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Home page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="description" content="Default Description" />
      <meta name="keywords" content="Magento, Varien, E-commerce" />
      <meta name="robots" content="INDEX,FOLLOW" />
      <link rel="icon" href="favicon.ico" type="image/x-icon" />
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
      <link rel="stylesheet" type="text/css" href='<?php echo Yii::app()->request->baseUrl;?>/css/font-face.css' />
      <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/font-awesome.css" media="all" />
      <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap.css" media="all" />
      <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/main.css" media="all" />
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery-1.8.3.js"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.lazy.min.js"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap.js"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.easing.1.3.js"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/camera.js"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/superfish.js"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/actions.js"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/functions.js"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/cloud-zoom.1.0.2.js"></script>
      
      
   </head>
   <body class="ps-static  cms-index-index cms-home">
      <div class="wrapper ps-static en-lang-class">
         <div class="page">
         <?php include('includes/header.inc.php');?>
         <?php include('includes/nav.inc.php');?>  
         <?php echo $content;?>   
         <?php include('includes/footer.inc.php');?>   
         </div>
      </div>
   </body>
   
</html>