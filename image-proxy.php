<?php
//set_time_limit(10); //Thought this overrides the settings but apparently only appends, so rip me.
function getUrlMimeType($url) {
    $buffer = file_get_contents($url);
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    return $finfo->buffer($buffer);
}

$mimetypes = ['image/png','image/jpg','image/jpeg','image/gif','video/mp4'];

$url = htmlentities($_GET['url']);
$mime = getUrlMimeType($url);

// if a valid MIME type exists, display the image
// by sending appropriate headers and streaming the file
foreach($mimetypes as $mimetype) {
	if ($mime == $mimetype){
		header('Content-type: '.$mime.';');
		if(isset($url)){
			echo file_get_contents($url);
			die;
		}
	}
} 

echo "Sorry, my creator forbid me to do this.";
/*

function getIP() {
	$ip = '';

	// Precedence: if set, X-Forwarded-For > HTTP_X_FORWARDED_FOR > HTTP_CLIENT_IP > HTTP_VIA > REMOTE_ADDR
	$headers = array( 'X-Forwarded-For', 'HTTP_X_FORWARDED_FOR', 'HTTP_CLIENT_IP', 'HTTP_VIA', 'CF-Connecting-IP', 'REMOTE_ADDR' );
	foreach( $headers as $header ) {
		if ( !empty( $_SERVER[ $header ] ) ) {
			$ip = $_SERVER[ $header ];
			break;
		}
	}
	
	// headers can contain multiple IPs (X-Forwarded-For = client, proxy1, proxy2). Take first one.
	if ( strpos( $ip, ',' ) !== false )
		$ip = substr( $ip, 0, strpos( $ip, ',' ) );
	
	return $ip;
}
$ip = getIP();
$handle = fopen("ips.txt", "a+");
fwrite($handle, $ip . "   |   " . $current_date);
fwrite($handle, "   |   " . $mime);
fwrite($handle, "\n");
fclose($handle);

*/
?>
