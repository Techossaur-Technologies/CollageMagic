<?php
  $arr1 = $_POST['image_array'];
  $image_path = $_POST['image_path'];
  // print_r($arr);

  // print_r($arr);
  $arr = explode(",",$arr1);
  // print_r($arr1);
  $count = count($arr);


?>
<!DOCTYPE html>
<html>
<head>
<title>Collage Next</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1"/>

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>    

<!-- Bootstrap Core CSS -->
<link href="plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
<script src="plugins/bootstrap/bootstrap.min.js"></script>

<!-- Custom CSS -->
<link href="plugins/bootstrap/landing-page.css" rel="stylesheet">


<!-- Cropbox -->
<link type="text/css" media="screen" rel="stylesheet" href="plugins/cropbox/jquery.cropbox1.css">
<script type="text/javascript" src="plugins/cropbox/hammer.js"></script>
<script type="text/javascript" src="plugins/cropbox/jquery.mousewheel.js"></script>
<script type="text/javascript" src="plugins/cropbox/jquery.cropbox.js"></script>

<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>
<body>
<style type="text/css">
.cropFrame {
    display: inline-block;
    float: left;
    margin-left: 3px;
    margin-top: 3px;
    overflow: hidden;
    position: relative;
}
.collage-main-div{
    width: 610px;
    margin-left: 260px;
}
.logo{
        height: auto;
}
</style>
<a name="home"></a>
<?php
  echo '<script type="text/javascript" defer>
        $( function () {
      ';
  for ($i=0; $i < $count ; $i++) {
    echo "$( '.cropimage".$i."' ).each( function () {
        var image = $(this),
            cropwidth = image.attr('cropwidth'),
            cropheight = image.attr('cropheight'),
            results = image.next('.results".$i."' ),
            x".$i."       = $('.cropX', results),
            y".$i."       = $('.cropY', results),
            w".$i."       = $('.cropW', results),
            h".$i."       = $('.cropH', results);

          image.cropbox( {width: cropwidth, height: cropheight, showControls: 'auto' } )
            .on('cropbox', function( event, results, img ) {
              x".$i.".val( results.cropX );
              y".$i.".val( results.cropY );
              w".$i.".val( results.cropW );
              h".$i.".val( results.cropH );
            });
      });
      ";
  }
  echo '});
      </script>';
?>
<?php
include_once 'includes/header.php';
?>

    <div class="content-section-a" style="text-align: center; background-color:#E6E6FA;">
        <div class="container">
        <h2>Adjust Your Images</h2>
<?php
  echo '<form action="final.php" method="POST">
        <input type="hidden" id="image_path" name="image_path" value="'.$image_path.'">
        <div class="collage-main-div" >
      ';

  for ($i=0; $i < $count ; $i++) {

    switch ($count) {
        case '2':
          # code...
          echo '<img class="cropimage'.$i.'" alt="" src="'.$image_path.$arr[$i].'" cropwidth="300" cropheight="425">';
          break;
        case '3':
          # code...
          if ($i == 0) {
            # code...
            echo '<img class="cropimage'.$i.'" alt="" src="'.$image_path.$arr[0].'" cropwidth="300" cropheight="425">';
          }
          else{
            echo '<img class="cropimage'.$i.'" alt="" src="'.$image_path.$arr[$i].'" cropwidth="300" cropheight="212">';
          }
          break;
        case '4':
          # code...
          // echo '<div class= "row"';
          if ($i < 2) {
            # code...
            echo '<img class="cropimage'.$i.'" alt="" src="'.$image_path.$arr[$i].'" cropwidth="300" cropheight="212">';
          }
          else {
            echo '<img class="cropimage'.$i.'" alt="" src="'.$image_path.$arr[$i].'" cropwidth="300" cropheight="212">';
          }

          break;
        default:
          # code...
          break;
      }
    echo '
    <div class="results'.$i.'">
      <input type="hidden" name="images[]" value="'.$arr[$i].'">
        <input type="hidden" id="x'.$i.'" name="x'.$i.'" class="cropX" value="">
        <input type="hidden" id="y'.$i.'" name="y'.$i.'" class="cropY" value="">
        <input type="hidden" id="w'.$i.'" name="w'.$i.'" class="cropW" value="">
        <input type="hidden" id="h'.$i.'" name="h'.$i.'" class="cropH" value="">
        </div>
        ';
  }
  echo '<input type="submit" class="btn btn-default btn-success submit" id="submit" value="Crop Image" style="float:left; width: 98px;">
  </form></div>
  ';
?>
</div>
        <!-- /.container -->
    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->


    <!-- Footer -->
    <?php
    include_once 'includes/footer.php';
    ?>


</body>
</html>