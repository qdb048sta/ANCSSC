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

    .project_description {
        font-family: sans-serif;
        color: #4E515B;
    }

    .maintitle {
        font-size: 1.5vw;
        font-weight: bold;
        padding-left: 7vw;
        padding-bottom: 1.5vw;
    }

    .project_description {
        font-size: 1.2vw;
        width: 40vw;
        padding-left: 7vw;
        padding-bottom: 1.5vw;
    }


    .keywords {
        font-size: 1.2vw;
        padding-left: 7vw;
        width: 40vw;
    }

    .keywords_title {
        font-weight: bold;
        padding-bottom: 0.3vw;
    }

    .keywords_text {
        padding-bottom: 2vw;
    }

    .images {
        padding-left: 7vw;
        width: 60vw;
    }

    .column {
        flex: 33.33%;
        padding-right: 0.9vw;
    }

    .row {
        display: flex;
    }

    .info_card {
        font-family: fontawesome;
        line-height: 3vw;
        position: absolute;
        top: 12vw;
        left: 65vw;
        border-style: solid;
        border-width: 0.3vw;
        border-radius: 17px;
        border-color: #FCC05E;
        padding: 1vw;
        padding-right: 4vw;

    }

    .executive_summary {
        margin-left: 7vw;
        margin-bottom: 2vw;
        margin-top: 1vw;
        font-size: 1.3vw;

    }


</style>

<div class="topnav">
    <?php
    require 'header_ngo.php';
    ?>
</div>


<div class="project_description">

    <div class="maintitle">Project 1</div>

    <div class="executive_summary"><b>Executive summary: </b><br><br>Nemo enim ipsam voluptatem, quia voluptas sit,
        aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt,
        neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit.
    </div>

    <div class="project_description"><b>Project description:</b><br><br>Sed ut perspiciatis, unde omnis iste natus error
        sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis
        et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit,
        aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt,
        neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit. Sed quia non
        numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad
        minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea
        commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil
        molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? <br><br>Sed ut
        perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam
        eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim
        ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui
        ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet,
        consectetur, adipisci velit. Sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam
        quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
        suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure
        reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum,
        qui dolorem eum fugiat, quo voluptas nulla pariatur?

    </div>

    <div class="keywords">
        <div class="keywords_title">Keywords:</div>
        <div class="keywords_text">Technology 1; Technology 2; Hunger; Village name; Country name</div>
    </div>

    <div class="images">
        <div class="row">
            <div class="column">
                <img src="img_1.png" alt="village_1" style="width:100%">
            </div>
            <div class="column">
                <img src="img_2.png" alt="village_2" style="width:100%">
            </div>
            <div class="column">
                <img src="img_3.png" alt="village_3" style="width:100%">
            </div>
        </div>
    </div>


</div>


<div class="info_card">

    <ul class="fa-ul">
        <li><span class="fa-li"><i class="fas fa-briefcase"></i></span>NGO Name</li>
        <li><span class="fa-li"><i class="fas fa-location-arrow"></i></span>City, Country</li>
        <li><span class="fa-li"><i class="fas fa-user"></i></span>John Jones</li>
        <li><span class="fa-li"><i class="fas fa-at"></i></span>john.jones@gmail.com</li>
        <li><span class="fa-li"><i class="fas fa-phone"></i></span>+44 7538 654783</li>
        <li><span class="fa-li"><i class="fas fa-laptop"></i></span>www.johnjones.com</li>
        <li><span class="fa-li"><i class="fas fa-bullseye"></i></span>Zero Hunger</li>
        <li><span class="fa-li"><i class="far fa-calendar"></i></span>March 2017 - March 2020</li>
        <li><span class="fa-li"><i class="fas fa-money"></i></span>$ 3000</li>
        <li><span class="fa-li"><i class="fas fa-users"></i></span>Village Name</li>
    </ul>

</div>


<div class="pictures">


</div>