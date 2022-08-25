<?php



error_reporting(0);
session_start();
if ($_FILES['avatar']) {
    $avatar = 'og-' . md5(time() . $_FILES['avatar']['name']) . '.' . strtolower(end(explode(".", $_FILES['avatar']['name'])));
    if ($avatar) {
        move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/' . $avatar);
    }

    //API URL
    $apiURL = "https://api.remove.bg/v1.0/removebg";

    //CURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiURL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'x-api-key:6Gx1qrqCzEnQdGQziSa4WHAX',
    ]);

    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'image_url' => 'https://hounslowpassportphotoshop.co.uk/uploads/' . $avatar,
        'size' => 'auto'
    ]);

    $server_output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $_SESSION['server_output'] = $server_output;
    $_SESSION['httpcode'] = $httpcode;

    $response = json_decode($_SESSION['server_output']);
    // print_r($response);
    $imageOutput = 'uploads/rm-' . $avatar;
    //Save image
    $content = file_put_contents($imageOutput, $server_output);
    if ($content === FALSE) {
        echo 'Something went wrong with the API';
    } else {
        if ($httpcode == 200) {
            echo 'https://hounslowpassportphotoshop.co.uk/uploads/rm-' . $avatar;
        } else {
            echo 'https://hounslowpassportphotoshop.co.uk/uploads/' . $avatar;
        }
        $_SESSION['rmPhoto'] = 'https://hounslowpassportphotoshop.co.uk/uploads/rm-' . $avatar;
        $_SESSION['ogPhoto'] = 'https://hounslowpassportphotoshop.co.uk/uploads/' . $avatar;
    }
}
