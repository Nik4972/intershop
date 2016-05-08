<?php

//Соединение с БД
$host     = "localhost";
$user     = "root";
$password = "babaj4972";
$db       = "Baza2015";
$link=mysql_connect($host, $user, $password);
   if (!$link) { die('Ошибка соединения: ' . mysql_error()); }
mysql_select_db($db);

   if($_POST["idd"]) { // Удаление записи из корзины

    $query="DELETE FROM trash where id=".$_POST["idd"]; 
    $result = mysql_query($query) or die ('Ошибка удаления данных: ' . mysql_error());
   }
    else { // Добавление записи в корзину

           //Проверка валидности количества товара
          if (!is_numeric($_POST["kol"]) || $_POST["kol"] == 0 ) {
            echo '<center>';
     	       echo '<h3 style="color:red">Неверное количество товара!</h3>';
            echo '</center>';

          } else {    	

    	//Проверка наличия товара в корзине
     $query="SELECT * FROM trash where tovarid=".$_POST["tovar"]; 
     $result = mysql_query($query) or die ('Ошибка выбора данных: ' . mysql_error());
     $row = mysql_num_rows($result);
     if ($row != 0) {
     	echo '<center>';
     	echo '<h3 style="color:red">Данный товар уже присутствует в корзине!</h3>';
     	echo '</center>';
     } else {

     $query="SELECT name,price FROM tovar where id=".$_POST["tovar"]; 
     $result = mysql_query($query) or die ('Ошибка выбора данных: ' . mysql_error());
     $row = mysql_fetch_assoc($result);

     $query="INSERT INTO trash SET tovarid=".$_POST["tovar"].", 
                                   name='".$row["name"]."'".", 
                                   kol=".$_POST["kol"].", 
                                   price=".$row["price"].", 
                                   summa=".$_POST["kol"]*$row["price"];

     $result = mysql_query($query) or die ('Ошибка вставки данных: ' . mysql_error());

    }
  }
}
// Вывод содержимого корзины
$query="SELECT * FROM trash"; 
$result = mysql_query($query) or die ('Ошибка выбора данных: ' . mysql_error());

echo "<center><h1>Корзина<h1></center>";

echo "<table border=\"1\" width=\"100%\" bgcolor=\"#FFFFA1\">";
echo '<tr><th style="text-align:center">Товар</th><th style="text-align:center">Количество</th><th style="text-align:center">Цена</th>';
echo '<th style="text-align:center">Сумма</th> <th style="text-align:center">Удалить</th></tr>';

$itogo=0;
$trash=array();

 while ($row = mysql_fetch_assoc($result)) {
   $itogo=$itogo+$row["summa"];
   $trash[]=$row["tovarid"];
   echo "<tr align=center bgcolor=\"#FFFFE1\">";
   echo "<td>$row[name]</td><td>$row[kol]</td><td>$row[price]</td>";
   echo "<td>$row[summa]</td>";
   echo '<td><a href="javascript:void(null);" onClick="del('.$row["id"].');">Удалить</a></td>';
   echo "</tr>";
 }
echo "</table>";
echo "</br></br></br>";

//Проверка участия в акциях
$action=0;
if(in_array(1,$trash) & in_array(2,$trash))  { $itogo=$itogo/2; $action=$action+1; }
if(in_array(4,$trash) & !in_array(3,$trash)) { $itogo=$itogo-20; $action=$action+1; }

echo "<h3>Примененные акции: $action</h3>";

echo "<h3>Итого: ".$itogo."</h3></br>";


?>





