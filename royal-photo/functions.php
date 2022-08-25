<?php





error_reporting(0);
header("Cache-Control: no-cache");
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
        'x-api-key:8NZJa4Cn6cMoitoK3LTjZnuL',
    ]);

    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'image_url' => 'https://hounslowpassportphotoshop.co.uk/v2/uploads/' . $avatar,
        'size' => 'auto'
    ]);

    $server_output = curl_exec($ch);
    curl_close($ch);

    $imageOutput = 'uploads/rm-' . $avatar;
    //Save image
    $content = file_put_contents($imageOutput, $server_output);
    if ($content === FALSE) {
        echo 'Something went wrong with the API';
    } else {
        echo 'https://hounslowpassportphotoshop.co.uk/v2/uploads/rm-' . $avatar;
    }
}
