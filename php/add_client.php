<?php
include "settings.php";

function add_client(
        $API_URL, $token, $first_name, $infix, $last_name, $id, $email,
        $date_of_birth, $gender
    ) {
    $url = $API_URL . 'c';

    $payload = array(
        "active" => true,
        "first_name" => $first_name,
        "infix" => $infix,
        "last_name" => $last_name,
        "id" => $id,  # Client id is a non-default setting in the application.
        "email" => $email,
        "date_of_birth" => $date_of_birth,
        "gender" => $gender
    );

    $result = json_decode(post($url, $payload, $token));
    var_dump($result);
}

function add_client_random($API_URL, $token) {
    $first_name = random_first_name();
    $infix = random_infix();
    $last_name = random_last_name();
    add_client(
        $API_URL,
        $token,
        $first_name,
        $infix,
        $last_name,
        random_id(),
        random_email($first_name, $infix, $last_name),
        random_date_of_birth(),
        random_gender());
}

function add_client_command_line() {
    $first_name = $argv[3];
    $infix = $argv[4];
    $last_name = $argv[5];
    $id = $argv[6];
    $email = $argv[7];
    $date_of_birth = $argv[8];
    $gender = $argv[9];
    add_client(
        $API_URL,
        $token,
        $first_name,
        $infix,
        $last_name,
        $id,
        $email,
        $date_of_birth,
        $gender);
}

add_client_random($API_URL, $token);
