<?php
    // Contains user management functions

    // Attempts to log into a user account with the given credentials
    function verifyLogInCredentials($username, $password) {

        // Check if the user credentials against the database
        $mySQLi = connectMySQL();
        $stmt = $mySQLi -> prepare("select count(*), password from users where username=?");
        if (!$stmt) {
            printf("Query Prep Failed: %s\n", $mySQLi -> error);
            exit();
        }

        $stmt -> bind_param('s', $username);
        $stmt -> execute();
        $stmt -> bind_result($count, $fetchedPass);
        $stmt -> fetch();
        $stmt -> close();

        // Check if log-in was successful
        if ($count == 1 && password_verify($password, $fetchedPass)) {
            // Log in successful
            return true;
        } else {
            // Log-in failed            
            return false;
        }
    }
    
    // Returns true if the username already exists in the database, false otherwise
    function usernameIsTaken($name) {
        $mySQLi = connectMySQL();
        $stmt = $mySQLi -> prepare("select count(username) from users where username=?");
        if (!$stmt) {
            printf("Query Prep Failed: %s\n", $mySQLi -> error);
            exit();
        }

        $stmt -> bind_param('s', $name);
        $stmt -> execute();           
        $stmt -> bind_result($count);
        $stmt -> fetch();
        $stmt -> close();
        
        if ($count == 1) {
            return true;
        } else {
            return false;
        }
    }

    // Commits the given username and password to the database
    function commitUserToDatabase($username, $password, $phone) {

        $mySQLi = connectMySQL();
        $stmt = $mySQLi -> prepare("insert into users (username, password, phone) values (?, ?, ?)");
        if (!$stmt) {
            printf("Query Prep Failed: %s\n", $mySQLi -> error);
            exit();
        }

        $stmt -> bind_param('ssi', $username, $password, $phone);
        $stmt -> execute();
        $stmt -> close();
    }
    
    // Log in the user into the session
    function logInUser($username) {
        ini_set("session.cookie_httponly", 1);
        session_start();
        
        // Set the session username and nickname
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
    
    }
    

    // Returns an array of the names of all registered users
    function getAllUsers() {
        $mySQLi = connectMySQL();
        $stmt = $mySQLi -> prepare("select username from users");
        if (!$stmt) {
            printf("Query Prep Failed: %s\n", $mySQLi -> error);
            exit();
        }
        
        $stmt -> execute();           
        $stmt -> bind_result($data);
        
        $users = array();
        while($stmt -> fetch()) {
            array_push($users, $data);
        }
        $stmt -> close();
        
        return $users;
    }