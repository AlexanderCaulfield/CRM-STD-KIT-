<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Сохранение</title>
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
				if(!empty($_POST['fio']) && !empty($_POST['id'])) {
					$fio = $_POST['fio'];
					$id = $_POST['id'];
					saveUpdatePraktikantFio($db, $fio, $id);
					echo "<h1>Изменения сохранены!</h1>";
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
                if(!empty($_POST['deyat']) && !empty($_POST['id'])) {
					$deyat = $_POST['deyat'];
					$id = $_POST['id'];
					saveUpdatePraktikantDeyatelnost($db, $deyat, $id);
					echo "<h1>Изменения сохранены!</h1>";
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
                if(!empty($_POST['phone']) && !empty($_POST['id'])) {
					$phone = $_POST['phone'];
					$id = $_POST['id'];
					saveUpdatePraktikantTelephon($db, $phone, $id);
					echo "<h1>Изменения сохранены!</h1>";
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
                if(!empty($_POST['pochta']) && !empty($_POST['id'])) {
					$pochta = $_POST['pochta'];
					$id = $_POST['id'];
					saveUpdatePraktikantPochta($db, $pochta, $id);
					echo "<h1>Изменения сохранены!</h1>";
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
				if(!empty($_POST['univer']) && !empty($_POST['id'])) {
					$univer = $_POST['univer'];
					$id = $_POST['id'];
					saveUpdatePraktikantUniversitet($db, $univer, $id);
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
                if(!empty($_POST['fakultet']) && !empty($_POST['id'])) {
					$fakultet = $_POST['fakultet'];
					$id = $_POST['id'];
					saveUpdatePraktikantFakultet($db, $fakultet, $id);
					echo "<h1>Изменения сохранены!</h1>";
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
                if(!empty($_POST['kurs']) && !empty($_POST['id'])) {
					$kurs = $_POST['kurs'];
					$id = $_POST['id'];
					saveUpdatePraktikantKurs($db, $kurs, $id);
					echo "<h1>Изменения сохранены!</h1>";
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
                if(!empty($_POST['gruppa']) && !empty($_POST['id'])) {
					$gruppa = $_POST['gruppa'];
					$id = $_POST['id'];
					saveUpdatePraktikantGruppa($db, $gruppa, $id);
					echo "<h1>Изменения сохранены!</h1>";
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
                if(!empty($_POST['nachalo']) && !empty($_POST['id'])) {
					$nachalo = $_POST['nachalo'];
					$id = $_POST['id'];
					saveUpdatePraktikantNachaloPraktiki($db, $nachalo, $id);
					echo "<h1>Изменения сохранены!</h1>";
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
                if(!empty($_POST['konec']) && !empty($_POST['id'])) {
					$konec = $_POST['konec'];
					$id = $_POST['id'];
					saveUpdatePraktikantKonecPraktiki($db, $konec, $id);
					echo "<h1>Изменения сохранены!</h1>";
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
			?>
		</div>
	</div>

	<footer>
		
	</footer>
</body>
</html>