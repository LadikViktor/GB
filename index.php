<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .pageination {
            color: red;
        }

        .selectedpage {
            color: blue;
            font-weight: bold;
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


    $result_count = $mysqli->query('SELECT count(*) FROM `www`');
    $count = $result_count->fetch_array(MYSQLI_NUM)[0];
    // echo "количество записей: " . $count;
    $result_count->free();
    // echo $pagesize;

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

    echo "<table border='1'>\n";
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
        <textarea name="text" cols="30" rows="10"></textarea><br>
        <input type="text" name="name"><br>
        <input type="submit" value="OK"><br>

    </form>

</body>



</html>