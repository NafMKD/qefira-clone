<?php

spl_autoload_register('ThisAutoloader');

function ThisAutoloader($classname)
{
  $path = '../classes/' . $classname . '.class.php';
  if (!file_exists($path)) {
    return false;
  }
  include_once $path;
}
if(isset($_SESSION['userid'])){
  header('location: ../users/');
}
