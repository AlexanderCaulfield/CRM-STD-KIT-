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
				if(!empty($_POST['tip']) && !empty($_POST['id'])) {
                    $tip = $_POST['tip'];
                    $id = $_POST['id'];
                    saveUpdateSpisokZadachTipZadach($db, $tip, $id);
                }else {
                    echo "<h1>Ошибка сохранения данных</h1>";
                }
                if(!empty($_POST['prak']) && !empty($_POST['id'])) {
                    $prak = $_POST['prak'];
                    $id = $_POST['id'];
                    saveUpdateSpisokZadachPraktikant($db, $prak, $id);
                }else {
                    echo "<h1>Ошибка сохранения данных</h1>";
                }
                if(!empty($_POST['imyaSP']) && !empty($_POST['id'])) {
					$imyaSP = $_POST['imyaSP'];
					$id = $_POST['id'];
					saveUpdateSpisokZadachImya($db, $imyaSP, $id);
					echo "<h1>Изменения сохранены!</h1>";
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
                if(!empty($_POST['desc']) && !empty($_POST['id'])) {
					$desc = $_POST['desc'];
					$id = $_POST['id'];
					saveUpdateSpisokZadachOpisaniye($db, $desc, $id);
					echo "<h1>Изменения сохранены!</h1>";
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
                if(!empty($_POST['nachaloSP']) && !empty($_POST['id'])) {
					$nachaloSP = $_POST['nachaloSP'];
					$id = $_POST['id'];
					saveUpdateSpisokZadachDataNachalo($db, $nachaloSP, $id);
					echo "<h1>Изменения сохранены!</h1>";
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
                if(!empty($_POST['konecSP']) && !empty($_POST['id'])) {
					$konecSP = $_POST['konecSP'];
					$id = $_POST['id'];
					saveUpdateSpisokZadachDataKonec($db, $konecSP, $id);
					echo "<h1>Изменения сохранены!</h1>";
				}else {
					echo "<h1>Ошибка сохранения данных</h1>";
				}
                if(!empty($_POST['status']) && !empty($_POST['id'])) {
                    $status = $_POST['status'];
                    $id = $_POST['id'];
                    saveUpdateSpisokZadachStatusZadach($db, $status, $id);
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