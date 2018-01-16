<?php

namespace Upload\index;
use Upload\Main\Main;

require 'src/Main.php';

    if (isset($_POST['sub'])){

        $Main = new Main($_FILES);
        print_r($Main->oneHandUpload());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body style="background-color: #00000f;color: #fff;">

    <form method="post" action="index.php" enctype="multipart/form-data" >
        <input name="text" type="text">
        <input name="file" type="file">
        <input name="sub" type="submit">
    </form>

</body>
</html>
