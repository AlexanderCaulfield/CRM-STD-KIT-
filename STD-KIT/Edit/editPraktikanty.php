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
				$id = $_GET['id_Praktikant'];
				if($id){
				$listPraktikanty = getPraktikantById($db, $id);
				}else {
					echo "<h1>Error<h1>";
					exit();
				}
			?>
			<form action="../Save/savePraktikanty.php" method="post">
				<input type="hidden" name="id" value="<?php echo $listPraktikanty['id_Praktikant']; ?>">
                <div class="form-group">
					<label for="fio">ФИО практиканта</label>
					<input type="text" class="form-control" id="fio" name="fio" value="<?php echo $listPraktikanty['Fio_Praktikant']; ?>">
                    <label for="deyat">Вид деятельности практиканта</label>
					<input type="text" class="form-control" id="deyat" name="deyat" value="<?php echo $listPraktikanty['Deyatelnost_Praktikant']; ?>">
                    <label for="phone">Номер телефона практиканта</label>
					<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $listPraktikanty['Telephon_Praktikant']; ?>">
                    <label for="pochta">Электронная почта практиканта</label>
					<input type="text" class="form-control" id="pochta" name="pochta" value="<?php echo $listPraktikanty['Pochta_Praktikant']; ?>">
                    <div class="form-group">
						<label>Университет</label>
						<select name="univer" class="form-control" id="univer">
						<?php
    						$Universitety = getAllPraktikantyUniversitety($db);
    						foreach ($Universitety as $key => $value) {
        						$selected = '';
        						if ($value['id_Universitet'] == $listPraktikanty['Universitet_Praktikant']) {
            						$selected = 'selected';
        						}
        						echo '<option value="'.$value['id_Universitet'].'" '.$selected.'>'.$value['Imya_Universitet'].'</option>';
    						}
						?>
						</select>
					</div>
                    <label for="fakultet">Факультет практиканта</label>
					<input type="text" class="form-control" id="fakultet" name="fakultet" value="<?php echo $listPraktikanty['Fakultet_Praktikant']; ?>">
                    <label for="kurs">Курс практиканта</label>
					<input type="text" class="form-control" id="kurs" name="kurs" value="<?php echo $listPraktikanty['Kurs_Praktikant']; ?>">
                    <label for="gruppa">Группа практиканта</label>
					<input type="text" class="form-control" id="gruppa" name="gruppa" value="<?php echo $listPraktikanty['Gruppa_Praktikant']; ?>">
                    <label for="nachalo">Дата начала практики</label>
					<input type="date" class="form-control" id="nachalo" name="nachalo" value="<?php echo $listPraktikanty['NachaloPraktiki_Praktikant']; ?>">
                    <label for="konec">Дата окончания практики</label>
					<input type="date" class="form-control" id="konec" name="konec" value="<?php echo $listPraktikanty['KonecPraktiki_Praktikant']; ?>">
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