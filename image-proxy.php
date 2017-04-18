<?php
//set_time_limit(10); //Thought this overrides the settings but apparently only appends, so rip me.

function getUrlMimeType($url) {
    $buffer = file_get_contents($url);
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    return $finfo->buffer($buffer);
}

$image = htmlentities($_GET['url']);
$ext = substr($image, -3); //Couldn't think of a better idea...

$ext = getUrlMimeType($image);

switch ($ext) {
	case 'jpg':
	$mime = 'image/jpeg';
        break;
    case 'gif':
        $mime = 'image/gif';
        break;
    case 'png':
        $mime = 'image/png';
        break;
    default:
        $mime = false;
}
// if a valid MIME type exists, display the image
// by sending appropriate headers and streaming the file


if ($mime !== false) {
header('Content-type: '.$mime.';');
	if(isset($image)){echo file_get_contents($image);}
}
else{
	echo "Sorry, my creator forbid me to do this.";
	die;
}
?>
