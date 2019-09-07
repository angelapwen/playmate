<?php
    require_once '../phpFunctions/SQLworker.php';
    require_once '../phpFunctions/userManagement.php';
    
    header("Content-Type: application/json");

    // Fetch data from JavaScript request
    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str, true);
    $firstname = filterString($json_obj['firstname']);
    $lastname = filterString($json_obj['lastname']);
    $age = filterString($json_obj['age']);
    $street=filterString($json_obj['street']);
    $city=filterString($json_obj['city']);
    $state=filterString($json_obj['state']);
    $travel_distance=filterString($json_obj['travel_distance']);


    if (!(testLogIn($username,$password))) {
             echo json_encode(array(
                 'success' => false,
                 'message' => 'Wrong Password!'
             ));
             exit();
         }
    else {
        commitUserToDatabase($username, $password1, $phone);
        logInUser($username);  
        echo json_encode(array(
            'success' => true,
            'message' => 'Redirecting, Please Wait!'
        ));      
        exit();
    }
?>