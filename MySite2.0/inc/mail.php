<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
set_error_handler("var_dump");


$to = "zmrfzn@gmail.com";
$from ="zmrfzn@hotmail.com";
$body = "test";
$subject ="test";

if(mail($to, $subject, $body, $from)){
echo "<h1>success</h1>";
}else{
echo "<h1>failed<br>".$error['message']."</h1>";
}

echo phpinfo();
