<?php
$img = array();
$files = scandir("php/files/");
for ($i=1; $i<count($files); $i++){

	$image = $files[$i];
	$supported_file = array('gif','jpg','jpeg','png');

	$ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
	if (in_array($ext, $supported_file)) {
	    // print $image ."<br />";
	    array_push($img,$image);
	} else {
	    continue;
	}
}
$array = join(',', $img);
// echo $array;
echo json_encode(array("status" => "success", "message" => $array));
?>