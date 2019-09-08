<?php
    require_once '../phpFunctions/SQLworker.php';
    require_once '../phpFunctions/userManagement.php';
    
    header("Content-Type: application/json");

    // Fetch data from JavaScript request
    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str, true);
    $first_name = filterString($json_obj['first_name']);
    $last_name = filterString($json_obj['last_name']);
    $age = filterString($json_obj['age']);
    $street=filterString($json_obj['street']);
    $city=filterString($json_obj['city']);
    $state=filterString($json_obj['state']);
    $travel_distance=filterString($json_obj['travel_distance']);
    $email=filterString($json_obj['email']);


    //Push into people database
    //Would need to check if insert is successful or not
    insertUserToDatabase($first_name, $last_name, $age, $street, $city, $state,$travel_distance,$email);
    echo json_encode(array(
        'success' => true,
        'message' => 'Information Saved Successfully!'
    ));      
    exit();
?>