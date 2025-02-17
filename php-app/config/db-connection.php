<?php

return new PDO(
    "mysql:host=mariadb_container;dbname=sample;charset=utf8",
    "sampleuser",
    "samplepass",
    [
        PDO::ATTR_PERSISTENT => true, // Conexión persistente
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Modo de errores en excepciones
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Devuelve arrays asociativos por defecto
    ]
);
