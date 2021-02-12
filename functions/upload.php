<?php

$target_file = "./" . basename($_FILES["fileZ"]["name"]);
//console.log("qui ci arrivo");
if (move_uploaded_file($_FILES["fileZ"]["tmp_name"], $target_file)) {
    //$status = 1;
    //console.log("dentro");
    echo "bene<br>";
}
else{
    echo "male<br>";
}
//echo $_FILES["fileZ"]['error'];