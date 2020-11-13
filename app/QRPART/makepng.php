<?php

$src=$_POST['src'];

$data =$src ;

list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);


$data = base64_decode($data);
file_put_contents('image.png', $data);


?>