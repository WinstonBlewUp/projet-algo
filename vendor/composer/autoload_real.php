<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf238d483e5e6dcc6e2ef82fb82d71e81
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitf238d483e5e6dcc6e2ef82fb82d71e81', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf238d483e5e6dcc6e2ef82fb82d71e81', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf238d483e5e6dcc6e2ef82fb82d71e81::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
