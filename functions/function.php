<?php
namespace Shop\functions;
session_start();

function autoloadClass($className)
{
  $className = __DIR__ . str_replace('\\', DIRECTORY_SEPARATOR, $className);
  $dir = 'functionsShop';
  $fileName  = str_replace($dir, '', $className) . '.class.php';
  
  if (file_exists($fileName)) {
    require $fileName;
  } else {
    echo 'Файл не найден ' . $fileName .'<br>';
  }
}

spl_autoload_register('Shop\functions\autoloadClass');