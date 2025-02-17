<?php

// Leer si se deben mostrar errores en pantalla (desde .env o variable de entorno)
$displayErrors = getenv('DISPLAY_ERRORS') === 'true';

set_error_handler(
    function ($errno, $errstr, $errfile = null, $errline = null, $errcontext = []) use ($displayErrors) {
        header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error", true, 500);
        $dateTime = new DateTime();
        $errorMessage = "[{$dateTime->format("c")}] [$errno] $errstr in $errfile on line $errline | URI: {$_SERVER['REQUEST_URI']}\n";

        // Guardar en el log
        $logFile = __DIR__ . "/logs/error.log";
        if (!file_exists($logFile)) {
            touch($logFile);
            chmod($logFile, 0666);
        }
        file_put_contents($logFile, $errorMessage, FILE_APPEND | LOCK_EX);

        // Mostrar en pantalla solo si está habilitado
        if ($displayErrors) {
            echo "<pre style='color:red;'>Error: $errstr\nFile: $errfile\nLine: $errline\nURI: {$_SERVER['REQUEST_URI']}</pre>";
        }
    }
);

set_exception_handler(
    function ($exception) use ($displayErrors) {
        header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error", true, 500);
        $dateTime = new DateTime();
        $errorMessage = "[{$dateTime->format("c")}] Exception: " . $exception->getMessage() . " | URI: {$_SERVER['REQUEST_URI']}\nStack Trace:\n" . $exception->getTraceAsString() . "\n";

        // Guardar en el log
        $logFile = __DIR__ . "/logs/error.log";
        if (!file_exists($logFile)) {
            touch($logFile);
            chmod($logFile, 0666);
        }
        file_put_contents($logFile, $errorMessage, FILE_APPEND | LOCK_EX);

        // Mostrar en pantalla solo si está habilitado
        if ($displayErrors) {
            echo "<pre style='color:red;'>Exception: " . $exception->getMessage() . "\nStack Trace:\n" . $exception->getTraceAsString() . "</pre>";
        }
    }
);

// Opcional: Mostrar errores en logs de Apache si DISPLAY_ERRORS está habilitado
if ($displayErrors) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
}
