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
			margin: auto;
		}

		.input[type=submit]:hover {
			background-color: #4E515B;
		}

		.search_button {
			text-align: center;
			color: white;
			background-color: #FCC05E;
			font-size: 1.5vw;
			width: 11vw;
			margin-left: 2vw;
			border-radius: 0.4vw;
			padding: 0.1vw 2.5vw 0.1vw 2.5vw;
			font-family: sans-serif;
			text-decoration: none;
			margin: auto;
		}

		.search_button:hover {
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
			margin-left: 22vw;
		}

		.container {
			float: left;
			width: 100%;
		}

		.col-20 {
			float: left;
			width: 18%;
			display: flex;
			margin-left: 1.5vw;
		}

		.col-80 {
			float: left;
			width: 78%;
			margin-left: 1.5vw;
			display: flex;
		}

	</style>
</head>
<body>
	<div class="topnav">
		<?php require 'Frontend_header_universal.php'; ?>
	</div>
	<div class="main_title">SEARCH</div>
	<div class="container">
		<form action="Frontend_NGO_Search_Results.php" method="get">
			<div class="row">
				<div class="col-80">
					<input class="input" type="text" placeholder=" Search for projects:" id="gsearch" name="gsearch" required>
				</div>
				<div class="col-20">
					<input type="submit" class="search_button" value="Search >">
				</div>
			</div>
		</form>
	</div>
</body>
</html>