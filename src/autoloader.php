<?php

namespace EntaseSDK;

function AutoLoader($className) 
{
    if (strpos($className, 'Entase\\') !== 0)
        return;

    $fileName = '';
    $namespace = '';

    // Sets the include path as the "src" directory
    $includePath = dirname(__FILE__).DIRECTORY_SEPARATOR;

    if (false !== ($lastNsPos = strripos($className, '\\'))) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    $fullFileName = $includePath . DIRECTORY_SEPARATOR . $fileName;
    $fullFileNameEX = $includePath . DIRECTORY_SEPARATOR .'ThirdParty/'.$fileName;

    $pos = strpos($fileName, '/');
    $fileName_src = ($pos !== false) ? substr_replace($fileName, '/src/', $pos, 1) : 'src/'.$fileName;
    $fullFileNameEX_SRC = $includePath . DIRECTORY_SEPARATOR .'ThirdParty/'.$fileName_src;

    if (file_exists($fullFileName)) {
        require_once $fullFileName;
    }
    elseif (file_exists($fullFileNameEX)) {
        require_once $fullFileNameEX;
    }
    elseif (file_exists($fullFileNameEX_SRC)) {
        require_once $fullFileNameEX_SRC;
    }
    else {
        die('Class "'.$className.'" does not exist.');
    }
}

\spl_autoload_register('EntaseSDK\AutoLoader'); // Registers the autoloader