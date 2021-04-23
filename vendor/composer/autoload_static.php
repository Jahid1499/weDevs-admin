<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc57e07cf16b788aefd7c95b7afbe9f22
{
    public static $files = array (
        '41db16196db7a0da7b0e27fe58576581' => __DIR__ . '/../..' . '/dbconnection/dbconnection.php',
        '58b0e1f49c12128e7d1016f76de8b250' => __DIR__ . '/../..' . '/model/roles.php',
        'e230f4f57d668e42721f2cd10005ceeb' => __DIR__ . '/../..' . '/model/users.php',
        '917a1f7634bdf1d8556f8cd10b2f7f63' => __DIR__ . '/../..' . '/controller/RolesController.php',
        'd3ccf52099ff74553202d4adb630f332' => __DIR__ . '/../..' . '/controller/UsersController.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitc57e07cf16b788aefd7c95b7afbe9f22::$classMap;

        }, null, ClassLoader::class);
    }
}
