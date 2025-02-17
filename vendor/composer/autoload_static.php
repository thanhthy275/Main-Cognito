<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite737e509c1e693a45d60c1c14ae3be12
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite737e509c1e693a45d60c1c14ae3be12::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite737e509c1e693a45d60c1c14ae3be12::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite737e509c1e693a45d60c1c14ae3be12::$classMap;

        }, null, ClassLoader::class);
    }
}
