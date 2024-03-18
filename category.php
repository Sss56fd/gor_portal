<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gor_portal";

// Подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка соединения с базой данных: " . $conn->connect_error);
}

// Обработка удаления записи
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM Темы WHERE id=$id";
    $conn->query($sql);
}

// Запрос к базе данных
$sql = "SELECT * FROM Темы";
$result = $conn->query($sql);

// Вывод данных в виде HTML-таблицы с кнопками для удаления
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>темы</th><th>Действия</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["темы"] . "</td>";
        echo "<td><a href='?delete=".$row["id"]."'>Удалить</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Нет данных для отображения.";
}


// Закрытие соединения с базой данных
$conn->close();
?>

<form method="POST" action="add.php">
    <input type="text" name="tema" placeholder="Тема" required>
    <input type="submit" value="Добавить запись">
</form>

<form action="profile.php">
              <input type="submit" value="Вернуться на главную">
          </form>