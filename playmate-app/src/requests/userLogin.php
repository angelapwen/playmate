<?php
    require_once '../phpFunctions/SQLworker.php';
    require_once '../phpFunctions/userManagement.php';
    
    header("Content-Type: application/json");

    // Fetch data from JavaScript request
    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str, true);
    $username = filterString($json_obj['username']);
    $password = $json_obj['password'];

    if (!(testLogIn($username,$password))) {
             echo json_encode(array(
                 'success' => false,
                 'message' => 'Passwords do not match. Please try again and type CAREFULLY.'
             ));
             exit();
         }
    else {
        commitUserToDatabase($username, $password1, $phone);
        logInUser($username);  
        echo json_encode(array(
            'success' => true,
            'message' => 'Username successfully registered. Welcome!'
        ));      
        exit();
    }
?>