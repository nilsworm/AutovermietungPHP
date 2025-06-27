<?php
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception(".env file not found: " . $path);
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        json_encode(list($key, $value) = explode('=', $line, 2));
        $key = trim($key);
        $value = trim($value);
        $value = trim($value, "\"'");
        putenv("$key=$value");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}
try {
    loadEnv(__DIR__ . '\\..\\.env');
} catch (Exception $e) {
    echo "Fehler: " . $e->getMessage();
}
