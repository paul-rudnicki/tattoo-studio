<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfb116b398d31960b6c396d0afe15ebd3
{
    public static $files = array (
        'aca594cec0c196659a3b7d4dc2665c0b' => __DIR__ . '/..' . '/j7mbo/twitter-api-php/TwitterAPIExchange.php',
        '4bd5cb9e907738a6f74a75bebbaea0de' => __DIR__ . '/../..' . '/app/functions.php',
        'aef2da1fade5e8a8a0182d8f631f4cd2' => __DIR__ . '/../..' . '/app/cmb2/functions.php',
        'acaa2bd22db6f43626c00b22222a9089' => __DIR__ . '/../..' . '/app/admin/admin-init.php',
    );

    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\controllers\\' => 16,
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'MenuTop' => __DIR__ . '/../..' . '/app/classes/MenuTop.php',
        'Request' => __DIR__ . '/../..' . '/app/classes/Request.php',
        'TSComments' => __DIR__ . '/../..' . '/app/classes/TSComments.php',
        'TSPopularPosts' => __DIR__ . '/../..' . '/app/classes/TSPopularPosts.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfb116b398d31960b6c396d0afe15ebd3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfb116b398d31960b6c396d0afe15ebd3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfb116b398d31960b6c396d0afe15ebd3::$classMap;

        }, null, ClassLoader::class);
    }
}
