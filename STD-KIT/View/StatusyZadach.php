<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Статусы задач</title>
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
		width: 100%;
        border: 2px solid black;
		background-color: #ecf7fe;
		border-collapse: collapse;
		margin-bottom: 20px;
    	}
    
    	.custom-table th,
    	.custom-table td {
        border: 2px solid black;
		padding: 8px;
		text-align: center;
    	}

		.custom-table tr th {
		text-align: center;
		}

		.buttons {
		text-align: right;
		}

		#addButton,
		#submitButton {
		color: #000;
  		background-color: lightgreen;
		border: 2px solid black;
		font-weight: bold;
		}

		#addButton {
		width: 215px;
		text-align: left;
		background-image: url("../Images/addIcon.png");
		background-size: 24px 24px;
		background-position: 183px 4px;
  		background-repeat: no-repeat;
		}

		#deleteButton {
		width: 105px;
		text-align: left;
		background-image: url("../Images/deleteButton.png");
		background-size: 24px 24px;
		background-position: 73px 4px;
  		background-repeat: no-repeat;
		background-color: red;
		color: #000;
		font-weight: bold;
		border: 2px solid black;
		}

		#submitButton {
		width: 115px;
		text-align: left;
		background-image: url("../Images/addIcon.png");
		background-size: 24px 24px;
		background-position: 83px 4px;
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
						<li><a href="Praktikanty.php">Практиканты</a></li>
						<li><a href="SpisokZadach.php">Список задач</a></li>
						<li><a href="TipyZadach.php">Типы задач</a></li>
						<li><a href="StatusyZadach.php">Статусы задач</a></li>
						<li><a href="Universitety.php">Университеты</a></li>
						<li><a href="Otzyvy.php">Отзывы</a></li>
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
				$listStatusyZadach = getAllStatusyZadach($db);
			?>
			<table class = "custom-table">
				<tr>
					<th style="width: 5%">Номер</th>
					<th style="width: 92%">Наименование статуса</th>
					<th style="width: 3%">Удаление</th>
				</tr>

				<?php foreach ($listStatusyZadach as $listStatusyZadach) { ?>
					<tr>
						<td><?php echo $listStatusyZadach['id_StatusZadach']; ?></td>
						<td><a href="../Edit/editStatusyZadach.php?id_StatusZadach=<?php echo $listStatusyZadach['id_StatusZadach'];?>"><?php echo $listStatusyZadach['Imya_StatusZadach']; ?></a></td>
						<td><a id="deleteButton" class="btn btn-danger" href="../Delete/deleteStatusyZadach.php?id_StatusZadach=<?php echo $listStatusyZadach['id_StatusZadach'];?>">Удалить</a></td>
					</tr>
				<?php } ?>
			</table>

		<div class="buttons">
			<button id="addButton" class="btn btn-default">Добавить статус задачи</button>
		</div>

		<form action="" method="POST" role="form" style="display: none; margin-top: 20px;">

			<div class="form-group">
				<label for="">Введите наименование статуса задачи</label>
				<input type="text" class="form-control" id="imya" name="imya" placeholder="Наименование статуса задачи">
			</div>

			<div class="buttons">
				<button id="submitButton" type="submit" class="btn btn-primary">Добавить</button>
			</div>

		</form>
		</div>

		<?php
			if(isset($_POST['imya'])){
				$imya = $_POST['imya'];
				addStatusZadach($db, $imya);
			}
		?>
	</div>

	<footer>
		
	</footer>

	<script>
		$("#addButton").click(function(){
			$("form").slideDown();
		})
	</script>
</body>
</html>