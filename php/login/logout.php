<?php 
session_start();
if(isset($_SESSION['cart'])){
    unset( $_SESSION['memNo']);
}else{
    session_destroy();
}

?>