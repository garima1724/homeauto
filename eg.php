<?php
$a='gfdh';
var_dump(md5($a));
echo "<br>";
var_dump substr((md5($a)),0,10);//will give the length starting from index 0 and then 10 characters after that.
?>