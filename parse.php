
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
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

$xml = simplexml_load_file('goods.xml');


foreach ($xml->shop->categories->category as $category) {
    echo $category . ' ' .'<br>';
    //    printf($categories->category);
    if ($result = mysqli_query($link, "INSERT 
                                        INTO category (name)
                                        VALUES ('$category'
                                            )")) {
        printf("Select вернул %d строк.\n", mysqli_num_rows($result));
    
        /* очищаем результирующий набор */
        mysqli_free_result($result);
    }
}



foreach ($xml->shop->offers->offer as $category) {
echo $category->name . ' ' . 
$category->url . ' ' . 
$category->price . ' ' . 
$category->optprice . ' ' . 
$category->categoryId . ' ' . 
$category->articul . ' ' . 
$category->description . ' ' . 
$category->picture . ' ' . 
$category->statusNew . ' ' . 
$category->statusAction . ' ' . 
$category->statusTop . ' ' . 
    $category->vendor . '<br>';
//    printf($categories->category);
if ($result = mysqli_query($link, "INSERT 
                                    INTO offers (name, description, vendor, articul, price, optprice, url, picture, categoryId, statusNew, statusAction, statusTop) 
                                    VALUES ('$category->name', 
                                        '$category->description', 
                                        '$category->vendor', 
                                        '$category->articul',
                                        '$category->price',
                                        '$category->optprice',
                                        '$category->url',
                                        '$category->picture',
                                        '$category->categoryId',
                                        '$category->statusNew',
                                        '$category->statusAction',
                                        '$category->statusTop'
                                        )")) {
    printf("Select вернул %d строк.\n", mysqli_num_rows($result));

    /* очищаем результирующий набор */
    mysqli_free_result($result);
}
}


?>

</body>
</html>