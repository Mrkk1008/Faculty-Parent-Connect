<?php
include "cn.php";

// $pass = "1234";
// $res = mysqli_query($link, "insert into test (dname) values (md5('$pass'))");
// if($res){
//     echo "sucess!";
// }else{
//     echo mysqli_error($res);
// }

$res = mysqli_query($link, "select * from test where id='4'");
$row = mysqli_fetch_assoc($res);

if (md5('1234') == $row['dname']){
    echo "sucess login";
}else{
    echo "login failed!";
}

?>