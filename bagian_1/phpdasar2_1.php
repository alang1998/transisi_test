<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Dasar 2 Soal Nomer 2</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        tr td {
            padding: 10px 20px;
            text-align: center;
        }

        .black {
            color: white;
            background-color: black;
        }
    </style>
</head>
<body>
    <table>
    <?php
        for ($x=1; $x <= 64; $x++){
            if($x%8 ==1) {
                echo "<tr>";
            }
            $class = ($x%4 == 0 || $x%3 == 0) ? '' : 'black';
            echo "<td class='$class'>" . $x . "</td>";
        }
    ?>
    </table>
</body>
</html>