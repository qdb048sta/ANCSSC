<?php
require 'db_connect.php';


if (isset($_POST['submit'])) {
    $password = md5($_POST['password']);
    echo $query2 = "INSERT INTO `users` (`ngo_name`, `address`, `contact_person`, `phone`, `email`, `number_of_employees`, `number_of_volunteers`, `username`, `password`, `website`, `countries_of_operation`) VALUES ('{$_POST['NGO']}', '{$_POST['address']}', '{$_POST['contact']}', '{$_POST['phone']}', '{$_POST['email']}', '{$_POST['employee_number']}', '{$_POST['volunteer_number']}', '{$_POST['username']}', '$password', '{$_POST['Website']}', '{$_POST['region']}');";
    $queryResult = mysqli_query($link, $query2);
    if ($queryResult == null) {
        echo "Query error - could not upload information";
        exit;
    } else {
        header('Location: Frontend_Welcome_NGO.php');
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="dist_form/jquery.js"></script>
    <script src="dist_form/jquery.validate.js"></script>
    <script>
        $(document).ready(function () {
                $('#form1').validate({
                    rules: {
                        email: {
                            email: true,
                            required: true
                        },
                        phone: {
                            required: true
                        },
                        address: {
                            required: true
                        },
                        NGO: {
                            required: true
                        },
                        password: {
                            minlength: 6,
                            required: true
                        },
                        password_confirmation: {
                            minlength: 6,
                            equalTo: "#password",
                            required: true
                        },
                        Website: {
                            required: true

                        },
                        username: {
                            required: true
                        },


                    }
                });
        });

    </script>
</head>

<style>
    .topnav {
        padding-top: 2vw;
        padding-bottom: 9vw;
    }

    .input[type=text], input[type=password], select, textarea {
        width: 90%;
        padding: 0.4vw 1vw;
        border: 1px solid #4E515B;
        border-radius: 4px;
        resize: vertical;
        font-size: calc(7px + 0.9vw);
    }

    .main_title {
        font-size:calc(14px + 1.5vw);
        font-family: sans-serif;
        color: #4E515B;
        font-weight: bold;
        padding: 1vw;
        text-align: center;
    }

    .input {
        font-family: sans-serif;
        font-size: calc(7px + 0.9vw);
    }

    .input[type=submit] {
        background-color: #FCC05E;
        color: white;
        font-size: calc(7px + 1.2vw);
        padding: 1.2vw 2.3vw 1.2vw 2.3vw;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        margin-left: 63vw;
        margin-top: 2.5vw;
    }

    .input[type=submit]:hover {
        background-color: #4E515B;
    }

    .input[type=file] {
        font-family: sans-serif;
        font-size: calc(7px + 0.9vw);
        margin-top: 0.8vw;
    }


    .label {
        font-size: calc(7px + 0.9vw);
        color: #4E515B;
        margin-top: 0.8vw;
    }

    .container {
        width: 100%
        border-radius: 0.5vw;
        padding: 0.5vw;
        margin-left: auto;
        margin-right: auto;
        display: table;
    }

    .col-25 {
        float: left;
        width: 48%;
        margin-top: 0.6vw;
        margin-left: 1.5vw;
        display: table-cell;
    }

    .col-75 {
        float: left;
        width: 48%;
        margin-top: 0.6vw;
        margin-left: 1.5vw;
        display: table-cell;

    }

    .row {
        display: table-row;
    }

    .button {
        margin-right: 4vw;
    }

    .project_description {
        font-size: calc(7px + 0.9vw);
        width: 80vw;
        margin-left:10vw;
        margin-top: 1.5vw;
        /*padding-bottom: 1.5vw;*/
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 60vw) {
        .col-25, .col-75, .input[type=submit] {
            width: 100%;
            margin-top: 0;
        }

</style>

<div class="topnav">
    <?php
    require 'Frontend_header_guest.php';
    ?>


</div>

<body>
<div class="main_title">SIGN UP</div>

<div class="container">
    <form action="" method="post" id="form1">
        <div class="row">
            <div class="col-25">
                <input class="input" type="text" id="NGO" name="NGO" placeholder="Add NGO name: *">
            </div>
            <div class="col-75">
                <input class="input" type="text" id="employee_number" name="employee_number"
                       placeholder="Number of Employees:">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <input class="input" type="text" id="region" name="region" placeholder="Region of Operation:">
            </div>
            <div class="col-75">
                <input class="input" type="text" id="volunteer_number" name="volunteer_number"
                       placeholder="Number of active volunteers:">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <input class="input" type="text" id="address" name="address" placeholder="Address: *">
            </div>
            <div class="col-75">
                <input class="input" type="text" id="Website" name="Website" placeholder="Organisation Website: *">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <input class="input" type="text" id="contact" name="contact" placeholder="Person of contact:">
            </div>
            <div class="col-75">
                <input class="input" type="text" id="username" name="username" placeholder=" Create Username: *"
                       required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <input class="input" type="text" id="phone" name="phone" placeholder="Phone number: *">
            </div>
            <div class="col-75">
                <input class="input" type="password" id="password" name="password" placeholder="Create password: *">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <input class="input" type="text" id="email" name="email" placeholder="Email: *">
            </div>
            <div class="col-75">
                <input class="input" type="password" id="password" name="password_confirmation"
                       placeholder="Confirm password: *">
            </div>
        </div>
        <div class="row">
            <div class="project_description">After signing up, the ANCSSC will review your
                application, and it may be 1-2 days before your login details work
            </div>
        </div>
        <div class="row">
            <input class="input button" type="submit" name="submit" value="Sign Up >">
        </div>
    </form>
</div>


</body>
</html>