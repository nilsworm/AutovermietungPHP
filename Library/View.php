<?php

namespace AutovermietungPHP\Library;

use AutovermietungPHP\Library\Errors\NotFoundException;
final class View
{
    public static function render(string $path, array $vars = []): string
    {
        if (!file_exists($path)) {
            throw new NotFoundException("Datei nicht gefunden");
        }
        ob_start();
        extract($vars);
        require_once $path;
        $str= ob_get_contents();
        ob_end_clean();
        return $str;
    }
}