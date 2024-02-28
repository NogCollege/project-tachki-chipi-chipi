<?php
require_once 'connect.php';
require_once 'head.php';
?>
<table class="a_table">
    <tr class="info">
        <td>id</td>
        <td>is_exists</td>
        <td>name</td>
        <td>sity</td>
        <td>type</td>
        <td>full_name</td>
        <td>year</td>
        <td>engine_type</td>
        <td>volume</td>
        <td>horse_power</td>
        <td>max_price</td>
        <td>middle_price</td>
        <td>min_price</td>
        <td>description</td>
    </tr>
    <?php

    foreach ($data as $elem) {
        $result .= '<tr>';
        $result .= '<td>' . $elem['id'] . '</td>';
        $result .= '<td>' . $elem['is_exists'] . '</td>';
        $result .= '<td>' . $elem['name'] . '</td>';
        $result .= '<td>' . $elem['sity'] . '</td>';
        $result .= '<td>' . $elem['type'] . '</td>';
        $result .= '<td>' . $elem['full_name'] . '</td>';
        $result .= '<td>' . $elem['year'] . '</td>';
        $result .= '<td>' . $elem['engine_type'] . '</td>';
        $result .= '<td>' . $elem['volume'] . '</td>';
        $result .= '<td>' . $elem['horse_power'] . '</td>';
        $result .= '<td>' . $elem['max_price'] . '</td>';
        $result .= '<td>' . $elem['middle_price'] . '</td>';
        $result .= '<td>' . $elem['min_price'] . '</td>';
        $result .= '<td>' .'<p class="big_boy">'. $elem['description'] .'</p>'. '</td>';
        $result .= '<td ><a href="upload.php?id=' . $elem['id'] . '">Фото</a></td>';
        $result .= '<td><a href="?del=' . $elem['id'] . '">Удалить</td>';
        $result .= '</tr>';
        
        // $uploadDir = 'templates/img/photos/'. ''. $elem['id'] . '-' . $elem['name'] . '';
        // if ($_FILES) {
        //     $files = array_filter($_FILES['upload']['name']);
        //     $total = count($_FILES['upload']['name']);
        //     for ($i = 0; $i < $total; $i++) {
        //         $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
        //         if ($tmpFilePath != "") {
        //             $newFilePath = $uploadDir . $_FILES['upload']['name'][$i];
        //             if (!file_exists($newFilePath)) {
        //                 move_uploaded_file($tmpFilePath, $newFilePath);
        //                 echo $_FILES['upload']['name'][$i] . ' успешно загружен в папку ' .
        //                     $uploadDir . '<br>';
        //             } else {
        //                 echo 'Файл ' . $_FILES['upload']['name'][$i] . ' уже существует!';
        //             }
        //         }
        //     }
        // }
    }
    echo $result;
     ?>
     <?php
  //Если переменная Name передана
  if (isset($_POST["name"])) {
        $is_exists = $_POST['is_exists'];
        $name = $_POST['name'];
        $sity = $_POST['sity'];
        $type = $_POST['type'];
        $full_name = $_POST['full_name'];
        $year = $_POST['year'];
        $engine_type = $_POST['engine_type'];
        $volume = $_POST['volume'];
        $horse_power = $_POST['horse_power'];
        $max_price = $_POST['max_price'];
        $middle_price = $_POST['middle_price'];
        $min_price = $_POST['min_price'];
        $description = $_POST['description'];
    $sql = mysqli_query($link, "INSERT INTO catalog SET is_exists='1', name='$name', sity='$sity', type='$type', full_name='$full_name', year='$year', engine_type='$engine_type', volume='$volume', horse_power='$horse_power', max_price='$max_price', middle_price='$middle_price', min_price='$min_price', description='$description'");
    if ($sql) {
      echo '<p>Данные успешно добавлены в таблицу.</p>';
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
  }
?>
  <form action="" method="POST">
    <tr>
        <td><input type="hidden" name="id"></td>
        <td><input type="hidden" name="is_exists"></td>
        <td><input type="text" name="name"></td>
        <td><input type="text" name="sity"></td>
        <td><input type="text" name="type"></td>
        <td><input type="text" name="full_name"></td>
        <td><input type="number" name="year"></td>
        <td><input type="text" name="engine_type"></td>
        <td><input type="number" name="volume"></td>
        <td><input type="number" name="horse_power"></td>
        <td><input type="number" name="max_price"></td>
        <td><input type="number" name="middle_price"></td>
        <td><input type="number" name="min_price"></td>
        <td><input type="text" name="description"></td>
        <td><input type="submit" value="Добавить"></td>
        </tr>
    </table>    
   </form>

<?php   


if (isset($_GET['del'])) {
    $del = $_GET['del'];

    $query = "INSERT INTO deleted SELECT * FROM catalog WHERE id = '$del'";
    mysqli_query($link, $query) or die(mysqli_error($link));

    $query = "DELETE FROM catalog where id = '$del'";
    mysqli_query($link, $query) or die(mysqli_error($link));
} 
require_once 'create_folders.php';
?>

<!-- <input name="upload[]" type="file" multiple="multiple"><br> -->

<?

?>