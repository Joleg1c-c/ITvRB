<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit250b4d1e03e617b96439571fa8edc8de
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

        spl_autoload_register(array('ComposerAutoloaderInit250b4d1e03e617b96439571fa8edc8de', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit250b4d1e03e617b96439571fa8edc8de', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit250b4d1e03e617b96439571fa8edc8de::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
