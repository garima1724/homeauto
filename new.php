<?php
$link = mysqli_connect("localhost","root","","sample");
$data=mysqli_query($link,"SELECT name,salary FROM tab_emp ORDER BY salary DESC LIMIT 1,1");
if($a=mysqli_fetch_assoc($data))
{
    print_r($a);
}
?>
