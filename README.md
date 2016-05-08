Интернет-магазин на Yii2
************************

Порядок установки для Ubuntu 15.10

1. Скачать архив с проектом в папку с именем, например, /var/www/hrml/intershop
2. Создать в mysql базу данных, например Baza2015
3. Настроить в файле проекта /config/db.php  параметры соединения с БД: 
   return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=Baza2015',
    'username' => 'root',
    'password' => '********',
    'charset' => 'utf8',
   ];
4. Создать необходимые таблицы, выполнив ранее подготовленную миграцию: 
   php yii migrate

5. Заполнить таблицы тестовыми данными: 
   mysql -uroot -p Baza2015<tovar.sql

6. Настроить виртуальный хост Apache. Для этого скопировать inter.loc.conf в папки
   /etc/apache2/sites-available и  /etc/apache2/sites-enabled  

7. В /etc/hosts прописать созданный хост: 
   127.0.0.1 inter.loc

8. Перезагрузить Apache
   service apache2 restart

9. Проект настроен и доступен в броузере по адресу inter.loc

