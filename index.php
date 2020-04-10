<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            padding: 10px;
            background-color: azure;
        }

        .pageination a {
            color: green;
        }


        .selectedpage {
            color: blue !important;
            font-weight: bold;
        }

        .ban {
            position: absolute;
            color: red;
            font-size: 50px;
            margin-left: 550px;
            margin-top: 100px;
        }

        .number_records {
            color: darkred;
            font-size: 20px;
            font-family: cursive;
        }

        table td {
            font-size: 25px;
            border: 1.5px solid black;
            font-family: Arial, Helvetica, sans-serif;
            color: darkslateblue;
            padding: 5px;
        }

        a {
            font-size: 20px;

        }

        .time {
            color: darkred;
            font-size: 20px;
            font-family: cursive;
        }

        b {
            color: black;
        }

        input {
            border: 1px solid black;
        }

        textarea {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <?php

    // https://gbladik.herokuapp.com/

    // Username: mPjtK2pney
    // Database name: mPjtK2pney
    // Password: oyJJjg54j1
    // Server: remotemysql.com
    // Port: 3306
    //SELECT COUNT(*) as count FROM www

    include('config.php');
    include('connect.php');
    include('fun.php');



    //Бан
    if (isset($_SESSION['bantime']) && ($_SESSION['bantime'] > time())) {
        echo "<div class='ban'>" . "Вы забанены на: " . ($_SESSION['bantime'] - time()) . " с" . "<br>" . "</div>";
    }


    // Счетчик посещений
    if (isset($_SESSION['pagevisits'])) {
        echo "<div class='number_records'>" . "Колличество посещений страницы = " . "<b>" .
            $_SESSION['pagevisits'] = $_SESSION['pagevisits'] + 1 . "</b>" . "<br>" . "</div>" . "<br>";
    }


    // Время прошедшее с момента посещения
    if (!empty($_REQUEST['resetCountdown'])) {
        unset($_SESSION['startTime']);
    }

    if (empty($_SESSION['startTime'])) {
        $_SESSION['startTime'] = time();
    }
    $startTime = time() - $_SESSION['startTime'];
    echo "<div class = 'time'><b>$startTime</b>  секунд назад вы посещали эту страницу </div><br>";
    // session_start();
    // $counter = $_COOKIE["counter"];
    // if (!isset($counter))
    //     $counter = date('Y-m-d H:i:s');
    // else
    //     $counter = $counter;
    // echo $counter;

    // Время посещения страницы




    // Подсчет колличества записей и добавление таблицы
    $result_count = $mysqli->query('SELECT count(*) FROM `www`');
    $count = $result_count->fetch_array(MYSQLI_NUM)[0];
    echo "<div class='number_records'> Количество записей: <b>$count</b> </div>" . "<br>";
    $result_count->free();
    // echo $pagesize;




    // Добавление ссылок
    $pagecount = ceil($count / $pagesize);
    $curientpage = $_GET['page'] ?? 1;
    $startrow = ($curientpage - 1) * $pagesize;
    $pageination = "<div class='pageination'>\n";

    for ($i = 1; $i <= $pagecount; $i++) {
        // if ($curientpage == $i) {
        //     $str = " class='selectedpage'";
        // } else {
        //     $str = "";
        // }
        $str = ($curientpage == $i) ? " class='selectedpage'" : "";
        $pageination .= "<a  href = '?page=$i' $str>$i</a>\n";
    }
    $pageination .= "</div>";
    $result = $mysqli->query("SELECT * FROM `www` LIMIT $startrow, $pagesize");
    echo $pageination;




    // разметка таблицы
    echo "<table>\n";
    while ($row = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>" . smile($row->text) . "</td>";
        echo "<td>" . $row->name . "</td>";
        echo "</tr>";
    }
    echo "</table>\n";
    echo $pageination;


    $result->free();
    $mysqli->close();
    ?>

    <form action="add.php" method="POST">
        <textarea name="text" cols="20" rows="5"></textarea><br>
        <input type="text" name="name"><br>
        <input type="submit" value="OK"><br>

    </form>

</body>



</html>