<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Редактирование</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<style>
			.navbar {
		background-color: #0d91de;
		}

			.navbar-nav {
		list-style: none;
		margin: 0;
		padding: 0;
		}

		.navbar-nav li {
		display: inline-block;
		}

		.navbar-nav li a {
		display: block;
		padding: 20px;
		color: #302b44 !important;
		font-family: Impact, fantasy;
		text-decoration-line: underline;
		}

		.custom-table {
        border: 2px solid black;
		background-color: #ecf7fe;
		border-collapse: collapse;
		margin-bottom: 20px;
    	}
    
    	.custom-table th,
    	.custom-table td {
        border: 2px solid black;
		padding: 8px;
    	}

		.custom-table tr th {
		text-align: center;
		}

		.buttons {
		text-align: right;
		}

		#addButton,
		#printButton,
		#submitButton {
		color: #000;
  		background-color: lightgreen;
		border: 2px solid black;
		font-weight: bold;
		}

		#printButton {
		width: 100px;
		text-align: left;
		background-image: url("../Images/printIcon.png");
		background-size: 24px 24px;
		background-position: 65px 4px;
  		background-repeat: no-repeat;
		}

		#submitButton {
		width: 120px;
		text-align: left;
		background-image: url("../Images/saveIcon.png");
		background-size: 24px 24px;
		background-position: 89px 4px;
  		background-repeat: no-repeat;
		}

		.form-group {
		text-align: left;
		}

		.form-control {
			border: 1px solid black;
		}
		
		body {
		background-image: url("../Images/background.jpg");
  		background-repeat: no-repeat;
  		background-size: cover;
		}
	</style>
</head>
<body>
	<header>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="../Images/logo.png" alt="Студия КИТ.Практика" width="125" height="25"></a>
				</div>
		
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="../index.php">Главная</a></li>
						<li><a href="../View/Praktikanty.php">Практиканты</a></li>
						<li><a href="../View/SpisokZadach.php">Список задач</a></li>
						<li><a href="../View/TipyZadach.php">Типы задач</a></li>
						<li><a href="../View/StatusyZadach.php">Статусы задач</a></li>
						<li><a href="../View/Universitety.php">Университеты</a></li>
                        <li><a href="../View/Otzyvy.php">Отзывы</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<div id="content">
		<div class = "container-fluid">
			<?php include '../Controllers/db.php'; ?>
			<?php include '../Controllers/api.php'; ?>
			<?php
				$id = $_GET['id_Otzyv'];
				if($id){
				$listOtzyvy = getOtzyvById($db, $id);
				}else {
					echo "<h1>Error<h1>";
					exit();
				}
			?>
			<form action="../Save/saveOtzyvy.php" method="post">
				<input type="hidden" name="id" value="<?php echo $listOtzyvy['id_Otzyv']; ?>">
                <div class="form-group">
                    <div class="form-group">
						<label>Практикант</label>
						<select name="prak" class="form-control" id="prak">
						<?php
    						$Praktikanty = getAllOtzyvyPraktikanty($db);
    						foreach ($Praktikanty as $key => $value) {
        						$selected = '';
        						if ($value['id_Praktikant'] == $listOtzyvy['Praktikant_Otzyv']) {
            						$selected = 'selected';
        						}
        						echo '<option value="'.$value['id_Praktikant'].'" '.$selected.'>'.$value['Fio_Praktikant'].'</option>';
    						}
						?>
						</select>
					</div>
					<label for="otzyv">Отзыв</label>
					<input type="text" class="form-control" id="otzyv" name="otzyv" value="<?php echo $listOtzyvy['Text_Otzyv']; ?>">
				</div>

                <div class="buttons">
				    <button id="submitButton" type="submit" class="btn btn-default">Сохранить</button>
                </div>
			</form>
		</div>
	</div>

	<footer>
		
	</footer>
</body>
</html>