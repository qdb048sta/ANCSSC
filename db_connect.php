<?php $link = mysqli_connect("0067team2.mysql.database.azure.com", "team2design@0067team2", "!Mmaplestory123", "test");


if ($link == null) {
    echo "Error: Could not establish SQL connection." . PHP_EOL;
    echo "Error num: " . mysqli_connect_errno() . PHP_EOL;
    echo "Error text: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

?>