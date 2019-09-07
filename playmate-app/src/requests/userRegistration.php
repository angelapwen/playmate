<?php
    require_once '../phpFunctions/SQLworker.php';
    require_once '../phpFunctions/userManagement.php';
    
    header("Content-Type: application/json");

    // Fetch data from JavaScript request
    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str, true);
    $username = filterString($json_obj['username']);
    $phone = $json_obj['phone'];
    $password1 = $json_obj['password1'];
    $password2 = $json_obj['password2'];

    if ($password1 !== $password2) {
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

   
    // // Validate username check
    // if (!isValidUsername($username)) {
    //     echo json_encode(array(
    //         'success' => false,
    //         'message' => 'Invalid username: Must consist of only alphanumeric characters and 1-50 characters in length.'
    //     ));
    //     exit();
    // }
    // // Validate nickname check
    // else if (!isValidNickname($nickname)) {
    //     echo json_encode(array(
    //         'success' => false,
    //         'message' => 'Invalid nickname: Must consist of only alphanumeric characters and/or spaces and 1-50 characters in length.'
    //     ));
    //     exit();
    // }
    // // Validate password check
    // else if (!isValidPassword($password1)) {
    //     echo json_encode(array(
    //         'success' => false,
    //         'message' => 'Invalid password: Must be between 1-75 (inclusive) characters in length.'
    //     ));
    //     exit();
    // }
    // // Validate passwords match
    // else if ($password1 !== $password2) {
    //     echo json_encode(array(
    //         'success' => false,
    //         'message' => 'Passwords do not match. Please try again and type CAREFULLY.'
    //     ));
    //     exit();
    // }
    // // Validate username isn't already taken
    // else if (usernameIsTaken($username)) {
    //     echo json_encode(array(
    //         'success' => false,
    //         'message' => 'This username has already been registered by another user. Please enter another appropriate username.'
    //     ));  
    //     exit();
    // }
    // // Validate nickname isn't already taken
    // else if (nicknameIsTaken($nickname)) {
    //     echo json_encode(array(
    //         'success' => false,
    //         'message' => 'This nickname has already been registered by another user. Please enter another appropriate nickname.'
    //     ));  
    //     exit();
    // }
    // All checks passed, commit the new user to the database
   