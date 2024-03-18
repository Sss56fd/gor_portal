<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gor_portal";

// подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// проверка соединения
if ($conn->connect_error) {
    die("ошибка соединения с базой данных: " . $conn->connect_error);
}

// обработка добавления записи
if(isset($_POST['tema'])) {
    $tema = $_POST['tema'];
    $sql = "INSERT INTO темы (темы) VALUES ('$tema')";
    $conn->query($sql);
}

// закрытие соединения с базой данных
$conn->close();
?>

<!-- Вернуться на главную страницу -->
<form action="profile.php">
    <input type="submit" value="вернуться на главную">
</form>
