<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    include('connect.php');
    include('fun.php');

    $result = $mysqli->query('SELECT * FROM `www`');
    while ($row = $result->fetch_object()) {
        echo "<b>" . smile($row->text) . "</b> <i>$row->name</i><br>\n";
    }

    $result->free();
    $mysqli->close();
    ?>

    <form action="add.php" method="POST">
        <textarea name="text" cols="30" rows="10"></textarea><br>
        <input type="text" name="name"><br>
        <input type="submit" value="OK"><br>

    </form>

</body>



</html>