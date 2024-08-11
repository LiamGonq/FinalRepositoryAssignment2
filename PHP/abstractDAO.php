<?php
mysqli_report(MYSQLI_REPORT_STRICT);

class abstractDAO {
    public $mysqli;
    // Initializing a variable to store the database info
    protected static $dbhost = "localhost";
    protected static $dbname = "records";
    // Initializing variables for the database user credentials
    protected static $dbusername = "root";
    protected static $dbpassword = "";

    function __construct() {
        try{
            $this->mysqli = new mysqli(self::$dbhost, self::$dbusername, self::$dbpassword, self::$dbname);
        }catch(mysqli_sql_exception $e){
            throw $e;
        }
    }

    public function getMysqli(){
        return $this->mysqli;
        
    }
}
?>