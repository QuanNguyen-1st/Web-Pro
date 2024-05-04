<?php
class DB
{
    public static $instance = NULL;
    public static function getInstance() 
    {
        if (!isset(self::$instance)) 
        {
            try{
                self::$instance = mysqli_connect("localhost", "root", "", "web1");
                if (mysqli_connect_errno())
                {
                    die("Failed to connect to MySQL: " . mysqli_connect_error());
                }    
            }
            catch (mysqli_sql_exception $e) {
                include_once("./views/error/index.php");
                exit();
            }
            
        }

        return self::$instance;
    }
}
