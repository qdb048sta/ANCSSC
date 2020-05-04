<?php require 'auth_redirect.php'; ?>

<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project card</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>



<style>

    .topnav {
        padding-bottom: 9vw;
    }

    .main_title {
        font-size:2.4vw;
        font-family: sans-serif;
        color: #4E515B;
        font-weight: bold;
        padding: 1vw;
        margin-left: 25vw;
        margin-bottom: 1.5vw;
    }

    .row {
        display: flex;
    }

    .info_card{
        font-family: fontawesome;
        line-height: 3vw;
        position: absolute;
        top: 12vw;
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

    .main_text {
        font-size: 1.4vw;
        font-family: sans-serif;
        margin-bottom: 0.6vw;
        padding: 0.4vw;
        border-style: inset;
        border-radius: 0.4vw;
        resize: vertical;
        border-width: 0.15vw ;
        border-color: #f2f2f2;
    }


    a.button {
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

    .button:hover {
        color: black;
    }

    .card_text {
        font-size: 1.3vw;
        font-family: sans-serif;
        border-width: 0.15vw;
        border-radius: 0.4vw;
        padding: 0.4vw;
        margin-bottom: 0.6vw;
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

<div class="topnav">
    <?php
    require 'Frontend_header_ngo.php';
    ?>
</div>

<?php
require('db_connect.php');
$stmt = $link->prepare("SELECT * FROM projects WHERE id_project = ?");
$stmt -> bind_param("i", $_GET['id_project']);
$stmt -> execute();
$result = $stmt->get_result(); // get the mysqli result
$project_data = $result->fetch_assoc(); // fetch data

$linker = 'Frontend_Edit_Projects.php?id_project=' . $project_data['id_project'] . '';
$ngo_name = $_SESSION['user']['ngo_name'];

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

?>

<div class="main_title"><?php echo($project_data['project_name']);?></div>

<div class="container">
    <div class="row">
        <div class="col-25">
            <label class="label" for="project_sdg">SDG</label>
        </div>
        <div class="col-75">
            <div class="main_text"><?php echo($project_data['project_sdg']).". ".($project_sdg['sdg_name']);?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label class="label" for="project_sector">Sector</label>
        </div>
        <div class="col-75">
            <div class="main_text"><?php echo($project_sector['sector_name']);?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label class="label" for="project_keywords">Keywords</label>
        </div>
        <div class="col-75">
            <div class="main_text"><?php echo($project_data['project_keywords']);?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label class="label" for="project_summary">Project summary</label>
        </div>
        <div class="col-75">
            <div class="main_text"><?php echo($project_data['project_summary']);?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label class="label" for="project_description">Project Description</label>
        </div>
        <div class="col-75">
            <div class="main_text"><?php echo($project_data['project_description']);?></div>
        </div>
    </div>
    <div class="row">
        <a class="button" href=<?php echo $linker;?>>Edit Project</a>
        <a class="cancel_button" href="Frontend_NGO_My_Projects.php">Cancel</a>
    </div>
</div>

<div class="info_card">
    <ul class="fa-ul">
        <li><span class="fa-li"><i class="fas fa-briefcase"></i></span><div class="card_text"><?php echo($project_data['project_ngo_name']);?></div></li>
        <li><span class="fa-li"><i class="fas fa-location-arrow"></i></span><div class="card_text"><?php echo($project_data['project_location']);?></div></li>
        <li><span class="fa-li"><i class="far fa-dollar"></i></span><div class="card_text"><?php echo($project_data['project_budget']);?></div></li>
        <li><span class="fa-li"><i class="far fa-handshake-o"></i></span><div class="card_text"><?php echo($project_data['project_beneficiaries']);?></div></li>
        <li><span class="fa-li"><i class="fas fa-user"></i></span><div class="card_text"><?php echo($project_data['project_contact_person']);?></div></li>
        <li><span class="fa-li"><i class="fas fa-at"></i></span><div class="card_text"><?php echo($project_data['project_email']);?></div></li>
        <li><span class="fa-li"><i class="fas fa-phone"></i></span><div class="card_text"><?php echo($project_data['project_phone']);?></div></li>
        <li><span class="fa-li"><i class="fas fa-laptop"></i></span><div class="card_text"><?php echo($project_data['project_website']);?></div></li>
        <li><span class="fa-li"><i class="far fa-calendar"></i></span><div class="card_text"><?php echo($project_data['project_timeline']);?></div></li>
    </ul>
</div>

</html>
<!--<div class="pictures">-->

