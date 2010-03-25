<?php
//The Simplest Typograffit API Access Sample for PHP5
// by Masato Yamaguchi

define('TYPOGRAFFIT_BASE_URL','http://typograffit.com/');
define('TYPOGRAFFIT_GENERATE_URL',TYPOGRAFFIT_BASE_URL.'rest_json/posts/generate/body:');
define('TYPOGRAFFIT_IMAGE_URL',TYPOGRAFFIT_BASE_URL.'rest_json/posts/getImage/post_id:');
if(isset($_POST['body'])){
	$result = file_get_contents(TYPOGRAFFIT_GENERATE_URL.rawurlencode($_POST['body']));
	preg_match('/\{\"(.*)\":\"(.*)\"\}/',$result,$matches);
	if($matches[1] == 'post_id'){
		$post_id = $matches[2];
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
Result: <br />
<div id="resultDiv"><?php if(isset($result)){echo $result;}?></div>
Image: <br />
<div id="imageDiv"><?php if(isset($post_id)){echo '<img src="'.TYPOGRAFFIT_IMAGE_URL.$post_id.'">';}?></div>
Input: <br />
<form method="POST" action="">
<textarea name="body" cols="40" rows="5"><?php if(isset($_POST['body'])){echo $_POST['body'];}?></textarea><br />
<input type="submit" value="Typograffit"/>
</form>
</body>
</html>