<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['name']) && isset($_POST['email']) && !empty($_POST['name']) && !empty($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('content-type:image/jpeg');
        $image = imagecreatefromjpeg("cert.jpg");
        $n = count(explode(" ", $name));
        list($left, $bottom, $right, , , $top) = imageftbbox(170 - ($n * 15), 0, "Roboto-Regular.ttf", $name);
        $left_offset = ($right - $left) / 2;
        imagettftext($image, 170 - ($n * 15), 0, 3508/2 - $left_offset, 1050, 000, "Roboto-Regular.ttf", $name);
        imagejpeg($image, "certificates/$name.jpg");
        // readfile("certificates/$name.jpg");
        imagedestroy($image);
        echo "certificates/$name.jpg";
    }

}