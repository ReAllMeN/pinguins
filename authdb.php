
<?php 
include "connect.php"; 
$login = htmlspecialchars(trim($_POST['email']),ENT_QUOTES); // Удаляет все лишнее и записываем значение в переменную //$login 
$name = htmlspecialchars(trim($_POST['username']), ENT_QUOTES); 
$password = htmlspecialchars(trim($_POST['password']),ENT_QUOTES);  
$result = "SELECT * FROM Users WHERE email = '$login' and password = '$password'"; 
$result1 = mysqli_query($con, $result); 
$user1 = mysqli_fetch_assoc($result1); // Конвертируем в массив 
if(count($user1) == 0){ 
 echo "Такой пользователь не найден."; 
 exit(); 
} 
else if(count($user1) == 1){ 
 echo "Логин или пароль введены неверно"; 
 exit(); 
} 
 
setcookie('user', $user1['username'], time() + 3600, "/"); 
 
header('Location: page.php');