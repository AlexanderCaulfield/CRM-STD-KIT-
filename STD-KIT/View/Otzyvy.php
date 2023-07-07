<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Отзывы</title>
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
		#submitButton,
        #printButton {
		color: #000;
  		background-color: lightgreen;
		border: 2px solid black;
		font-weight: bold;
		}

        #addButton {
		width: 160px;
		text-align: left;
		background-image: url("../Images/addIcon.png");
		background-size: 24px 24px;
		background-position: 129px 4px;
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

		.form-group {
		text-align: left;
		}

		.form-control {
		border: 1px solid black;
        white-space: normal;
        word-wrap: break-word;
		}
		
		body {
		background-image: url("../Images/background.jpg");
  		background-repeat: no-repeat;
  		background-size: cover;
		}

		.center-text {
		text-align: center;
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
				$listOtzyvy = getAllOtzyvy($db);
			?>
			<table class = "custom-table">
				<tr>
					<th style="width: 5%">Номер</th>
					<th style="width: 20%">Практикант</th>
                    <th style="width: 69%">Отзыв</th>
					<th style="width: 3%">Удаление</th>
                    <th style="width: 3%">Печать</th>
				</tr>

				<?php foreach ($listOtzyvy as $listOtzyvy) { ?>
					<tr>
						<td><?php echo $listOtzyvy['id_Otzyv']; ?></td>
                        <td><a href="../Edit/editOtzyvy.php?id_Otzyv=<?php echo $listOtzyvy['id_Otzyv'];?>"><?php echo $listOtzyvy['Fio_Praktikant']; ?></a></td>
						<td><a href="../Edit/editOtzyvy.php?id_Otzyv=<?php echo $listOtzyvy['id_Otzyv'];?>"><?php echo $listOtzyvy['Text_Otzyv']; ?></a></td>
						<td><a id="deleteButton" class="btn btn-danger" href="../Delete/deleteOtzyvy.php?id_Otzyv=<?php echo $listOtzyvy['id_Otzyv'];?>">Удалить</a></td>
                        <td><button id="printButton" class="btn btn-default btn-with-icon">Печать</button></td>
					</tr>
				<?php } ?>
			</table>

			<script>
				$("#printButton").click(function() {
					var rowDataFio = $(this).closest("tr").find("td:eq(1)").text();
					var rowDataText = $(this).closest("tr").find("td:eq(2)").text();

					var printContentFioFirst = '<div class="text-otzyva-1">Студент ' + rowDataFio + ' в период с 19.06.2023 по 15.07.2023 проходил</div>';
					var printContentFioFSecond = '<div class="text-otzyva-1">' + rowDataFio + ' зарекомендовал себя с положительной стороны. Показал хо</div>';
					var printContentText = "<div>" + rowDataText + "</div>";

					var iframe = document.createElement('iframe');
					iframe.style.display = 'none';
					document.body.appendChild(iframe);

					var doc = iframe.contentWindow.document;
					doc.open();
					doc.write('<html><head><title>Document</title><style>' +
					'.center-text-1 {text-align: center; font-weight: bold;}' +
					'.center-text-2 {text-align: center;}' +
					'.hidden-1 {text-indent: -9999px; height: 20px; width: 600px; white-space: nowrap;}' +
					'.hidden-2 {text-indent: -9999px; height: 30px; width: 600px; white-space: nowrap;}' +
					'.hidden-3 {text-indent: -9999px; height: 60px; width: 600px; white-space: nowrap;}' +
					'.hidden-4 {text-indent: -9999px; height: 90px; width: 600px; white-space: nowrap;}' +
					'.text-otzyva-1 {text-indent: 60px;}' +
					'div {margin: 2;}' +
					'h1 { text-align: center; font-size: 16px; margin: 0;}' +
					'</style></head><body>' +
					'<div class="center-text-2">МИНИСТЕРСТВО СЕЛЬСКОГО ХОЗЯЙСТВА РОССИЙСКОЙ ФЕДЕРАЦИИ</div>' +
					'<div class="center-text-2">Федеральное государственное бюджетное образовательное учреждение</div>' +
					'<div class="center-text-2">высшего образования</div>' +
					'<div class="center-text-2">«КУБАНСКИЙ ГОСУДАРСТВЕННЫЙ АГРАРНЫЙ УНИВЕРСИТЕТ</div>' +
					'<div class="center-text-2">ИМЕНИ И.Т.ТРУБИЛИНА»</div>' +
					'<div class="hidden-3">Отступ</div>' +
					'<h1>ОТЗЫВ</h1>' +
					'<div class="center-text-1">руководителя практической подготовки при проведении практики</div>' +
					'<div class="hidden-1">Отступ</div>' +
					printContentFioFirst +
					'<div>производственную практику в ООО «Студия КИТ», проявил интерес к работе программиста.</div>' +
					printContentFioFSecond +
					'<div>рошие теоретические знания. Ко всем поручениям относился добросовестно, выполнял их своевремен</div>' +
					'<div>но и в срок, проявлял разумную инициативу своевременного выполнения порученной работы, не допуск</div>' +
					'<div>ал нарушений трудовой дисциплины. Запланированную программу практики выполнил в полном объеме.</div>' + 
					'<div class="text-otzyva-1">' + printContentText + '</div>' +
					'<div class="text-otzyva-1">Оценка прохождения практики определяется как "отлично".</div>' +
					'<div class="hidden-4">Оступ</div>' +
					'<div>Руководитель практической подготовки</div>' +
					'<div>при проведении практики __________________________/__________________________</div>' +
					'<div class="hidden-1">Оступ</div>' +
					'<div>Руководитель организации __________________________/__________________________</div>' +
					'<div class="hidden-2">Оступ</div>' +
					'<div style="font-weight: bold;">М.П.</div>' +
					'<div class="hidden-2">Оступ</div>' +
					'<div>15 июля 2023 г.</div>' +
					'<div></div>' +
					'</body></html>');
					doc.close();
					iframe.contentWindow.print();

					document.body.removeChild(iframe);
				});
			</script>


		<div class="buttons">	
			<button id="addButton" class="btn btn-default">Добавить отзыв</button>
		</div>

		<form action="" method="POST" role="form" style="display: none; margin-top: 20px;">

			<div class="form-group">
                <div class="form-group">
				<label for="">Выберите практиканта</label>
					<select name="prak" class="form-control" id="prak">
						<?php 
							$Praktikanty = getAllOtzyvyPraktikanty($db);
							foreach ($Praktikanty as $key => $value) {
								echo "<option selected disabled hidden>Выберите практиканта</option>
									<option value=".$value['id_Praktikant'].">".$value['Fio_Praktikant']."</option>";
							}
						?>
					</select>
				</div>
				<label for="">Напишите отзыв</label>
				<input type="text" class="form-control" id="otzyv" name="otzyv" placeholder="Отзыв о практиканте">
			</div>

			<div class="buttons">
				<button id="submitButton" type="submit" class="btn btn-primary">Добавить</button>
			</div>

		</form>
		</div>

		<?php
			if(isset($_POST['prak']) && $_POST['otzyv'] != ''){
				$prak = $_POST['prak'];
                $otzyv = $_POST['otzyv'];
				addOtzyv($db, $prak, $otzyv);
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