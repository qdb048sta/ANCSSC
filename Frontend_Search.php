<?php require 'auth_redirect.php'; ?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
<script src="jquery-3.1.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style>
    .topnav {
        padding-bottom: 9vw;
    }

    .main_title {
        font-size:calc(14px + 1.5vw);
        font-family: sans-serif;
        color: #4E515B;
        font-weight: bold;
        padding: 1vw;
        text-align: center;
    }

    .search_button {
        text-align: center;
        color: white;
        background-color: #FCC05E;
        font-size:calc(10px + 1.3vw);
        width: 18vw;
        min-width: 100px;
        margin-left: 2vw;
        border-radius: 4px;
        padding: 0.6vw 1.5vw 0.6vw 1.5vw;
        font-family: sans-serif;
        text-decoration: none;
    }

    .search_button:hover {
        background-color: #4E515B;
    }

    .input[type=text], select, textarea {
        width: calc(30px + 50vw);
        text-align: center;
        color: black;
        font-size:calc(12px + 1.3vw);
        font-family: sans-serif;
        border: 1px solid #4E515B;
        border-radius: 4px;
        margin-left: 10vw;
    }

    .container {
        width: 100%;
    }

    form {
        width: 100%;
    }

    .row {
        flex-wrap: nowrap;
    }


</style>
</head>
<body>
<div class="topnav">
    <?php require 'Frontend_header_universal.php'; ?>
</div>
<div class="main_title">SEARCH</div>
<div class="container">
    <form action="Frontend_Search_Results.php" method="get">
        <div class="row">
            <input class="input" type="text" placeholder=" Search for projects:" id="gsearch" name="gsearch" required>
            <input type="submit" class="search_button" value="Search >">
        </div>
    </form>
</div>
</body>
</html>
