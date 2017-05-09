<?php
	include('class/imageGrid.class.php');
	$arr = $_POST['images'];
    $image_path = $_POST['image_path'];
	$count = count($arr);
	//echo $count;
	$imageGrid = new imageGrid(1600, 1121, 101, 101);

	$target = 'output/';
	$finalImage = 'output.jpg';


	for ($i=0; $i < $count ; $i++) {

		//echo $arr[$i];
		$x[$i] = $_POST['x'.$i.''];
		$y[$i] = $_POST['y'.$i.''];
		$w[$i] = $_POST['w'.$i.''];
		$h[$i] = $_POST['h'.$i.''];

		//echo $x[$i], $y[$i], $w[$i], $h[$i].'\n';

		$im[$i] = imagecreatefromjpeg($image_path.$arr[$i] );
		$to_crop_array[$i] = array('x' => $x[$i] , 'y' => $y[$i], 'width' => $w[$i], 'height'=> $h[$i]);
		$thumb_im[$i] = imagecrop($im[$i], $to_crop_array[$i]);
		imagejpeg($thumb_im[$i], 'final/thumb'.$i.'.jpg', 100);

		switch ($count) {
	  		case '2':
	  				$img1 = imagecreatefromjpeg("final/thumb0.jpg");
						$imageGrid->putImage($img1, 50, 101, 0, 0);
					$img2 = imagecreatefromjpeg("final/thumb1.jpg");
						$imageGrid->putImage($img2, 50, 101, 51, 0);
	  			break;
	  		case '3':
	  				$img1 = imagecreatefromjpeg("final/thumb0.jpg");
						$imageGrid->putImage($img1, 50, 101, 0, 0);
					$img2 = imagecreatefromjpeg("final/thumb1.jpg");
						$imageGrid->putImage($img2, 50, 50, 51, 0);
					$img3 = imagecreatefromjpeg("final/thumb2.jpg");
						$imageGrid->putImage($img3, 50, 50, 51, 51);
	  			break;
	  		case '4':
	  				$img1 = imagecreatefromjpeg("final/thumb0.jpg");
						$imageGrid->putImage($img1, 50, 50, 0, 0);
					$img2 = imagecreatefromjpeg("final/thumb1.jpg");
						$imageGrid->putImage($img2, 50, 50, 51, 0);
					$img3 = imagecreatefromjpeg("final/thumb2.jpg");
						$imageGrid->putImage($img3, 50, 50, 0, 51);
					$img4 = imagecreatefromjpeg("final/thumb3.jpg");
						$imageGrid->putImage($img4, 50, 50, 51, 51);
	  			break;
	  		default:

	  			break;
	  	}

	}
$collageFlag = $imageGrid->display($target.$finalImage);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CollageMagic</title>

    <!-- jQuery -->
    <script src="plugins/jQuery/jquery.min.js"></script>    

    <!-- Bootstrap Core CSS -->
    <link href="plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="plugins/bootstrap/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link href="plugins/bootstrap/landing-page.css" rel="stylesheet">

    <!-- fancybox -->
    <script src="plugins/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="plugins/fancybox/jquery.fancybox.css">
    <script src="plugins/fancybox/jquery.fancybox.js"></script>
    <script src="plugins/fancybox/jquery.fancybox.pack.js"></script>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    </head>
<style type="text/css">
    .logo{
        height: auto;
    }
</style>
<body>

    <!-- Navigation -->
    <?php
    include_once 'includes/header.php';
    ?>
<a name="home"></a>
    <div class="content-section-a" style="text-align: center; background-color:#E6E6FA;">
        <div class="container">
        	<a class="fancybox" rel="group" href="output/output.jpg"><img src="output/output.jpg" alt="" height="280" width="400" /></a>
        	<a id="download" type="submit" class="btn btn-default btn-success submit" href="output/output.jpg" download="output.jpg">Download</a>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.intro-header -->
  
    <!-- Footer -->
    <?php
    include_once 'includes/footer.php';
    ?>

<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
</body>

</html>
