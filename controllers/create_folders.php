<?php
require_once 'controllers/connect.php';

foreach ($data as $elem) {
    if (file_exists("templates\img\photos\ " . $elem['id'] . '-' . $elem['name']))  {
        echo 'Эта папка уже существует</br>';
    } else {
        mkdir("templates\img\photos\ " . $elem['id'] . '-' . $elem['name']);
        echo 'Папка создана</br>';
    }
    }