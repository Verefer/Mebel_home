<meta charset="utf-8">
<?php
$servername = "localhost";
$username = "n93344bl_bd";
$password = "fdlbvxMMgR6K";
$dbname = "n93344bl_bd";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем данные из формы
$surname = $conn->real_escape_string($_POST['surname']);
$name = $conn->real_escape_string($_POST['name']);
$phone = $conn->real_escape_string($_POST['phone']);
$email = $conn->real_escape_string($_POST['email']);
$material = $conn->real_escape_string($_POST['material']);
$square_meters = intval($_POST['square-meters']);

$services = [
    'edging' => [
        'кромление 0,4мм' => ['price' => 35, 'quantity' => $_POST['кромление 0,4мм-quantity']],
        'кромление 1мм' => ['price' => 45, 'quantity' => $_POST['кромление 1мм-quantity']],
        'кромление 2мм' => ['price' => 65, 'quantity' => $_POST['кромление 2мм-quantity']],
        'Кромление 35х2мм' => ['price' => 120, 'quantity' => $_POST['Кромление 35х2мм-quantity']]
    ],
    'service' => [
        'паз 3х6' => ['price' => 25, 'quantity' => $_POST['паз 3х6-quantity']],
        'паз под подсветку' => ['price' => 150, 'quantity' => $_POST['паз под подсветку-quantity']],
        'Склейка деталей' => ['price' => 500, 'quantity' => $_POST['Склейка деталей-quantity']],
        'скругление угла r50-99мм' => ['price' => 70, 'quantity' => $_POST['скругление угла r50-99мм-quantity']],
        'скругление угла r100-149мм' => ['price' => 100, 'quantity' => $_POST['скругление угла r100-149мм-quantity']],
        'скругление угла r150-200мм' => ['price' => 130, 'quantity' => $_POST['скругление угла r150-200мм-quantity']],
        'скругление угла r200=мм' => ['price' => 150, 'quantity' => $_POST['скругление угла r200=мм-quantity']],
        'Криволинейные детали под кромку' => ['price' => 150, 'quantity' => $_POST['Криволинейные детали под кромку-quantity']],
        'Криволинейные детали под кант' => ['price' => 120, 'quantity' => $_POST['Криволинейные детали под кант-quantity']]
    ]
];

// Подготовка запроса для вставки данных
$sql = "INSERT INTO orders (surname, name, phone, email, material, square_meters) VALUES ('$surname', '$name', '$phone', '$email', '$material', $square_meters)";

if ($conn->query($sql) === TRUE) {
    $order_id = $conn->insert_id;

    foreach ($services as $category => $items) {
        foreach ($items as $name => $details) {
            $quantity = isset($details['quantity']) ? intval($details['quantity']) : 0;
            if ($quantity > 0) {
                $price = $details['price'];
                
                $sql = "INSERT INTO order_details (order_id, item, category, quantity, price) VALUES ($order_id, '$name', '$category', $quantity, $price)";
                if (!$conn->query($sql)) {
                    echo "Ошибка: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }

    echo "Заказ успешно сохранен!";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
