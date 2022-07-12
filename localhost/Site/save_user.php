
<html>
<head>
<link rel="stylesheet" href="index.css"/>
<link rel="shortcut icon" href="Game.ico" type="image/x-icon">
</head>
<?php
	
	include "db.php"; //подключил базу
	include 'header.php'; //вывел шапку
	$bd = get_users(); //получил список пользователей
	$cho = $_POST['submit']; //Получаем кнопку
	
	if($cho=='Зарегистрироваться'){ //-------------Если нажали кнопку зарегаться
	
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
	if(preg_match('/[^а-яА-ЯёЁa-zA-Z0-9\-]+/', $login)){
		print "<div calss='outer'><div class='inner';><h1 style=' text-align:center;'>Используйте для логина только буквы латинского алфавита, цифры и знак нижнего подчеркивания</h1></div></div>";
		
		exit( );
	}
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
 $password = stripslashes($password);
    $password = htmlspecialchars($password);
 //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
 // подключаемся к базе
   // файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
	
	foreach($bd as $b){
		if ($b["login"] == $login){
			exit("Введённый вами логин уже зарегистрирован. Введите другой логин.");
		}
	}
    
	
 // если такого нет, то сохраняем данные
    $sql = "INSERT INTO users (login,password) VALUES('$login','$password')";
    // Проверяем, есть ли ошибки
	if(mysqli_query($db, $sql)){
		
		//echo "<h1 style=' text-align:center;'>Регистрация прошла успешно</h1>";
		setcookie("Login", $login, time()+3600);
		$sqll = "CREATE TABLE $login (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(50) NOT NULL, Img VARCHAR(50), Price INT(4))";
		mysqli_query($db, $sqll);
		header("Location:index.php");
				exit();
		
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
	}
if($cho=='Выход'){
	setcookie("Login", $login, time()-3600);
	header("Location:reg.php");
	exit();
}	// ----------Если нажали кнопку войти------------------------------------------------------------
	else{
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
$password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);

     
 
	//$result = mysqli_query("SELECT * FROM users WHERE login='$login'",$db); //извлекаем из базы все данные о пользователе с введенным логином
    //$myrow = mysql_fetch_array($result);
	$kost = 0;
	
	foreach($bd as $b){
		if($login == $b["login"]){
			if ($password == $b["password"]){
				$_SESSION['login']=$myrow['login']; 
				$_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
				
				setcookie("Login", $login, time()+3600);
				
				$kost = 1;
				header("Location:index.php");
				exit();
			}
		}
	}
    
	if($kost==0){
		exit ("Извините, введённый вами login или пароль неверный.");
	}
    
    }
    
	
    ?>
</html>