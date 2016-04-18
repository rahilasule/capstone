<?php

/**
 * author: 
 * date:
 * description: A root class for all manage classes. This class communicates with DB
 */

define("DB_HOST", 'localhost');
define("DB_NAME", 'applied_project');
define("DB_PORT", 3306);
define("DB_USER","root");
define("DB_PWORD","");

define("LOG_LEVEL_SEC",0);
define("LOG_LEVEL_DB_FAIL",0);

define("PAGE_SIZE",10);

class adb extends mysqli
{
    /**
     * Adb constructor.
     */
    public function __construct(){
        parent::__construct(DB_HOST, DB_USER, DB_PWORD, DB_NAME, DB_PORT);
        if (mysqli_connect_error()){
            die('Connection Error (' . mysqli_connect_errno() . ') ' .mysqli_connect_error() );
        }
    }
}


?>