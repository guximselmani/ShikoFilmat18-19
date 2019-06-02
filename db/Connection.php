<?php

class MySQLConnect{

    //Connection Parameters
    private $mysqluser;
    private $mysqlhost;
    private $mysqlpassword;
    private $mysqldatabase;
    private $mysqli;

    //Constructor
    public function __construct()
    {
        $this->mysqluser='root';
        $this->mysqlhost='localhost';
        $this->mysqlpassword='';
        $this->mysqldatabase='MenagjimiIFilmave';
    }

    //Function to get the connection
    public function getConnection(){
//        if (!self::$instance) {
//            echo "Creating new connection<br />";
//            self::$instance = new MySQLConnect;

        $this->mysqli = mysqli_connect($this->mysqlhost, $this->mysqluser, $this->mysqlpassword, $this->mysqldatabase);
//            if (!$this->mysqli) {
//                die('<h2><font color="#FF000">Cannot cmmunicate with database. Please try later.</font></h2>');
//            }
//            if (!mysqli_select_db($this->mysqldatabase, $this->mysqli)) {
//                die("Internal error - " . mysqli_error($this->mysqli));
//            }
//        }
        //echo 'Exiting new connection<br>';
        return $this->mysqli;
    }

}

?>