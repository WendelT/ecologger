<?php
session_start();
if(!$_SESSION['usuario']){
    header('Location: pages/login.php');
    exit();
}