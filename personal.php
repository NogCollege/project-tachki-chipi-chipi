<?php
require_once 'controllers\connect.php';
$dir = 'templates\img\photos\ 1-X2';// Укажите путь к папке с

$files = scandir($dir); // Получаем список файлов в папке
foreach ($files as $file) {
 $file_path = $dir . '/' . $file;
 if (is_file($file_path) && in_array(pathinfo($file_path,PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
 echo '<img src="' . $file_path . '" ;>';
 }
}
