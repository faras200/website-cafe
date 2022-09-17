<?php

session_start();
if(!@$_SESSION['id_admin']){
    include "pages/dashboard/login.php";
}else{
    include "pages/index.php";
}

?>