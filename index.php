<?php

namespace Upload\index;
use Upload\Main\Main;

require 'Main.php';

    $Main = new Main($_FILES);
    print_r($_FILES);
    $Main->checkError();
    print_r($Main->Ex(false,true));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    <form method="post" action="index.php" enctype="multipart/form-data" >
        <input name="text" type="text">
        <input name="file" type="file">
        <input name="sub" type="submit">
    </form>

</body>
</html>
