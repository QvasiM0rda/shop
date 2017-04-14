<?php
namespace Shop\functions;
session_start();


function autoloadClass($className)
{
  $className = __DIR__ . str_replace('\\', DIRECTORY_SEPARATOR, $className);
  $dir = 'functionsShop';
  $fileName  = str_replace($dir, '', $className) . '.class.php';
  //echo $fileName;
  
  if (file_exists($fileName)) {
    require $fileName;
  } else {
    echo 'Файл не найден ' . $fileName .'<br>';
  }
}

function autoloadInterface($className)
{
  $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
  $dir = 'functionsShop';
  $fileName  = str_replace($dir, '', $className) . '.interface.php';

  if (file_exists($fileName)) {
    require $fileName;
  } else {
    echo 'Файл не найден ' . $fileName .'<br>';
  }
}

spl_autoload_register('Shop\functions\autoloadClass');
spl_autoload_register('Shop\functions\autoloadInterface');