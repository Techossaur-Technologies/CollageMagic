<?php
$a = session_id();
if(empty($a)) session_start();
$a = session_id();
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
    <script src="plugins/jQuery/jquery.validate.min.js"></script> 

    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="plugins/jQueryFileUpload/js/vendor/jquery.ui.widget.js"></script>   

    <!-- Bootstrap Core CSS -->
    <link href="plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="plugins/bootstrap/bootstrap.min.js"></script>

    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">

    <!-- Custom CSS -->
    <link href="plugins/bootstrap/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css"> -->

    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="plugins/jQueryFileUpload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="plugins/jQueryFileUpload/css/jquery.fileupload-ui.css">
    <link rel="stylesheet" href="plugins/jQueryFileUpload/css/style.css">

    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="plugins/jQueryFileUpload/css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="plugins/jQueryFileUpload/css/jquery.fileupload-ui-noscript.css"></noscript>

    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="plugins/jQueryFileUpload/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="plugins/jQueryFileUpload/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="plugins/jQueryFileUpload/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="plugins/jQueryFileUpload/js/jquery.fileupload-image.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="plugins/jQueryFileUpload/js/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="plugins/jQueryFileUpload/js/jquery.fileupload-ui.js"></script>
    <!-- The main application script -->
    <script src="plugins/jQueryFileUpload/js/main.js"></script>


    <!-- Bootbox -->
    <script src="plugins/bootbox/bootbox.min.js"></script>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
        <h2>Upload Images</h2>
        <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
        <!-- Redirect browsers with JavaScript disabled to the origin page -->
        <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="col-lg-12">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel upload</span>
                </button>
                <button type="button" class="btn btn-danger delete">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" class="toggle">
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            <!-- The global progress state -->
            <div class="col-lg-5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
        </form> 
    </div>
    
    <div class="col-lg-12">
        <form name="collage-form" id="collage-form" action="collage-next.php" method="POST">
            <input type="hidden" id="image_path" name="image_path" value="server/php/files/">
            <input type="hidden" class="formoutput" id="image_array" name="image_array">
            <input type="submit" value="Submit" id="submit1" name="submit1" class="btn btn-default btn-success submit">
            <a class="btn btn-default btn-primary" href="index.php">Back</a>
        </form>
    </div>

    
    <!-- /.container -->
</div>

    <!-- Footer -->
    <?php
    include_once 'includes/footer.php';
    ?>


<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
        <td>
            <input name="php_session_default_id" class="form-control" type= "hidden" value="<?php echo $a; ?>">
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>    
<script type="text/javascript">
jQuery(document).ready(function () {
    $('#fileupload').fileupload({
        url: 'server/php/'
    }).on('fileuploadsubmit', function (e, data) {
        data.formData = data.context.find(':input').serializeArray();
    });
    $( "#submit1" ).click(function( event ) {
        event.preventDefault();
        $.ajax({
       'type':'POST',
       'dataType': 'json',
       'url':'server/imagecount.php',
       'success':function(data){
            if(data.status == 'success'){
            	// alert(data.message);
                $("#image_array").val(data.message);
                var str = data.message;
                var res = str.split(',');
                // console.log(res);
                if (res.length <= '1') {
                    bootbox.alert('Please add minimum 2 images for making collage');
                } else{
                    $("#collage-form").trigger('submit');
                }
            }
            else {
                alert('error');         
            }
        }
        });
    });
});

</script>
</body>

</html>
