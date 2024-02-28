<?php
require_once 'connect.php';

foreach ($data as $elem) {
    if (file_exists("img\photos\ " . $elem['id'] . '-' . $elem['name']))  {
        echo 'Эта папка уже существует</br>';
    } else {
        mkdir("img\photos\ " . $elem['id'] . '-' . $elem['name']);
        echo 'Папка создана</br>';
    }
    }