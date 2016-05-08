<?php


$this->title = 'InterShop';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Интернет магазин</h1>

        <p class="lead">Каталог</p>

    </div>

    <div class="body-content">

<?php
// Подключение к MySQL
$host     = "localhost";
$user     = "root";
$password = "babaj4972";
$db       = "Baza2015";
$link=mysql_connect($host, $user, $password);
if (!$link) { die('Ошибка соединения: ' . mysql_error()); }
mysql_select_db($db);

// Формирование drop down list с названием товара и формы ввода
$query="SELECT name,id FROM tovar order by name"; 
$result = mysql_query($query) or die ('Ошибка выбора данных: ' . mysql_error());
?>

<center>
    <form method="POST" id="formx" action="javascript:void(null);" onsubmit="call()">

    <label for="tovar">Товар</label>
    <select name='tovar'>
<?php
    while ($row = mysql_fetch_assoc($result)) {
      echo "<option value=$row[id]>$row[name]</option>"; 
     }
?>
    </select>
    <label for="kol">Количество</label>
    <input id="kol" name="kol" value="1" type="text">
    <input value="Добавить в корзину" type="submit">
    </form>
    </br></br></br></br></br>
</center>    
   
<!-- Вывод содержимого корзины -->
    <div id="results"></div> 


    </div>
</div>
