<?php
require_once 'controllers/connect.php';
?>
<table>
    <tr class="info">
        <td>id</td>
        <td>rent_able</td>
        <td>name</td>
        <td>city</td>
        <td>category</td>
        <td>fullname</td>
        <td>date</td>
        <td>engine_</br>type</td>
        <td>engine_</br>volume</td>
        <td>horse_</br>power</td>
        <td>price_max</td>
        <td>price_mid</td>
        <td>price_min</td>
        <td>full_desc</td>
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
        $result .= '<td class="fullDesk">' . $elem['description'] . '</td>';
        $result .= '<td class="FileUpload"><a href="templates/upload-img/uploadpage.php?id=' . $elem['id'] . '">Фото</a></td>';
        $result .= '<td><a href="?del=' . $elem['id'] . '">Удалить</td>';
        $result .= '</tr>';

        $uploadDir = 'templates/img/photos/'. ''. $elem['id'] . '-' . $elem['name'] . '';
        if ($_FILES) {
            $files = array_filter($_FILES['upload']['name']);
            $total = count($_FILES['upload']['name']);
            for ($i = 0; $i < $total; $i++) {
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                if ($tmpFilePath != "") {
                    $newFilePath = $uploadDir . $_FILES['upload']['name'][$i];
                    if (!file_exists($newFilePath)) {
                        move_uploaded_file($tmpFilePath, $newFilePath);
                        echo $_FILES['upload']['name'][$i] . ' успешно загружен в папку ' .
                            $uploadDir . '<br>';
                    } else {
                        echo 'Файл ' . $_FILES['upload']['name'][$i] . ' уже существует!';
                    }
                }
            }
        }
    }

    if ($_FILES) {
        $files = array_filter($_FILES['upload']['name']);
        $total = count($_FILES['upload']['name']);
        for ($i = 0; $i < $total; $i++) {
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
            if ($tmpFilePath != "") {
                $newFilePath = $uploadDir . $_FILES['upload']['name'][$i];
                if (!file_exists($newFilePath)) {
                    move_uploaded_file($tmpFilePath, $newFilePath);
                    echo $_FILES['upload']['name'][$i] . ' успешно загружен в папку ' .
                        $uploadDir . '<br>';
                } else {
                    echo 'Файл ' . $_FILES['upload']['name'][$i] . ' уже существует!';
                }
            }
        }
    }

    echo $result;
    ?>
    <?php
    if (!empty($_POST)) {
        $rent_able = $_POST['is_exists'];
        $name = $_POST['name'];
        $city = $_POST['sity'];
        $category = $_POST['category'];
        $fullname = $_POST['fullname'];
        $date = $_POST['date'];
        $engine_type = $_POST['engine_type'];
        $engine_volume = $_POST['engine_volume'];
        $horse_power = $_POST['horse_power'];
        $price_max = $_POST['price_max'];
        $price_mid = $_POST['price_mid'];
        $price_min = $_POST['price_min'];
        $full_desc = $_POST['full_desc'];
        $query = "INSERT INTO catalog SET rent_able='$rent_able', name='$name', city='$city', category='$category', fullname='$fullname', date='$date', engine_type='$engine_type', engine_volume='$engine_volume', horse_power='$horse_power', price_max='$price_max', price_mid='$price_mid', price_min='$price_min', full_desc='$full_desc'";
        mysqli_query($link, $query) or die(mysqli_error($link));


    } ?>

    <form action="" method="POST">
        <td><input type="hidden" name="id"></td>
        <td><input type="number" name="rent_able"></td>
        <td><input type="text" name="name"></td>
        <td><input type="text" name="city"></td>
        <td><input type="text" name="category"></td>
        <td><input type="text" name="fullname"></td>
        <td><input type="number" name="date"></td>
        <td><input type="text" name="engine_type"></td>
        <td><input type="number" name="engine_volume"></td>
        <td><input type="number" name="horse_power"></td>
        <td><input type="number" name="price_max"></td>
        <td><input type="number" name="price_mid"></td>
        <td><input type="number" name="price_min"></td>
        <td><input type="text" name="full_desc"></td>
        <td><input type="submit" value="Добавить"></td>
    </form>
</table>

<?php
if (isset($_GET['del'])) {
    $del = $_GET['del'];

    $query = "INSERT INTO deleted SELECT * FROM catalog WHERE id = '$del'";
    mysqli_query($link, $query) or die(mysqli_error($link));

    $query = "DELETE FROM catalog where id = '$del'";
    mysqli_query($link, $query) or die(mysqli_error($link));
}
?>

<!-- <input name="upload[]" type="file" multiple="multiple"><br> -->

<?

?>