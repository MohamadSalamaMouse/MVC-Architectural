<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc1e58e7b8afdb9f0ce5cbde02c5dbe7e
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitc1e58e7b8afdb9f0ce5cbde02c5dbe7e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc1e58e7b8afdb9f0ce5cbde02c5dbe7e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc1e58e7b8afdb9f0ce5cbde02c5dbe7e::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInitc1e58e7b8afdb9f0ce5cbde02c5dbe7e::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequirec1e58e7b8afdb9f0ce5cbde02c5dbe7e($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequirec1e58e7b8afdb9f0ce5cbde02c5dbe7e($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
