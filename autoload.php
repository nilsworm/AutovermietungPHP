<?php

spl_autoload_register(function ($className) {
    if (substr($className, 0, 17) !== 'AutovermietungPHP\\') {
            // not our business
            return;
    }
    $fileName = __DIR__.'/'.str_replace('\\', DIRECTORY_SEPARATOR, substr($className, 17)).'.php';
    if (file_exists($fileName)) {
            require_once $fileName;
    }
});  