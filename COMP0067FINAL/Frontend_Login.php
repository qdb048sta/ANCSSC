<?php require 'auth.php'; ?>

<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <style>
        .topnav {
            padding-bottom: 9vw;
        }

        .main_title {
            font-size: 2.4vw;
            font-family: sans-serif;
            color: #4E515B;
            font-weight: bold;
            margin-top: 2vw;
            text-align: center;
        }

        .input[type=text], select, textarea {
            width: 40%;
            padding: 0.8vw;
            border: 0.1vw solid #4E515B;
            font-family: sans-serif;
            border-radius: 0.4vw;
            resize: vertical;
            font-size: 1.2vw;
            text-align: center;
            margin-left: 28.5vw;
        }

        .input[type=password], select, textarea {
            width: 40%;
            padding: 0.8vw;
            border: 0.1vw solid #4E515B;
            font-family: sans-serif;
            border-radius: 0.4vw;
            resize: vertical;
            font-size: 1.2vw;
            margin-top: 1vw;
            text-align: center;
            margin-left: 28.5vw;
        }

        .input[type=submit] {
            background-color: #FCC05E;
            font-family: sans-serif;
            width: 12vw;
            padding: 1vw;
            color: white;
            border: none;
            border-radius: 0.4vw;
            font-size: 1.4vw;
            margin-left: 58vw;
            margin-top: 2.5vw;
        }

        .input[type=submit]:hover {
            background-color: #4E515B;
            color: white;
        }

        .login_form {
            margin-top: 2vw;
        }

        .message {
            text-align: center;
            font-family: sans-serif;
            font-size: 1.5vw;
            color: indianred;


        }


    </style>
</head>
<body>
<div class="topnav">
    <?php
    require 'Frontend_header_guest_non_login.php';
    ?>
</div>

<div class="main_title">LOGIN</div>

<?php
if ($_SESSION['last_login'] == 'unsuccessful') {
    echo '<div class=\'message\'><p>Login unsuccessful! Please try again.</p></div>';
}
if ($_SESSION['last_login'] == 'not_confirmed') {
    echo '<div class=\'message\'><p>You have not been confirmed yet. Please wait until your account is confirmed!</p></div>';
}

?>


<form class="login_form" action='' method="post">
    <div class="row">
        <input class="input" type="text" id="username" name="username" placeholder="Username">
    </div>
    <div class="row">
        <input class="input" type="password" name="password" placeholder="Password" id="password">
    </div>
    <div class="row">
        <input class="input" type="submit" name="submit" value="Log In">
    </div>
</form>

</body>
</html>
