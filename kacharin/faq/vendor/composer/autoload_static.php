<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit50228148acd340f75706138ca37b65e5
{
    public static $prefixLengthsPsr4 = array (
        'k' => 
        array (
            'kacharin\\faq\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'kacharin\\faq\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit50228148acd340f75706138ca37b65e5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit50228148acd340f75706138ca37b65e5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit50228148acd340f75706138ca37b65e5::$classMap;

        }, null, ClassLoader::class);
    }
}
