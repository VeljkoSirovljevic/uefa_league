<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita6d039cf7a55ebf4b498e76d5c301a52
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita6d039cf7a55ebf4b498e76d5c301a52::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita6d039cf7a55ebf4b498e76d5c301a52::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
