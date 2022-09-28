<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $data = json_decode(file_get_contents('php://input'), true);

    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $email = $data['email'];
    $phonenumber = $data['phonenumber'];
    $password = sha1($data['password']);

    $sql = "INSERT INTO users (firstname, lastname, email, phonenumber, password ) VALUES(?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password]);
    $payload = [
        'status' => TRUE,
        'message' => 'Successfully saved.'
    ];
    $payload['status'] = TRUE;
    $payload['message'] = 'Successfully saved.';

    if ($result === FALSE) {
        $payload['status'] = FALSE;
        $payload['message'] = 'There were erros while saving the data.';
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($payload);
} else {
    http_response_code(404);
}
