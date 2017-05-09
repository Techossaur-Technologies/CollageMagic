<?php
    $baseUrl = "http://collage.techossaur.com/";
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

    <!-- Bootstrap Core -->
    <link href="plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="plugins/bootstrap/bootstrap.min.js"></script>

    <!-- ImagePicker -->
    <link rel="stylesheet" type="text/css" href="plugins/image-picker/image-picker.css">
    <script type="text/javascript" src="plugins/image-picker/image-picker.min.js"></script>

    <!-- Bootbox -->
    <script type="text/javascript" src="plugins/bootbox/bootbox.min.js"></script>

    <!-- Custom CSS -->
    <link href="plugins/bootstrap/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


    <!-- Custom JQuery -->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            var imagessource = [];
            $(".image-picker").imagepicker({
                limit: 4,
                clicked:function(){

                    var img = $(this).val();
                    console.log(img);
                    if (img == null) {
                        $('#image_array').val(null);
                        imagessource = [];
                    } else {
                        $.each(img, function(idx, value) {
                            if ($.inArray(value, imagessource) !== -1) {
                                // console.log('Match Prod: ' + value);
                                $.each(imagessource, function(idx, value) {
                                    if ($.inArray(value, img) !== -1) {
                                        // console.log('Match: ' + value);
                                    }else {
                                        // console.log('Not Match: ' + value);
                                        imagessource = jQuery.grep(imagessource, function( a ) {
                                          return a !== value;
                                        });
                                    }
                                });

                            } else {
                                // console.log('Not Match: ' + value);
                                imagessource.push(value);
                                // console.log(imagessource.push(value));
                            }
                        });

                        // console.log(imagessource);
                        $('#image_array').val(imagessource);
                    }
                }
            });
            // alert(imagessource);
            $('.submit').click(function(e){
                e.preventDefault();
                var count = $('.image-picker option:selected').length;
                if(count < 2 ){
                    bootbox.alert("Please select atleast two image!");
                }
                else{
                    $('form[name=collage-form]').submit();
                }
            });

            // $('#collage-form').on( "click", ".image-picker", function() {
            //  $('#image_array') = val('.image-picker');
            // });

        });
        </script>

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
            <h2>Please select atleast two images</h2>
            <form name="collage-form" action="collage-next.php" method="POST">
                <input type="hidden" id="image_path" name="image_path" value="images/">
                <input type="hidden" class="formoutput" id="image_array" name="image_array">
                <select name="image-picker[]" class="image-picker" data-limit="4" multiple="multiple">
                <?php
                    $arr = array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg', '11.jpg', '12.jpg', '13.jpg', '14.jpg', '15.jpg', '16.jpg', '17.jpg', '18.jpg', '19.jpg', '20.jpg', '21.jpg', '22.jpg', '23.jpg', '24.jpg');
                    foreach ($arr as $value) {
                        # code...

                    echo '<option data-img-src="timthumb.php?src='.$baseUrl.'images/'.$value.'&w=160&h=120&q=30" value="'.$value.'">'.$value.'</option>';
                    }
                ?>
                </select>
                <input type="submit" class="btn btn-default btn-success submit" value="Submit">
            </form>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.intro-header -->

    <!-- Footer -->
    <?php
    include_once 'includes/footer.php';
    ?>


</body>

</html>
