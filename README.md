# lightit
test for Light-it

Api settings:

Адрес сайта: http://lightit/

Базовый домен: lightit

/models/Sute.php 
contains my setting:
"$client_id = '5874155'; // ID приложения
$redirect_uri = 'http://lightit/user/login/'; // Адрес сайта
$url = 'http://oauth.vk.com/authorize'; // url vk"

DB setting - you can find end edit in (ROOT . '/config/db_params.php');

DB file you can find there: (ROOT . 'lightit.sql');

You must create new db with name "lightit" and import tabs from file.
