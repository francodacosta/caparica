<?php

include __DIR__ . '/../vendor/autoload.php';

// class AutoLoad
// {

//     private $classPath = array();

//     public function setClassPath($namespace, $path)
//     {
//         $this->classPath[$namespace] = $path;
//     }

//     public function getClassPath()
//     {
//         return $this->classPath;
//     }

//     public function __construct()
//     {
//         spl_autoload_register(array($this, 'loadClass'));
//     }

//     public function loadClass($className)
//     {

//         $paths = $this->getClassPath();
//         foreach($paths as $ns => $path) {
//             $className = str_replace($ns, $path, $className);
//         }

//         $file = str_replace('\\', '/', $className) . '.php';

//         if (file_exists($file)) {
//             require_once $file;
//         }
//     }
// }

// $autoLoader = new AutoLoad();
// $autoLoader->setClassPath('Caparica' , __DIR__ . '../src/Caparica');
