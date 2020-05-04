<?php
require('db_connect.php');
require 'auth_redirect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project card</title>
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
            $('#form2').validate({
                rules: {
                    password: {
                        minlength: 6,
                    },
                    password_confirmation: {
                        equalTo: "#password",
                        // required: true,
                    },
            }
        });
        });

    </script>
</head>

<style>
    .topnav {
        padding-bottom: 9vw;
    }

    .main_title {
        font-size:calc(14px + 1.5vw);
        font-family: sans-serif;
        color: #4E515B;
        padding: 1vw;
        text-align: center;
        margin-bottom: 2vw;
    }


    .table {
        border: 1.2px solid black;
        font-family: sans-serif;
        font-size: calc(7px + 0.9vw);
        width:80%;
        margin-left: 10%;
    }

    th, td {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }

    .input[type=text] {
        width: 100%;
        padding: 0.4vw 1vw;
        box-sizing: border-box;
        border: 1.5px inset #f2f2f2;
        border-radius: 4px;
        font-size: calc(7px + 0.9vw);
        background-color: #f2fcff;
    }

    .input[type=password] {
        width: 100%;
        padding: 0.4vw 1vw;
        box-sizing: border-box;
        border: 1px solid #4E515B;
        border-radius: 4px;
        font-size: calc(7px + 0.9vw);
        margin-right: 2vw;
        background-color: #f2fcff;

    }

    .input[type=submit] {
        text-align: center;
        color: white;
        background-color: #FCC05E;
        font-size: calc(7px + 1.2vw);
        padding: 1.2vw 2.3vw 1.2vw 2.3vw;
        margin-left: 45.7vw;
        border-radius: 4px;
        margin-top: 1.5vw;
        margin-bottom: 5vw;
    }

    .input[type=submit]:hover {
        color: black;
    }

    .td1 {
        margin-left:40vw;
        border-bottom: 1px solid #4E515B;
    }

    a.cancel_button {
        background-color: #4E515B;
        color: white;
        padding: 1.2vw 3.3vw 1.2vw 3.3vw;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: calc(7px + 1.2vw);
        margin-left: 2vw;
        text-decoration: none;
        margin-top: 1.5vw;
        margin-bottom: 5vw;
    }

    a.cancel_button:hover {
        color: black;
    }

    .line_class {
        margin-top: 0.5vw;
        margin-bottom: 0.5vw;
    }

</style>

<div class="topnav">
    <?php
    require 'Frontend_header_ngo.php';
    ?>
</div>

<div>
    <div class="main_title">Edit <b><?php echo $_SESSION['user']['username']; ?></b> account details</div>
</div>

<form action="edit_ngo_details.php" method="post" id="form2">
    <table class="table">
        <tbody>
        <tr>
            <th scope="row">Organisation Name:</th>
            <td class="td1"><div class="line_class"><?php echo $_SESSION['user']['ngo_name']; ?><br />
                    <input class="input" type = "text" name = "ngo_name" placeholder ="Enter new organisation name here..."</div></td>
        </tr>
        <tr>
            <th scope="row">Username:</th>
            <td class="td1"><div class="line_class"><?php echo $_SESSION['user']['username']; ?><br />
                    <input class="input" type = "text" name = "username" placeholder = "Enter new username here..."></div></td>
        <tr>
            <th scope="row">E-mail:</th>
            <td class="td1"><div class="line_class"><?php echo $_SESSION['user']['email']; ?><br />
                    <input class="input" type = "text" name = "email" placeholder = "Enter new email here..."></div></td>
        </tr>
        <tr>
            <th scope="row">Address:</th>
            <td class="td1"><div class="line_class"><?php echo $_SESSION['user']['address']; ?><br /><input
                            class="input" type = "text" name = "address" placeholder ="Enter new address here..."></div>
            </td>
        </tr>
        <tr>
            <th scope="row">Password:</th>
            <td class="td1"><div class="line_class"><?php for ($x  = 1; $x <= strlen($_SESSION['user']['password']); $x+=1) {
                        echo "*";}; ?><br/><input
                            class="input" type = "password" id="password" name = "password" placeholder ="Enter new password here...">
                </div></td>
        </tr>
        <tr>
            <th scope="row">Confirm Password:</th>
            <td class="td1"><div class="line_class"><?php for ($x  = 1; $x <= strlen($_SESSION['user']['password']); $x+=1) {
                        echo "*";}; ?><br/><input
                            class="input" type = "password" id="password" name = "password_confirmation" placeholder ="Enter new password here...">
                </div></td>
        </tr>
        <tr>
            <th scope="row">Region of Operation:</th>
            <td class="td1"><div class="line_class"><?php echo $_SESSION['user']['countries_of_operation']; ?><br /><input
                            class="input" type = "text" name = "countries_of_operation"
                            placeholder ="Enter new countries of operation here...">
                </div></td>
        </tr>
        <tr>
            <th scope="row">Contact Person:</th>
            <td class="td1"><div class="line_class"><?php echo $_SESSION['user']['contact_person']; ?>
                <input class="input" type = "text" name = "contact_person" placeholder ="Enter new contact person here..."></div>
        </tr>
        <tr>
            <th scope="row">Organisation website:</th>
            <td class="td1"><div class="line_class"><?php echo $_SESSION['user']['website']; ?><br /><input
                            class="input" type = "text" name = "website" placeholder ="Enter new website here..."></div>
        </tr>
        <tr>
            <th scope="row">Number of employees:</th>
            <td class="td1"><div class="line_class"><?php echo $_SESSION['user']['number_of_employees']; ?><br /><input
                            class="input" type = "text" name = "number_of_employees" placeholder ="Enter new number of employees here..."></div>
        </tr>
        <tr>
            <th scope="row">Number of active volunteers:</th>
            <td class="td1"><div class="line_class"><?php echo $_SESSION['user']['number_of_volunteers']; ?><br />
                    <input class="input" type = "text" name = "number_of_volunteers"
                           placeholder ="Enter new number of active volunteers here..."></div>
        </tr>
        <tr>
            <th scope="row">Phone Number:</th>
            <td class="td1"><div class="line_class"><?php echo $_SESSION['user']['phone']; ?><br /><input
                            class="input" type = "text" name = "phone" placeholder ="Enter new phone number here..."></div>
        </tr>
        </tbody>
    </table>
    <div class="row">
        <input class="input" type="submit" value = "Save changes>">
        <a class="cancel_button" href="Frontend_View_NGO_Details.php">Cancel</a>
    </div>
</form>

</body>
</html>