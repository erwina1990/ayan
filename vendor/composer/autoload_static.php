<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaf3b36c1d06f4e20b31ad215bea8ae44
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Translation\\' => 30,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/..' . '/nesbot/carbon/src',
    );

    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'UpdateHelper\\' => 
            array (
                0 => __DIR__ . '/..' . '/kylekatarnls/update-helper/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaf3b36c1d06f4e20b31ad215bea8ae44::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaf3b36c1d06f4e20b31ad215bea8ae44::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInitaf3b36c1d06f4e20b31ad215bea8ae44::$fallbackDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitaf3b36c1d06f4e20b31ad215bea8ae44::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
