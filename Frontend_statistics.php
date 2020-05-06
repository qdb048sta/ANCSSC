<?php require 'auth_redirect.php'; ?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<?php
session_start();

require('db_connect.php');

// Getting the total number of projects
$count_projects='SELECT COUNT(id_project) FROM projects';
if($result_projects=mysqli_query($link,$count_projects)) {
    $row_projects=mysqli_fetch_array($result_projects);
}

//Getting the total number of registered users
$count_users='SELECT COUNT(id_user) FROM users';
if($result_users=mysqli_query($link,$count_users)) {
    $row_users=mysqli_fetch_array($result_users);
}

// Calculating the number of projects by SDG
$number_of_sdgs='SELECT COUNT(*) FROM sdg';
if($result_sdg=mysqli_query($link,$number_of_sdgs)) {
    $row_sdg = mysqli_fetch_array($result_sdg);
}

$project_labels =[];
$project_data_points =[];

for ($x = 1; $x<=$row_sdg['COUNT(*)']; $x++) {
    $stmt = $link->prepare('SELECT COUNT(*) FROM projects WHERE project_sdg=?');
    $stmt -> bind_param("i", $x);
    $stmt -> execute();
    $result = $stmt->get_result(); // get the mysqli result
    $project_data = $result->fetch_assoc(); // fetch data
    if ($project_data['COUNT(*)']!=0) {
        $sdg_label='SDG '.$x;
        array_push($project_labels, $sdg_label);
        array_push($project_data_points, $project_data['COUNT(*)']);
    }
}

//Ensuring that the arrays are useful for javascript
$usable_labels=json_encode($project_labels);
$usable_data = json_encode($project_data_points);

$budget_key_value =[];

$budgets_initial = 'SELECT project_budget FROM projects';
$budg_result = mysqli_query($link, $budgets_initial);

if (mysqli_num_rows($budg_result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($budg_result)) {
        array_push($budget_key_value, $row['project_budget']);
    }
} else {
    echo "0 results";
}

$budget_labels = [];
$intermediate_budget_data =[];
$budget_data = array_count_values($budget_key_value);
foreach($budget_data as $z=>$z_value) {
    array_push($budget_labels, $z);
    array_push($intermediate_budget_data, $z_value);
}

$usable_budget_labels = json_encode($budget_labels);
$usable_budget_data = json_encode($intermediate_budget_data);
?>
<style>
    .row {
        width: 100%;
        margin-bottom: 6vw;
    }

    .main_title {
        font-size:calc(14px + 1.5vw);
        font-family: sans-serif;
        color: #4E515B;
        font-weight: bold;
        padding: 1vw;
        text-align: center;
        margin-top: 8vw;
        margin-bottom: 8vw;
    }

    .main_info {
        margin-bottom: 3vw;
        font-size: calc(7px + 0.9vw);
        margin-left: 10vw;
    }

    .column {
        float: left;
        width: 50%;
    }

    .chart-container {
        width: 100%;
        margin-left: 3vw;
    }

    @media screen and (max-width: 600px) {
        .column {
            width: 100%;
        }
    }

</style>

<div class="topnav">
    <?php
    require 'Frontend_header_admin.php';
    ?>
</div>

<body>
<div class="main_title">STATISTICS</div>
<div class="main_info"><?php echo "<a>Total Projects Registered: ".$row_projects['COUNT(id_project)']."</a><br>";?></div>
<div class="main_info"><?php echo "<a>Total Users Registered: ".$row_users['COUNT(id_user)']."</a><br>";?></div>

</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3"></script>
<div class="row">
    <div class="column">
        <div class="chart-container">
            <canvas id="SDGchart"></canvas>
        </div>
    </div>
    <div class="column">
        <div class="chart-container">
            <canvas id="budgetChart"></canvas>
        </div>
    </div>
</div>
<!--    <div class="row">-->
<!--        <canvas id="budgetChart"></canvas>-->
<!--    </div>-->
<!--</div>-->
<script>
    var ctx = document.getElementById('SDGchart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo $usable_labels;?>,
            datasets: [{
                label: '# of projects by SDG',
                data: <?php echo $usable_data;?>,
                backgroundColor: [
                    '#f56858',
                    '#327d38',
                    '#376e82',
                    '#eded47',
                    '#6b105f',
                    '#696868',
                    '#4be81c',
                    '#1cbce8',
                    '#e87715',
                    '#0c1461',
                    '#61130c',
                    '#370c61',
                    '#cc0ac2',
                    '#003b07',
                    '#cf0e04',
                    '#04cf77',
                    '#b27ff0',
                ],
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Projects by SDG',
                fontColor: '#4E515B',
                fontFamily: 'sans-serif',
                fontSize: 18,
            }
            // legend: {
            //     display: true,
            //     labels: {
            //         fontColor: '#4E515B',
            //     }
            // }
            // scales: {
            //
            // }
        }
    });

    var ctz = document.getElementById('budgetChart').getContext('2d');
    var myPieChart2 = new Chart(ctz, {
        type: 'pie',
        data: {
            labels: <?php echo $usable_budget_labels;?>,
            datasets: [{
                label: '# of Votes',
                data: <?php echo $usable_budget_data;?>,
                backgroundColor: [
                    '#f56858',
                    '#327d38',
                    '#376e82',
                    '#eded47',
                    '#6b105f',
                    '#696868',
                    '#4be81c',
                    '#1cbce8',
                    '#e87715',
                    '#0c1461',
                    '#61130c',
                    '#370c61',
                    '#cc0ac2',
                    '#003b07',
                    '#cf0e04',
                    '#04cf77',
                    '#b27ff0',
                ],
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Projects by Budget',
                fontColor: '#4E515B',
                fontFamily: 'sans-serif',
                fontSize: 18,
            }

        }
    });
</script>