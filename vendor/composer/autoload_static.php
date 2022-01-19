<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitef0bf30dcca7b6b7c66184aef2b36c27
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitef0bf30dcca7b6b7c66184aef2b36c27::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitef0bf30dcca7b6b7c66184aef2b36c27::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitef0bf30dcca7b6b7c66184aef2b36c27::$classMap;

        }, null, ClassLoader::class);
    }
}