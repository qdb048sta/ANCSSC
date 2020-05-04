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
			font-size:2.4vw;
			font-family: sans-serif;
			color: #4E515B;
			font-weight: bold;
			padding: 1vw;
			text-align: center;
		}

		.input[type=submit] {
			text-align: center;
			color: white;
			background-color: #FCC05E;
			font-size: 1.5vw;
			width: 14vw;
			margin-left: 2vw;
			border-radius: 0.4vw;
		}

		.input[type=submit]:hover {
			background-color: #4E515B;
		}

		.input[type=text], select, textarea {
			width: 40vw;
			text-align: center;
			color: black;
			font-size: 1.5vw;
			font-family: sans-serif;
			border: 0.1vw solid #4E515B;
			border-radius: 0.4vw;
			margin-left: 25vw;
		}

		.container {
			border-radius: 0.5vw;
			float: left;
			width: 100%;
		}

		.col-20 {
			float: left;
			width: 15%;
			margin-top: 0.6vw;
			margin-left: 1.5vw;
		}

		.col-80 {
			float: left;
			width: 80%;
			margin-top: 0.6vw;
			margin-left: 1.5vw;
		}

		.search_fields {
			width: 11vw;
			color: white;
			background-color: #4E515B;
			margin-top: 3vw;
			margin-bottom: 3vw;
			margin-left: 1vw;
			float: left;
			padding: 0.5vw;
			border-radius: 0.4vw;
		}

		.search_fields:hover {
			background-color: #FCC05E;
		}

		.first_search_field {
			width: 11vw;
			color: white;
			background-color: #4E515B;
			margin-top: 3vw;
			margin-bottom: 3vw;
			margin-left: 17vw;
			float: left;
			padding: 0.5vw;
			border-radius: 0.4vw;
		}

		.first_search_field:hover {
			background-color: #FCC05E;;
		}

		.table {
			border: 0.1vw solid black;
			font-family: sans-serif;
			font-size: 1.2vw;
			margin-left: 11vw;
			width: 80vw;
		}

		th, td {
			border: 0.1vw solid #4E515B;
		}

		th {
			color: white;
			background-color: #4E515B;
			border: 0.1vw solid white;

		}

		.th {
			color: black;
			background-color: #b0acac;
			border: 0.1vw solid white;
		}


	</style>
</head>
<body>
<div class="topnav">
	<?php require 'Frontend_header_universal.php'; ?>
</div>
<?php
require('db_connect.php');

//check required argument
if (!isset($_GET['gsearch'])) {
	print_r($_GET);
	die("GET parameter 'gsearch' is not set");
}

//array for order buttons
$order = array(
	array(
		'field' => 'project_ngo_name',
		'caption' => 'NGO A - Z',
		'dir' => false,
		'class' => 'first_search_field'
	),
	array(
		'field' => 'project_name',
		'caption' => 'Project Name',
		'dir' => false,
		'class' => 'search_fields'
	),
	array(
		'field' => 'sdg_name',
		'caption' => 'SDG',
		'dir' => false,
		'class' => 'search_fields'
	),
	array(
		'field' => 'sector_name',
		'caption' => 'Sector',
		'dir' => false,
		'class' => 'search_fields'
	),
	array(
		'field' => 'project_location',
		'caption' => 'Location',
		'dir' => false,
		'class' => 'search_fields'
	)
);

$gsearch = mysqli_real_escape_string($link, $_GET['gsearch']);
$curOrder = $order[0]['field'];
$dirOrder = 'asc';

if(isset($_GET['order_by'])){
	$curOrder = $_GET['order_by'];
	$privOrder = $_GET['priv_order'];
	//change sort order on repeat button click
	if($curOrder == $privOrder) {
		if( $_GET['dir_order'] == 'desc' )
			$dirOrder = 'asc';
		elseif( $_GET['dir_order'] == 'asc' )
			$dirOrder = 'desc';
	}	
}

//mark the button where the arrow should be drawn
foreach($order as $k => $v) {
	if($order[$k]['field'] == $curOrder) {
		$order[$k]['dir'] = $dirOrder;
	} else {
		$order[$k]['dir'] = false;
	}
}

//main selection from databases
$query1 = "SELECT * FROM projects_sectors_sdg WHERE project_summary LIKE '%$gsearch%' OR project_keywords LIKE '%$gsearch%' ORDER BY $curOrder $dirOrder";
$queryResult = mysqli_query($link, $query1);
if ($result = mysqli_query($link, $query1)) {
    $rowcount = mysqli_num_rows($result);
}

//filling in the results table
$tableBody = "";
while ($row = mysqli_fetch_assoc($queryResult)) {
	$tableBody .= <<<EOT
	<tr>
		<td class="th" scope="row">
			{$row['project_ngo_name']}
		</td>
		<td class="table_entries">
			<a class="button" href='Project_Card.php?id_project={$row['id_project']}'>
				{$row['project_name']}
			</a>
		</td>
		<td class="table_entries">
			<a class="button" href='Frontend_SDGs_sector.php?id_sdg={$row['id_sdg']}&sdg_pic={$row['sdg_pic']}&sdg_name={$row['sdg_name']}'>
				{$row['sdg_name']}
			</a>
		</td>
		<td class="table_entries">
			{$row['sector_name']}
		</td>
		<td class="table_entries">
			{$row['project_summary']}
		</td>
		<td class="table_entries">
			{$row['project_location']}
		</td>
		<td class="table_entries">
			{$row['project_timeline']}
		</td>
	</tr>
EOT;
}
?>
<div class="main_title">SEARCH RESULTS</div>
<div class="container">
    <form action="Frontend_NGO_Search_Results.php" method="get" ><!--id="order_by" name="order_by"--> 
        <div class="row">
            <div class="col-80">
                <input class="input" type="text" placeholder=" Search for projects:" id="gsearch" name="gsearch" required>
            </div>
            <div class="col-20">
                <input class="input" type="submit" value="Search">
            </div>
        </div>
	</form>
	<div class="row">		
		<form action="" method="get">
			<input type="hidden" name="priv_order" value="<?php echo $curOrder;?>">
			<input type="hidden" name="dir_order" value="<?php echo $dirOrder;?>">
			<input type="hidden" name="gsearch" value="<?php echo $gsearch;?>">
			<?php
				//displaying sorting buttons
				foreach($order as $k => $v) {
					if($v['dir'] == 'asc'){
						$arrow = '&nbsp;&#9660;';
					} elseif ($v['dir'] == 'desc') {
						$arrow = '&nbsp;&#9650;';
					} else {
						$arrow = '';
					}
					echo "<button type=\"submit\" class=\"{$v['class']}\" name=\"order_by\" value=\"{$v['field']}\">{$v['caption']}$arrow</button>\n";
				}
			?>
		</form>	
	</div>  
</div>

<table class="table">
    <thead>
		<tr>
			<th scope="col">NGO Name</th>
			<th scope="col">Project Name</th>
			<th scope="col">SDG</th>
			<th scope="col">Sector</th>
			<th scope="col">Project summary</th>
			<th scope="col">Location</th>
			<th scope="col">Timeline</th>
		</tr>
    </thead>
    <tbody>
		<?php
		//choose display a message that nothing was found or a table
		if($rowcount > 0)
			echo $tableBody;
		else
			echo "<tr><td colspan=\"7\" style=\"text-align: center;\">Nothing found.</td></td>";
		?>
	</tbody>
</table>
</body>
</html>