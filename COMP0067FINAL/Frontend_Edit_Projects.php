<?php require 'auth_redirect.php'; ?>

<?php
require 'db_connect.php';


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
                $('#select_sector').empty();
                $('#select_sector option[value=0]').prop('selected', true);
                var sdgId = $('#select_sdg').val();
                if (sdgId == 0) {
                    $('#select_sector').prop('disabled', true);
                } else {
                    $.each(sdgSecArr[sdgId]['sectors'], function (key, sector) {
                        $('#select_sector').append('<option value="' + sector['sec_id'] + '" selected>' + sector['sec_name'] + '</option>');
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
        font-size:2.4vw;
        font-family: sans-serif;
        font-weight: bold;
        padding: 1vw;
        margin-left: 25vw;
        margin-bottom: 1.5vw;
    }

    .entry_title {
        color: #2ba7bd;
    }

    .project_title {
        color: #4E515B;
    }

    .row {
        display: flex;
    }

    .row {
        display: flex;
    }

    .info_card{
        font-family: fontawesome;
        line-height: 3vw;
        position: absolute;
        top: 16vw;
        left: 65vw;
        border-style: solid;
        border-width: 0.3vw;
        border-radius: 1.5vw;
        border-color: #FCC05E;
        padding: 1vw;
        padding-right: 4vw;
    }

    * {
        box-sizing: border-box;
    }

    .label {
        font-size: 1.4vw;
        font-family: sans-serif;
        color: #4E515B;
    }

    .input[type=text], select,  textarea {
        width: 90%;
        font-size: 1.4vw;
        padding: 0.4vw;
        border-style: inset;
        border-radius: 0.4vw;
        resize: vertical;
        font-family: sans-serif;
        margin-bottom: 0.6vw;
        border-width: 0.15vw;
        border-color: #f2f2f2;
        background-color: #f2fcff;
    }

    textarea {
        height: 12vw;
    }

    .input[type=submit] {
        background-color: #FCC05E;
        color: white;
        padding: 1vw 2vw 1vw 2vw;
        border: none;
        border-radius: 0.4vw;
        cursor: pointer;
        float: right;
        font-size: 1.5vw;
        margin-top: 2vw;
        margin-left: 37vw;
        text-decoration: none;
        font-family: sans-serif;
    }


    .input[type=submit]:hover {
        color: black;
    }

    .card_text {
        font-size: 1.3vw;
        font-family: sans-serif;
        border-width: 0.15vw;
        border-radius: 0.4vw;
        background-color: #f2fcff;
        padding: 0.4vw;
        margin-bottom: 0.6vw;
    }

    .locked_text {
        font-size: 1.2vw;
        font-family: sans-serif;
    }

    .container {
        border-radius: 0.5vw;
        padding: 0.5vw;
        float: left;
        width: 65%;
    }

    a.cancel_button {
        background-color: #4E515B;
        color: white;
        padding: 1vw 2vw 1vw 2vw;
        border: none;
        border-radius: 0.4vw;
        cursor: pointer;
        font-size: 1.5vw;
        margin-top: 2vw;
        margin-left: 2vw;
        text-decoration: none;
        font-family: sans-serif;
    }

    a.cancel_button:hover {
        color: black;
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

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
        .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
        }


</style>

<body>

<div class="topnav">
    <?php
    require('db_connect.php');
    require 'Frontend_header_universal.php';

    $stmt = $link->prepare("SELECT * FROM projects WHERE id_project = ?");
    $stmt -> bind_param("i", $_GET['id_project']);
    $stmt -> execute();
    $result = $stmt->get_result(); // get the mysqli result
    $project_data = $result->fetch_assoc(); // fetch data
    $project_number = $_GET['id_project'];
    $form_link = 'edit_projects.php?id_project=' . $project_data['id_project'] . '';
    $cancel_link = 'Project_Card.php?id_project=' . $project_data['id_project'] .'';

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
    $stmt1 = $link->prepare("SELECT * FROM SDG WHERE id_sdg = ?");
    $stmt1-> bind_param("i", $project_data['project_sdg']);
    $stmt1 -> execute();
    $result1 = $stmt1->get_result(); // get the mysqli result
    $project_sdg = $result1->fetch_assoc(); // fetch data

    $stmt2 = $link->prepare("SELECT * FROM sectors WHERE id_sectors = ?");
    $stmt2 -> bind_param("i", $project_data['id_sector_f']);
    $stmt2 -> execute();
    $result2 = $stmt2->get_result(); // get the mysqli result
    $project_sector = $result2->fetch_assoc(); // fetch data

    echo '<script> var sdgSecArr = ';
    echo json_encode($SDG_sector_array);
    echo ';</script>';
    mysqli_close($link);

    ?>

</div>

<div class="main_title">
    <span class="entry_title">Edit Project -</span>
    <span class="project_title"><?php echo($project_data['project_name']);?></span></div>


<form action='<?php echo $form_link;?>' method="post">
    <div class="container">
        <div class="row">
            <div class="col-25">
                <label class="label" for="project_name">Project Title</label>
            </div>
            <div class="col-75">
                <input class="input" type="text" id="project_name" name="project_name" placeholder="<?php echo($project_data['project_name']);?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label class="label" for="SDG">Choose SDG</label>
            </div>
            <div class="col-75">
                <select class="select" id="select_sdg" name="project_sdg" >
                    <option selected="selected" disabled selected><?php echo($project_data['project_sdg']).". ".($project_sdg['sdg_name']);?></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label class="label" for="SDG">Choose Sector</label>
            </div>
            <div class="col-75">
                <select class="select" id="select_sector" name="sector_id" disabled>
                    <option selected="selected"><?php echo($project_sector['sector_name']);?></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label class="label" for="project_keywords">Keywords</label>
            </div>
            <div class="col-75">
                <input class="input" type="text" id="project_keywords" name="project_keywords" placeholder ="<?php echo($project_data['project_keywords']);?>"</div>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label class="label" for="project_summary">Project summary</label>
        </div>
        <div class="col-75">
            <textarea class="input" type="text" id="project_summary" name="project_summary" placeholder="<?php echo($project_data['project_summary']);?>" style="height: 5vw;"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label class="label" for="project_description">Project Description</label>
        </div>
        <div class="col-75">
            <textarea class="input" type="text" id="project_description" name="project_description" placeholder ="<?php echo($project_data['project_description']);?>"></textarea>
        </div>
    </div>
    <div class="row">
        <input class="input" type="submit" value = "Save changes >">
        <a class="cancel_button" href=<?php echo $cancel_link;?>>Cancel</a>
    </div>

    <div class="info_card">
        <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-briefcase"></i></span><div class="locked_text">
                    <?php echo($project_data['project_ngo_name']);?></div></li>
            <li><span class="fa-li"><i class="fas fa-location-arrow"></i></span><input class="card_text" type="text" name="project_location"
                                                                                       placeholder="<?php echo($project_data['project_location']);?>"></li>
            <li><span class="fa-li"><i class="far fa-dollar"></i></span><select class="card_text" type="text" name="project_budget">
                    <option value="<?php echo($project_data['project_budget']);?>" disabled selected><?php echo($project_data['project_budget']);?></option>
                    <option value="Very Low">Very Low</option>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                    <option value="Very High">Very High</option></select></li>
            <li><span class="fa-li"><i class="far fa-handshake-o"></i></span><input class="card_text" type="text" name="project_beneficiaries"
                                                                                    placeholder="<?php echo($project_data['project_beneficiaries']);?>"></li>
            <li><span class="fa-li"><i class="fas fa-user"></i></span><input class="card_text" type="text" name="project_contact_person"
                                                                             placeholder="<?php echo($project_data['project_contact_person']);?>"></li>
            <li><span class="fa-li"><i class="fas fa-at"></i></span><input class="card_text" type="text" name="project_email"
                                                                           placeholder="<?php echo($project_data['project_email']);?>"></li>
            <li><span class="fa-li"><i class="fas fa-phone"></i></span><input class="card_text" type="text" name="project_phone"
                                                                              placeholder="<?php echo($project_data['project_phone']);?>"></li>
            <li><span class="fa-li"><i class="fas fa-laptop"></i></span><input class="card_text" type="text" name="project_website"
                                                                               placeholder="<?php echo($project_data['project_website']);?>"></li>
            <li><span class="fa-li"><i class="far fa-calendar"></i></span><input class="card_text" type="text" name="project_timeline"
                                                                                 placeholder="<?php echo($project_data['project_timeline']);?>"></li>
        </ul>
    </div>
</form>


</body>
</html>