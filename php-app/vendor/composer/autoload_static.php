<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6226c4e050e2b55576c081b6dd9120d0
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Negotiation\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Negotiation\\' => 
        array (
            0 => __DIR__ . '/..' . '/willdurand/negotiation/src/Negotiation',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6226c4e050e2b55576c081b6dd9120d0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6226c4e050e2b55576c081b6dd9120d0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6226c4e050e2b55576c081b6dd9120d0::$classMap;

        }, null, ClassLoader::class);
    }
}
