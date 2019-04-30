<?php
$pass='12345';
$pass=md5($pass);
var_pass($pass);
echo "<br>";
var_dump(crc32($pass));
echo "<br>";
var_dump(sha1($pass));
echo "<br>";
var_dump(md5(sha1(crc32($pass))));
echo "<br>";
var_dump(sha1(md5(crc32($pass))));
?>