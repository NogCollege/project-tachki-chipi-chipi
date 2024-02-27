<?php
require_once "controllers\head.php";
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

$files = scandir($dir); 
?>
<button class="back_b" type="button" ><a href="http://project-tachki-chipi-chipi/admin.php">Назад</a></button>
<div class="FullPage">

    <h1>
        <? echo $data['full_name'] ?>
    </h1>
    <!-- <div class="slide_cont">
        <button type="button" class="prev-butt">←</button>
        <div class='slider'> -->

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
                    echo '<img src="' . $file_path . '" class="adm_img">';
                }
            }
            ?>

        </div>
        <!-- <button type="button" class="next-butt">→</button> -->
    </div>
</div>
<?php

$home = $_SERVER['DOCUMENT_ROOT']."/";

$unlink = @unlink($home.'путь_до_папки/файл.html');

if($unlink == true){ echo "получилось удалить";} else{ echo "не получилось удалить";}