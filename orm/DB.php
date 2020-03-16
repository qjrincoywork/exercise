<?php

defined('__ROOT__') OR exit('No direct script access allowed');
class DB
{
    private static $instance = null;
    private function __construct(){}
    private function __clone(){}

    private static function getInstance()
    {
        if(!isset(self::$instance))
        {
            $host = $host?? __HOSTNAME__;
            $dbname = $dbname?? __DATABASENAME__;
            $username = $username?? __USERNAME__;
            $password = $password?? __PASSWORD__;
            $pdoOptions[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            try {
                self::$instance = new PDO(
                    "mysql:host=".$host.";dbname=".$dbname.";charset=utf8mb4",
                    $username,
                    $password,
                    $pdoOptions
                );
            } catch (\Throwable $th) {
                die(json_encode(["outcome" => false, "message" => "Unable to Connect"]));
            }
        }
        
        return self::$instance;
    }
}