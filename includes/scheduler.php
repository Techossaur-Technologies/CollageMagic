<?php 
array_map('unlink', glob("server/php/files/*.jpg")); 
array_map('unlink', glob("server/php/files/thumbnail/*.jpg")); 
array_map('unlink', glob("server/php/files/*.png"));
array_map('unlink', glob("server/php/files/thumbnail/*.png"));
?>