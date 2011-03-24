<?php

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony'                        => array(__DIR__.'/../vendor/symfony/src', __DIR__.'/../vendor/bundles'),
    'Sensio'                         => __DIR__.'/../vendor/bundles',
    'Doctrine\\Common\\DataFixtures' => __DIR__.'/../vendor/doctrine-data-fixtures/lib',
    'Doctrine\\Common'               => __DIR__.'/../vendor/doctrine-common/lib',
    'Doctrine\\DBAL\\Migrations'     => __DIR__.'/../vendor/doctrine-migrations/lib',
    'Doctrine\\MongoDB'              => __DIR__.'/../vendor/doctrine-mongodb/lib',
    'Doctrine\\ODM\\MongoDB'         => __DIR__.'/../vendor/doctrine-mongodb-odm/lib',
    'Doctrine\\DBAL'                 => __DIR__.'/../vendor/doctrine-dbal/lib',
    'Doctrine'                       => __DIR__.'/../vendor/doctrine/lib',
    'Zend\\Log'                      => __DIR__.'/../vendor/zend-log',
    'Assetic'                        => __DIR__.'/../vendor/assetic/src',
    'Acme'                           => __DIR__.'/../src',
    'Tumf'                           => __DIR__.'/../src',
    'Bundle\\ZendCacheBundle'        => __DIR__.'/../src',
));

$loader->registerPrefixes(array(
    'Twig_Extensions_' => __DIR__.'/../vendor/twig-extensions/lib',
    'Twig_'            => __DIR__.'/../vendor/twig/lib',
    'Swift_'           => __DIR__.'/../vendor/swiftmailer/lib/classes',
    'Zend_Cache_'                            => __DIR__.'/../vendor/zend/library/Zend/Cache',
));
$loader->register();

// @todo: 何故かこんな事やらないとうまいくいかない＞＜
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__.'/../vendor/zend/library');
require_once(__DIR__.'/../vendor/zend/library/Zend/Cache/Manager.php');

set_include_path(get_include_path() . PATH_SEPARATOR.__DIR__.'/../vendor/pear');