<?php
    // Establishes a connection to the mySQL database
    function connectMySQL() {
        // Log into the mySQL database with credentials
        $username = 'worker';
        $password = 'worker';
        $database = 'playmate';
        $mySQLi = new mysqli('localhost', $username, $password, $database);
        
        // Returns false on a connection error
        if ($mySQLi -> connect_errno) {
            printf("Connection failed: %s\n", $mySQLi -> connect_error);
            return false;
        // Otherwise return the connection object
        } else {
            return $mySQLi;
        }
    }
?>
    