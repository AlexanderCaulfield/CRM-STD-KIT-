<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Список задач</title>
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

		#addButton {
		width: 165px;
		text-align: left;
		background-image: url("../Images/addIcon.png");
		background-size: 24px 24px;
		background-position: 134px 4px;
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
				$listSpisokZadach = getAllSpisokZadach($db);
			?>
			<table class = "custom-table">
				<tr>
					<th>Номер</th>
					<th>Тип задачи</th>
					<th>Практикант</th>
					<th>Наименование задачи</th>
					<th>Описание задачи</th>
					<th>Дата начала выполнения</th>
					<th>Дата окончания выполнения</th>
					<th>Статус задачи</th>
					<th>Удаление</th>
				</tr>

				<?php foreach ($listSpisokZadach as $listSpisokZadach) { ?>
					<tr>
						<td><?php echo $listSpisokZadach['id_SpisokZadach']; ?></td>
						<td><a href="../Edit/editSpisokZadach.php?id_SpisokZadach=<?php echo $listSpisokZadach['id_SpisokZadach'];?>"><?php echo $listSpisokZadach['Imya_TipZadach']; ?></a></td>
                        <td><a href="../Edit/editSpisokZadach.php?id_SpisokZadach=<?php echo $listSpisokZadach['id_SpisokZadach'];?>"><?php echo $listSpisokZadach['Fio_Praktikant']; ?></a></td>
                        <td><a href="../Edit/editSpisokZadach.php?id_SpisokZadach=<?php echo $listSpisokZadach['id_SpisokZadach'];?>"><?php echo $listSpisokZadach['Imya_SpisokZadach']; ?></a></td>
                        <td><a href="../Edit/editSpisokZadach.php?id_SpisokZadach=<?php echo $listSpisokZadach['id_SpisokZadach'];?>"><?php echo $listSpisokZadach['Opisaniye_SpisokZadach']; ?></a></td>
                        <td><a href="../Edit/editSpisokZadach.php?id_SpisokZadach=<?php echo $listSpisokZadach['id_SpisokZadach'];?>"><?php echo $listSpisokZadach['DataNachalo_SpisokZadach']; ?></a></td>
                        <td><a href="../Edit/editSpisokZadach.php?id_SpisokZadach=<?php echo $listSpisokZadach['id_SpisokZadach'];?>"><?php echo $listSpisokZadach['DataKonec_SpisokZadach']; ?></a></td>
                        <td><a href="../Edit/editSpisokZadach.php?id_SpisokZadach=<?php echo $listSpisokZadach['id_SpisokZadach'];?>"><?php echo $listSpisokZadach['Imya_StatusZadach']; ?></a></td>
						<td><a id="deleteButton" class="btn btn-danger" href="../Delete/deleteSpisokZadach.php?id_SpisokZadach=<?php echo $listSpisokZadach['id_SpisokZadach'];?>">Удалить</a></td>
					</tr>
				<?php } ?>
			</table>
			
		<div class="buttons">
			<button id="addButton" class="btn btn-default">Добавить задачу</button>
		</div>

		<form action="" method="POST" role="form" style="display: none; margin-top: 20px;">

			<div class="form-group">
                <div class="form-group">
				<label for="">Выберите тип задачи</label>
					<select name="tip" class="form-control" id="tip">
						<?php 
							$TipyZadach = getAllSpisokZadachTipyZadach($db);
							foreach ($TipyZadach as $key => $value) {
								echo "<option selected disabled hidden>Выберите тип задачи</option>
									<option value=".$value['id_TipZadach'].">".$value['Imya_TipZadach']."</option>";
							}
						?>
					</select>
				</div>
                <div class="form-group">
				<label for="">Выберите практиканта</label>
					<select name="prak" class="form-control" id="prak">
						<?php 
							$Praktikanty = getAllSpisokZadachPraktikanty($db);
							foreach ($Praktikanty as $key => $value) {
								echo "<option selected disabled hidden>Выберите практиканта</option>
									<option value=".$value['id_Praktikant'].">".$value['Fio_Praktikant']."</option>";
							}
						?>
					</select>
				</div>
				<label for="">Введите наименование задачи</label>
				<input type="text" class="form-control" id="imyaSP" name="imyaSP" placeholder="Наименование задачи">
				<label for="">Введите описание задачи</label>
				<input type="text" class="form-control" id="desc" name="desc" placeholder="Описание задачи">
				<label for="">Введите дату начала выполнения задачи</label>
				<input type="date" class="form-control" id="nachaloSP" name="nachaloSP" placeholder="Дата начала выполнения задачи">
				<label for="">Введите дату окончания выполнения задачи</label>
				<input type="date" class="form-control" id="konecSP" name="konecSP" placeholder="Дата окончания выполнения задачи">
                <div class="form-group">
				<label for="">Выберите статус задачи</label>
					<select name="status" class="form-control" id="status">
						<?php 
							$StatusyZadach = getAllSpisokZadachStatusyZadach($db);
							foreach ($StatusyZadach as $key => $value) {
								echo "<option selected disabled hidden>Выберите статус задачи</option>
									<option value=".$value['id_StatusZadach'].">".$value['Imya_StatusZadach']."</option>";
							}
						?>
					</select>
				</div>
			</div>

			<div class="buttons">
				<button id="submitButton" type="submit" class="btn btn-primary">Добавить</button>
			</div>

		</form>
			</div>

		<?php
			if(isset($_POST['tip']) && $_POST['prak'] && $_POST['imyaSP'] && $_POST['desc'] && $_POST['nachaloSP'] && $_POST['konecSP'] && $_POST['status'] != ''){
				$tip = $_POST['tip'];
                $prak = $_POST['prak'];
				$imyaSP = $_POST['imyaSP'];
				$desc = $_POST['desc'];
				$nachaloSP = $_POST['nachaloSP'];
				$konecSP = $_POST['konecSP'];
                $status = $_POST['status'];
				addSpisokZadach($db, $tip, $prak, $imyaSP, $desc, $nachaloSP, $konecSP, $status);
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