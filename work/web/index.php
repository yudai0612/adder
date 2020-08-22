<?php
    require_once('../app/Adder.php');
    $x = [1,1];
    $y = [1,1,1];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>加算器作り</title>
</head>
<body>
    <p><?php print_r( Adder::exec($x, $y) ); ?></p>
</body>
</html>