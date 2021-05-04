<!DOCTYPE html>
<html>
	<head>
		<link type="image/x-icon" rel="shortcut icon" href="favicon.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Дома</title>
		<link rel="stylesheet" href="bootstrap.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
	<!-- menu -->
<div class="menu">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="img/logo2.svg" alt="логотип" height="75%"/>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav nav-fill w-100 fzb18">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Главная</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="doma.php">Дома</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="kvartiri.php">Квартиры</a>
                </li>
        </ul>
          <form class="form-inline my-2 my-lg-0 fzb18">
            <button class="btn btn-success" type="submit"><a href="php/registration/login.php"> Вход</a>
          </form>
        </div>
      </nav>
</div>
 <!-- /menu -->
<div class="push1"></div>
 <!-- ДОМА -->
<div class="examples_house">

	<div class="our_homes">НАШИ ДОМА</div>

	<!-- <div class="examples_rooms">
		<div class="examples_img"><img src="img/house/rooms1.png" width="100%" height="100%"></div>

		<div class="house_rooms">
			<div class="examples_house_name">«РУМС 1»</div>
			<div class="examples_house_text">описание</div>
			<div class="examples_house_text">Улица, расположение</div>
			<div class="examples_house_text">Количество квартир</div>
			<div class="look_rooms"><form action="kvartiri.html"><button class="btn btn-success" type="submit" style="width: 250px;">Посмотреть квартиры</button></form></div>
		</div>
	</div> -->
<?php
include 'php/connect.php';

$street=$_POST['street'];
$location=$_POST['location'];
$name_home=$_POST['name_home'];
$description_home=$_POST['description_home'];
$apartments=$_POST['apartments'];
$wall_type=$_POST['wall_type'];

$search_home=$_GET['search_home'];
$send_search_home=$_GET['send_search_home'];

$query_home = ("SELECT * FROM `home` ");
$result_home = mysqli_query($connection, $query_home);
$row_home = mysqli_fetch_array ($result_home);

if ($send_search_home) {

	$str_out_home="SELECT * FROM `home` WHERE (floors LIKE '%$search_home%' OR wall_type LIKE '%$search_home%')";
	}
	else
	{
		$str_out_home="SELECT * FROM `home`";
	}


$run_out_home=mysqli_query($connection,$str_out_home);

if (mysqli_num_rows($run_out_home)>0) {
	$id=0;


while ($out_home=mysqli_fetch_array($run_out_home)) {
		$id = $out_home['id'];
?>


	<div class="examples_rooms">
<?php
			
?>
		<div class="examples_img">
<?php
		    echo "<img src=img/house/$out_home[picture_apartments]>";
?>
		</div>
		<div class="house_rooms">
			<div class="examples_house_name">
<?php

			echo "$out_home[name_home]";
?>
			</div>
			<div class="examples_house_text">
<?php

			echo "$out_home[description_home]";
?>
			</div>
			<div class="examples_house_text">
<?php
			
			echo "$out_home[street],";

			echo "$out_home[location]";
?>
			</div>
			<div class="examples_house_text">
<?php

			echo "Квартир $out_home[apartments], ";

			echo "$out_home[floors] Этажей";
?>
			</div>
			<div class="examples_house_text">
<?php

			echo "Тип стен: $out_home[wall_type]<br>";	
?>
			</div>
			<div class="look_rooms">
				<div class="btn btn-success">
<?php
			echo  "<a href=kvartiri.php?home_id=$id>Посмотреть квартиры</a>";
?>			
				</div>
			</div>
		</div>
	</div>
<?php
		}
		echo "</table>";
	}
	else
	{
		echo "Поиск и фильтр не дал результатов<br>";
	}
?>
	<!-- <div class="examples_rooms">
		<div class="examples_img"><img src="img/house/rooms2.png" width="100%" height="100%"></div>

		<div class="house_rooms">
			<div class="examples_house_name">«РУМС 2»</div>
			<div class="examples_house_text">описание</div>
			<div class="examples_house_text">Улица, расположение</div>
			<div class="examples_house_text">Количество квартир</div>
			<div class="look_rooms"><form action="kvartiri2.html"><button class="btn btn-success" type="submit" style="width: 250px;">Посмотреть квартиры</button></form></div>
		</div>
	</div>

	<div class="examples_rooms">
		<div class="examples_img"><img src="img/house/rooms3.png" width="100%" height="100%"></div>

		<div class="house_rooms">
			<div class="examples_house_name">«РУМС 3»</div>
			<div class="examples_house_text">описание</div>
			<div class="examples_house_text">Улица, расположение</div>
			<div class="examples_house_text">Количество квартир</div>
			<div class="look_rooms"><form action="kvartiri3.html"><button class="btn btn-success" type="submit" style="width: 250px;">Посмотреть квартиры</button></form></div>
		</div>
	</div>

	<div class="examples_rooms">
		<div class="examples_img"><img src="img/house/rooms4.png" width="100%" height="100%"></div>

		<div class="house_rooms">
			<div class="examples_house_name">«РУМС 4»</div>
			<div class="examples_house_text">описание</div>
			<div class="examples_house_text">Улица, расположение</div>
			<div class="examples_house_text">Количество квартир</div>
			<div class="look_rooms"><form action="kvartiri4.html"><button class="btn btn-success" type="submit" style="width: 250px;">Посмотреть квартиры</button></form></div>
		</div>
	</div> -->
</div>

	<!-- ФУТЕР -->
<div class="footer">
	<div class="name_company">«РУМС»</div>

	<div class="footer_name">
		<div class="footer_link"><a href="index.php">Главная</a></div>
		<div class="footer_link"><a href="kvartiri.php">Квартиры</a></div>
	</div>

	<div class="seti">
		<div class="footer_examples"><a href="https://vk.com/" target="_blank"><img src="img/link/vk.png" width="30px"></a></div>
		
		<div class="footer_examples"><a href="https://twitter.com/" target="_blank"><img src="img/link/twitter.png" width="30px"></a></div>

		<div class="footer_examples"><a href="https://www.instagram.com/" target="_blank"><img src="img/link/insta.png" width="30px"></a></div>
	</div>

	<div class="copyright">Copyright</div>
</div>

</body>
</html>