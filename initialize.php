<?php

use TStuff\Php\DI\TInject;
use TStuff\Php\Logging\LoggerFactory;
use TStuff\Php\Logging\DefaultLogger\FileLogger;
use TStuff\Php\Logging\LogLevel;
use TStuff\Php\Cache\TFileCache;

$container = new TInject();

$container->RegisterService("logger",function($c){

    $logger = new LoggerFactory();
    $logger->registerLogger(new FileLogger("log"),[LogLevel::Debug,LogLevel::Error,LogLevel::Fatal,LogLevel::Info,LogLevel::Warning]);
    $logger->info("Logger Initialized with FileLogger",null,"Initialize");
    return $logger;

});

$container->RegisterService("cache",function ($c){

  return TFileCache::getInstance("cache");

});

$container->RegisterService("db",function ($c) {
    /**@var TInject $c */
    /**@var ITLogger $logger */
    $logger = $c->getService("logger");

    try{
        $pdo =  new PDO(
           DB_DSN,
           DB_USER,
           DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
               // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]//option   
        );
        $logger->info("PDO Initialized",null,"Initialize");
       return $pdo;
        }catch(\PDOException $e){
           
            $logger->error("Cant create connection",$e);
        }
        return null;
        
});

$container->RegisterService("dbmapper",function ($c){
 /**@var TInject $c */
    $mapper = $c->Instantiate("TStuff\Php\DBMapper\TDBMapper");
    /**@var TDBMapper $mapper */
    $mapper->registerObject("Model\TaMasterUser");
   
    $mapper->updateDatabase(true);
    return $mapper;

});
