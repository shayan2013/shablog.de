<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd1880e770d75e352cdfee55f84f3702e
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'setasign\\Fpdi\\' => 14,
        ),
        'V' => 
        array (
            'Vendidero\\TrustedShops\\' => 23,
            'Vendidero\\Germanized\\Shipments\\' => 31,
            'Vendidero\\Germanized\\DHL\\' => 25,
            'Vendidero\\Germanized\\' => 21,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
        'A' => 
        array (
            'Automattic\\Jetpack\\Autoloader\\' => 30,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'setasign\\Fpdi\\' => 
        array (
            0 => __DIR__ . '/..' . '/setasign/fpdi/src',
        ),
        'Vendidero\\TrustedShops\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/woocommerce-trusted-shops/src',
        ),
        'Vendidero\\Germanized\\Shipments\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/woocommerce-germanized-shipments/src',
        ),
        'Vendidero\\Germanized\\DHL\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/woocommerce-germanized-dhl/src',
        ),
        'Vendidero\\Germanized\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
        'Automattic\\Jetpack\\Autoloader\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src',
        ),
    );

    public static $classMap = array (
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd1880e770d75e352cdfee55f84f3702e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd1880e770d75e352cdfee55f84f3702e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd1880e770d75e352cdfee55f84f3702e::$classMap;

        }, null, ClassLoader::class);
    }
}
