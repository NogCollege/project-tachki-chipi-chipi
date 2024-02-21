<?php
require_once 'connect.php';
$dir = 'templates\img\photos\ '.$elem['id'].'-'.$elem['name']; // Укажите путь к папке с
$files = scandir($dir); // Получаем список файлов в папке
foreach ($files as $file) {
 $file_path = $dir . '/' . $file;
 if (is_file($file_path) && in_array(pathinfo($file_path,PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
 echo '<img src="' . $file_path . '" ;>';
 }
}
