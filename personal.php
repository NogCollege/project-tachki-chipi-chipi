<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="templates\style.css">
</head>
<body>
    
</body>
</html>
<?php
$host = 'localhost'; 
$user = 'root'; 
$password = '';
$db_name = 'AutoPark'; 
$link = mysqli_connect($host, $user, $password, $db_name);
mysqli_query($link, "SET NAMES 'utf8'");
$query = "SELECT * FROM catalog ";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
$result='';

$id = $_GET['id'];

$query = "SELECT * FROM catalog where id = $id";

$result = mysqli_query($link, $query) or die(
    mysqli_error($link));
$data = mysqli_fetch_assoc($result);
;
$dir = 'templates/img/photos/' .' '. $data['id'] . '-' . $data['name'] . ''; 
// Укажите путь к папке сизображениями
$files = scandir($dir); // Получаем список файлов в папке
?>

<section class="FullPage">

    <h1>
        <? echo $data['full_name'] ?>
    </h1>
    <div class="slide_cont">
        <button type="button" class="prev-butt">←</button>
        <div class='slider'>

            <?php
            foreach ($files as $file) {
                $file_path = $dir . '/' . $file;
                if (
                    is_file($file_path) && in_array(
                        pathinfo(
                            $file_path,
                            PATHINFO_EXTENSION
                        ),
                        ['jpg', 'jpeg', 'png', 'gif']
                    )
                ) {
                    echo '<img src="' . $file_path . '" class="FullImg">';
                }
            }
            ?>

        </div>
        <button type="button" class="next-butt">→</button>
    </div>

    <p>
        <? echo $data['description'] ?>
    </p>
</section>
<script src="slider.js"></script>
