<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Практиканты</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
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
		#submitButton {
		color: #000;
  		background-color: lightgreen;
		border: 2px solid black;
		font-weight: bold;
		}

		#addButton {
		width: 205px;
		text-align: left;
		background-image: url("../Images/addIcon.png");
		background-size: 24px 24px;
		background-position: 173px 4px;
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
		
		#printButton {
		width: 100px;
		text-align: left;
		background-image: url("../Images/printIcon.png");
		background-size: 24px 24px;
		background-position: 65px 4px;
  		background-repeat: no-repeat;
		color: #000;
  		background-color: #428cfc;
		border: 2px solid black;
		font-weight: bold;
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
				$listPraktikanty = getAllPraktikanty($db);
			?>
			<table class = "custom-table" id="praktikantyTable">
				<tr>
					<th class="no-print">Номер</th>
					<th>ФИО</th>
					<th>Вид деятельности</th>
					<th>Телефон</th>
					<th>Почта</th>
					<th>Университет</th>
					<th>Факультет</th>
					<th>Курс</th>
					<th>Группа</th>
					<th>Начало практики</th>
					<th>Конец практики</th>
					<th class="no-print">Удаление</th>
				</tr>

				<?php foreach ($listPraktikanty as $listPraktikanty) { ?>
					<tr>
						<td class="no-print"><?php echo $listPraktikanty['id_Praktikant']; ?></td>
						<td><a href="../Edit/editPraktikanty.php?id_Praktikant=<?php echo $listPraktikanty['id_Praktikant'];?>"><?php echo $listPraktikanty['Fio_Praktikant']; ?></a></td>
						<td><a href="../Edit/editPraktikanty.php?id_Praktikant=<?php echo $listPraktikanty['id_Praktikant'];?>"><?php echo $listPraktikanty['Deyatelnost_Praktikant']; ?></a></td>
						<td><a href="../Edit/editPraktikanty.php?id_Praktikant=<?php echo $listPraktikanty['id_Praktikant'];?>"><?php echo $listPraktikanty['Telephon_Praktikant']; ?></a></td>
						<td><a href="../Edit/editPraktikanty.php?id_Praktikant=<?php echo $listPraktikanty['id_Praktikant'];?>"><?php echo $listPraktikanty['Pochta_Praktikant']; ?></a></td>
						<td><a href="../Edit/editPraktikanty.php?id_Praktikant=<?php echo $listPraktikanty['id_Praktikant'];?>"><?php echo $listPraktikanty['Imya_Universitet']; ?></a></td>
						<td><a href="../Edit/editPraktikanty.php?id_Praktikant=<?php echo $listPraktikanty['id_Praktikant'];?>"><?php echo $listPraktikanty['Fakultet_Praktikant']; ?></a></td>
						<td><a href="../Edit/editPraktikanty.php?id_Praktikant=<?php echo $listPraktikanty['id_Praktikant'];?>"><?php echo $listPraktikanty['Kurs_Praktikant']; ?></a></td>
						<td><a href="../Edit/editPraktikanty.php?id_Praktikant=<?php echo $listPraktikanty['id_Praktikant'];?>"><?php echo $listPraktikanty['Gruppa_Praktikant']; ?></a></td>
						<td><a href="../Edit/editPraktikanty.php?id_Praktikant=<?php echo $listPraktikanty['id_Praktikant'];?>"><?php echo $listPraktikanty['NachaloPraktiki_Praktikant']; ?></a></td>
						<td><a href="../Edit/editPraktikanty.php?id_Praktikant=<?php echo $listPraktikanty['id_Praktikant'];?>"><?php echo $listPraktikanty['KonecPraktiki_Praktikant']; ?></a></td>
						<td class="no-print"><a id="deleteButton"class="btn btn-danger" href="../Delete/deletePraktikanty.php?id_Praktikant=<?php echo $listPraktikanty['id_Praktikant'];?>">Удалить</a></td>
					</tr>
				<?php } ?>	
			</table>

		<div class="buttons">
			<button id="addButton" class="btn btn-default">Добавить практиканта</button>
			<button id="printButton" class="btn btn-default btn-with-icon">Печать</button>
			<script>
				document.getElementById("printButton").addEventListener("click", function() {
					printJS({
					printable: "praktikantyTable",
					type: "html",
					header: "<div>Список практикантов</div>",
					style: `
						table {
						border-collapse: collapse;
						}
						
						th, td {
						font-size: 14px;
						border: 1px solid black;
						color: #000;
						font-family: 'Times New Roman', Times, serif;
						font-weight: normal;
						text-decoration: none;
						text-align: center;
						}

						div {
						white-space: nowrap;
						margin: 5px;
						font-family: 'Times New Roman', Times, serif;
						font-weight: bold;
						font-size: 20px;
						}

						.no-print {
						display: none;
						}

						a {
						font-family: 'Times New Roman', Times, serif;
						font-size: 12px;
						text-decoration: none;
						color: #000;
						}
					`,
					onPrintDialogClose: function() {
						var printLinks = document.getElementsByClassName("print-link");
						for (var i = 0; i < printLinks.length; i++) {
						printLinks[i].classList.remove("no-print");
						}
					}
					});
				});
			</script>

		</div>

		<form action="" method="POST" role="form" style="display: none; margin-top: 20px;">

			<div class="form-group">
				<label for="">Введите ФИО практиканта</label>
				<input type="text" class="form-control" id="fio" name="fio" placeholder="ФИО практиканта">
				<label for="">Введите вид деятельности практиканта</label>
				<input type="text" class="form-control" id="deyat" name="deyat" placeholder="Вид деятельности практиканта">
				<label for="">Введите номер телефона практиканта</label>
				<input type="text" class="form-control" id="phone" name="phone" placeholder="Номер телефона практиканта">
				<label for="">Введите электронную почту практиканта</label>
				<input type="text" class="form-control" id="pochta" name="pochta" placeholder="Электронная почта практиканта">
				<div class="form-group">
				<label for="">Выберите университет практиканта</label>
					<select name="univer" class="form-control" id="univer">
						<?php 
							$Universitet = getAllPraktikantyUniversitety($db);
							foreach ($Universitet as $key => $value) {
								echo "<option selected disabled hidden>Выберите университет</option>
									<option value=".$value['id_Universitet'].">".$value['Imya_Universitet']."</option>";
							}
						?>
					</select>
				</div>
				<label for="">Введите факультет практиканта</label>
				<input type="text" class="form-control" id="fakultet" name="fakultet" placeholder="Факультет практиканта">
				<label for="">Введите курс практиканта</label>
				<input type="text" class="form-control" id="kurs" name="kurs" placeholder="Курс практиканта">
				<label for="">Введите группу практиканта</label>
				<input type="text" class="form-control" id="gruppa" name="gruppa" placeholder="Группа практиканта">
				<label for="">Введите дату начала практики</label>
				<input type="date" class="form-control" id="nachalo" name="nachalo" placeholder="Дата начала практики">
				<label for="">Введите дату окончания практики</label>
				<input type="date" class="form-control" id="konec" name="konec" placeholder="Дата окончания практики">
			</div>

			<div class="buttons">
				<button id="submitButton" type="submit" class="btn btn-primary">Добавить</button>
			</div>

		</form>
			</div>

		<?php
			if(isset($_POST['fio']) && $_POST['deyat'] && $_POST['phone'] && $_POST['pochta']
			&& $_POST['univer'] && $_POST['fakultet'] && $_POST['kurs'] && $_POST['gruppa']
			&& $_POST['nachalo'] && $_POST['konec'] != ''){
				$fio = $_POST['fio'];
				$deyat = $_POST['deyat'];
				$phone = $_POST['phone'];
				$pochta = $_POST['pochta'];
				$univer = $_POST['univer'];
				$fakultet = $_POST['fakultet'];
				$kurs = $_POST['kurs'];
				$gruppa = $_POST['gruppa'];
				$nachalo = $_POST['nachalo'];
				$konec = $_POST['konec'];
				addPraktikant($db, $fio, $deyat, $phone, $pochta, $univer, $fakultet, $kurs, $gruppa, $nachalo, $konec);
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