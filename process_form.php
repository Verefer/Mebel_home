<?php
// Параметры подключения к базе данных
$servername = "127.0.0.1";
$port = "3306"; // Порт MySQL
$username = "root"; // Логин
$password = ""; // Пароля нет
$dbname = "n93344bl_bd"; // Название базы данных

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Подготовка и выполнение SQL-запроса
$sql = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    // Закрываем соединение
    $stmt->close();
    $conn->close();
    
    // После успешной отправки перенаправляем на главную страницу
    header("Location: index.php"); // Укажите здесь путь к вашей главной странице
    exit(); // Обязательно завершаем выполнение скрипта после перенаправления
} else {
    echo "Ошибка: " . $stmt->error;
    // В случае ошибки, также рекомендуется перенаправить пользователя на главную страницу
    // header("Location: index.php");
    // exit();
}
?>
