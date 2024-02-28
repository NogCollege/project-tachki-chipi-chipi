<?php
require_once "head.php";
require_once "space-min.php";

$host = 'localhost'; //имя хоста, на локальном компьютере это localh
$user = 'tamaziq2_52'; //имя пользователя, по умолчанию это root
$password = 'Aboba12'; //пароль, по умолчанию пустой
$db_name = 'tamaziq2_52'; //имя базы данных
//Соединяемся с базой данных используя наши доступы:
$link = mysqli_connect($host, $user, $password, $db_name);
//Устанавливаем кодировку (не обязательно, но поможет избежать проблем):
mysqli_query($link, "SET NAMES 'utf8'");
//Формируем тестовый запрос:
$query = "SELECT * FROM catalog ";
//Делаем запрос к БД, результат запроса пишем в $result:
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
$result='';


$id = $_GET['id'];

$query = "SELECT * FROM catalog where id = $id";

$result = mysqli_query($link, $query) or die(
    mysqli_error($link));
$data = mysqli_fetch_assoc($result);
;
$dir = 'img/photos/' . $data['id'] . '-' . $data['name'] . ''; 

$files = scandir($dir); 
?>
<button class="back_b" type="button" ><a href="http://project-tachki-chipi-chipi/">Назад</a></button>
<div class="FullPage">

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

    <p class="descript">
        <? echo $data['description'] ?>
    </p>
</div>
<script src="slider.js"></script>
