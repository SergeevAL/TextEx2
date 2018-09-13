<?php


$link = mysqli_connect("127.0.0.1", "f90065eh_db", "cake26", "f90065eh_db");

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Соединение с MySQL установлено!" . PHP_EOL;
echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Таблица товаров</title>



</head>
<body>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $query = "SELECT id, name FROM category ORDER by id ";

    if ($result = mysqli_query($link,$query)) {

    /* выборка данных и помещение их в массив */
        while ($row = $result->fetch_row()) {
            echo '
                <tr>
                <th scope="row">'. $row[0] . '</th>
                <td> '. $row[1] . '</td>
                </tr>
            ';
        }

    /* очищаем результирующий набор */
        $result->close();
    }
    ?>

  </tbody>
</table>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Url</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $query = "SELECT id, name, description, price, url FROM offers ORDER by id ";

    if ($result = mysqli_query($link,$query)) {

    /* выборка данных и помещение их в массив */
        while ($row = $result->fetch_row()) {
            echo '
                <tr>
                <th scope="row">'. $row[0] . '</th>
                <td> '. $row[1] . '</td>
                <td> '. $row[2] . '</td>
                <td> '. $row[3] . '</td>
                <td> '. $row[4] . '</td>
                </tr>
            ';
        }

    /* очищаем результирующий набор */
        $result->close();
    }
    ?>

  </tbody>
</table>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Vendor</th>
    </tr>
  </thead>
  <tbody>
 
  <?php
  /*  
    $query = "SELECT offers.id, name, vendor FROM offers INNER JOIN category ON offers.categoryId = category.id;";

    if ($result = mysqli_query($link,$query)) {


        while ($row = $result->fetch_row()) {
            echo '
                <tr>
                <th scope="row">'. $row[0] . '</th>
                <td> '. $row[1] . '</td>
                <td> '. $row[2] . '</td>
                </tr>
            ';
        }


        $result->close();
    }
    */
    ?>

  </tbody>
</table>
    
</body>
</html>