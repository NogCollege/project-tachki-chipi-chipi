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
                    echo'<input type="submit" value="Удалить">';
                }
            }
            ?>

        </div>
    </div>
</div>

<?php
if (isset($_POST["name"])) {
    $home = $_SERVER['DOCUMENT_ROOT']."/";

    $unlink = @unlink($home.'templates\img\photos\main.jpg"');

    if($unlink == true){ echo "получилось удалить";} else{ echo "не получилось удалить";}

$uploadDir = './uploadFiles/';
if ($_FILES) {
$files = array_filter($_FILES['upload']['name']);
$total = count($_FILES['upload']['name']);
for ($i = 0; $i < $total; $i++) {
$tmpFilePath = $_FILES['upload']['tmp_name'][$i];
if ($tmpFilePath != "") {
$newFilePath = $uploadDir . $_FILES['upload']['name'][$i];
if(!file_exists($newFilePath)) {
move_uploaded_file($tmpFilePath, $newFilePath);
echo $_FILES['upload']['name'][$i] .' успешно загружен в папку ' . 
$uploadDir .'<br>';
} else {
echo 'Файл '. $_FILES['upload']['name'][$i] .' уже существует!';
}
} 
}
}
}