<?php require 'auth_redirect.php'; ?>

<?php
require 'db_connect.php';


if (isset($_POST['submit'])) {
    $query_insert = "INSERT INTO `projects` (`id_sector_f`, `id_user_f`, `project_name`, `project_summary`,
                    `project_description`, `project_keywords`, `project_ngo_name`, `project_location`, `project_contact_person`, 
                        `project_email`, `project_phone`, `project_website`, `project_sdg`, `project_timeline`, `project_budget`, 
                        `project_beneficiaries`) VALUES ('{$_POST['sector_id']}', '{$_SESSION['user']['id_user']}', '{$_POST['projectname']}', 
                                                         '{$_POST['projectsummary']}', '{$_POST['projectdescription']}', '{$_POST['keywords']}', 
                                                         '{$_POST['NGOname']}', '{$_POST['Location']}', '{$_POST['ContactName']}', '{$_POST['ContactEmail']}', 
                                                         '{$_POST['ContactNumber']}', '{$_POST['Website']}', '{$_POST['sdg_id']}', '{$_POST['Date']}', '{$_POST['project_budget']}', 
                                                         '{$_POST['project_beneficiaries']}')";
    $queryResult = mysqli_query($link, $query_insert);
    if ($queryResult == null) {
        echo "Query error - could not upload information";
        exit;
    } else {
        header('Location: Frontend_NGO_My_Projects.php');
    }
}

?>

<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD NEW PROJECT</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="jquery-3.1.1.js"></script>
    <script>
        $(document).ready(function () {
            $.each(sdgSecArr, function (sdgId, sdgArr) {
                $('#select_sdg').append('<option value="' + sdgId + '">' + sdgArr['sdg_num'] + '. ' + sdgArr['sdg_name'] + '</option>');
            });
            $('#select_sdg').prop('disabled', false);
            $('#select_sdg').on('change', function () {
                $('#select_sector').empty().append('<option value="0"></option>');
                $('#select_sector option[value=0]').prop('selected', true);
                var sdgId = $('#select_sdg').val();
                if (sdgId == 0) {
                    $('#select_sector').prop('disabled', true);
                } else {
                    $.each(sdgSecArr[sdgId]['sectors'], function (key, sector) {
                        $('#select_sector').append('<option value="' + sector['sec_id'] + '">' + sector['sec_name'] + '</option>');
                    });
                    $('#select_sector').prop('disabled', false);
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
        font-weight: bold;
        padding: 1vw;
        margin-left: 25vw;
        margin-bottom: 1.5vw;
    }

    .row {
        width: 100%;
        display: flex;
    }

    .info_card {
        font-family: fontawesome;
        line-height: 3vw;
        border-style: solid;
        border-width: calc(1px + 0.3vw);
        border-radius: 14px;
        border-color: #FCC05E;
        padding: 1vw;
        padding-right: 4vw;
    }

    * {
        box-sizing: border-box;
    }

    .input[type=text], select,  textarea {
        width: 90%;
        font-size: calc(7px + 0.9vw);
        padding: 0.4vw;
        border-style: inset;
        border-radius: 4px;
        resize: vertical;
        font-family: sans-serif;
        margin-bottom: 0.6vw;
        border-width: 0.15vw;
        border-color: #f2f2f2;
        background-color: #f2fcff;
    }

    .card_text {
        font-size: calc(7px + 0.9vw);
        font-family: sans-serif;
        border-width: 0.15vw;
        border-radius: 4px;
        background-color: #f2fcff;
        padding: 0.4vw;
        margin-bottom: 0.6vw;
    }


    .label {
        font-size: calc(7px + 0.9vw);
        padding: 0.4vw;
        display: inline-block;
        font-family: sans-serif;
        color: #4E515B;
    }

    .input[type=submit] {
        background-color: #FCC05E;
        color: white;
        padding: 1.2vw 2.3vw 1.2vw 2.3vw;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        font-size: calc(7px + 1.2vw);
        margin-top: 2vw;
        margin-left: 33vw;
    }

    .input[type=submit]:hover {
        color: black;
    }

    .text {
        width: 90%;
        font-size: calc(7px + 0.9vw);
        padding: 0.4vw;
        border-style: inset;
        border-radius: 4px;
        resize: vertical;
        font-family: sans-serif;
        margin-bottom: 0.6vw;
        border-width:1.5px;
        border-color: #f2f2f2;
        background-color: #f2fcff;
    }

    a.cancel_button {
        background-color: #4E515B;
        color: white;
        padding: 1.2vw 2.3vw 1.2vw 2.3vw;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: calc(7px + 1.2vw);
        margin-top: 2vw;
        margin-left: 2vw;
        font-family: sans-serif;
        text-decoration: none;
        text-align: center;
    }


    a.cancel_button:hover {
        color: black;
    }

    .select {
        font-size: 1.3vw;
        font-family: sans-serif;
    }

    .container {
        border-radius: 5px;
        padding: 0.5vw;
        float: left;
        width: 100%;
    }

    .textbox {
        font-family: sans-serif;
        font-size: calc(7px + 0.9vw);
        padding-bottom: 12vw;
    }

    .col-25 {
        float: left;
        width: 20%;
        margin-top: 0.6vw;
        margin-left: 1.5vw;
    }

    .col-75 {
        float: left;
        width: 70%;
        margin-top: 0.6vw;
        margin-left: 1.5vw;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    .col-1 {
        width: 70%;
        float: left;
    }

    .col-2 {
        width: 28%;
        max-width: 70vw;
        float: left;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
        .col-1, .col-2 {
            width: 100%;
            margin-top: 2vw;
            margin-bottom: 2vw;
        }


</style>

<body>

<div class="topnav">
    <?php

    require 'Frontend_header_universal.php';

    $query = "SELECT * FROM SDG order by sdg_num";

    $queryResult = mysqli_query($link, $query);
    if ($queryResult == null) {
        echo "First query error";
        exit;
    }

    $SDG_sector_array = array();

    while ($row = mysqli_fetch_assoc($queryResult)) {
        $SDG_sector_array[$row['id_sdg']] = array("sdg_id" => $row['id_sdg'], "sdg_name" => $row['sdg_name'], "sdg_num" => $row['sdg_num'], "sectors" => array());
    }
    foreach ($SDG_sector_array as $k => $v) {
        $query2 = "SELECT * FROM sectors WHERE id_sdg_f = $k ORDER BY sector_name";
        $queryResult2 = mysqli_query($link, $query2);
        if ($queryResult2 == null) {
            echo "Second query error";
            exit;
        }

        while ($row2 = mysqli_fetch_assoc($queryResult2)) {
            $SDG_sector_array[$k]['sectors'][] = array("sec_id" => $row2['id_sectors'], "sec_name" => $row2['sector_name']);
        }
    }

    echo '<script> var sdgSecArr = ';
    echo json_encode($SDG_sector_array);
    echo ';</script>';
    mysqli_close($link);

    ?>

</div>

<div class="main_title">ADD A NEW PROJECT</div>

<form action='' method="post">
    <div class="col-1">
        <div class="container">
            <div class="row">
                <div class="col-25">
                    <label class="label" for="projectname">Add Project Name<br>(alphanumeric only)</label>
                </div>
                <div class="col-75">
                    <input class="input" type="text" id="projectid" name="projectname" placeholder="Add a project name">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="label" for="SDG">Choose SDG</label>
                </div>
                <div class="col-75">
                    <select class="text" id="select_sdg" name="sdg_id" disabled>
                        <option value="0" selected disabled></option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="label" for="Sector">Choose Sector</label>
                </div>
                <div class="col-75">
                    <select class="text" id="select_sector" name="sector_id" disabled>
                        <option value="0" selected disabled></option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="label" for="keywords">Project keywords</label>
                </div>
                <div class="col-75">
                    <input class="input" type="text" id="keywords" name="keywords" placeholder="Add the project keywords">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="label" for="projectsummary">Project summary</label>
                </div>
                <div class="col-75">
                    <input class="input" type="text" id="projectsummary" name="projectsummary"
                           placeholder="Add a brief project summary (2 lines or less)">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="label" for="projectdescription">Add Project Description</label>
                </div>
                <div class="col-75">
                <textarea class="textbox" id="projectdescription" name="projectdescription"
                          placeholder="Add your project description.."
                ></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="info_card">

            <ul class="fa-ul">
                <li><span class="fa-li"><i class="fas fa-briefcase"></i></span>
                    <input class="card_text" type="text" id="NGOname" name="NGOname" placeholder="NGO name"></li>
                <li><span class="fa-li"><i class="fas fa-location-arrow"></i></span>
                    <input class="card_text" type="text" id="Location" name="Location" placeholder="Project Location"></li>
                <li><span class="fa-li"><i class="far fa-dollar"></i></span><select class="card_text" type="text" name="project_budget">
                        <option value="" selected disabled></option>
                        <option value="Very Low">Very Low</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                        <option value="Very High">Very High</option></select></li>
                <li><span class="fa-li"><i class="far fa-handshake-o"></i></span><input class="card_text" type="text" name="project_beneficiaries"
                                                                                        placeholder="Beneficiaries"></li>
                <li><span class="fa-li"><i class="fas fa-user"></i></span>
                    <input class="card_text" type="text" id="ContactName" name="ContactName" placeholder="Contact Name"></li>
                <li><span class="fa-li"><i class="fas fa-at"></i></span>
                    <input class="card_text" type="text" id="ContactEmail" name="ContactEmail" placeholder="Contact email"></li>
                <li><span class="fa-li"><i class="fas fa-phone"></i></span>
                    <input class="card_text" type="text" id="ContactNumber" name="ContactNumber" placeholder="Contact Number">
                </li>
                <li><span class="fa-li"><i class="fas fa-laptop"></i></span>
                    <input class="card_text" type="text" id="Website" name="Website" placeholder="NGO Website"></li>
                <li><span class="fa-li"><i class="far fa-calendar"></i></span>
                    <input class="card_text" type="text" id="Date" name="Date" placeholder="Dates from/to"></li>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <input class="input" type="submit" name="submit" value="Save Project">
        <a class="cancel_button" href="Frontend_NGO_My_Projects.php">Cancel</a>
    </div>
</form>

</body>
</html>