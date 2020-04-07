<?php
session_start();

include('fun.php');
include('config.php');
include('connect.php');


if (!(isset($_SESSION['bantime']) && ($_SESSION['bantime'] > time()))) {

    if (cens($_POST['text'])) {
        $mysqli->query(
            "INSERT INTO `www` VALUES (NULL, '$_POST[text]', '$_POST[name]')"
        );
    } else {
        $_SESSION['bantime'] = time() + 30;
    }
}

// if (!empty($_POST['text']) && !empty($_POST['name'])) {
//     $mysqli->query(
//         "INSERT INTO `www` VALUES (NULL, '$_POST[text]', '$_POST[name]')"
//     );
//     header('Location: index.php');
// }
$mysqli->close();

header('Location: index.php');
