<?php

/**
 * Класс User - модель для работы с пользователями
 */

class User
{

    /**
     * Извлекаем код
     */
    public static function getCode($code){
        $getcode = explode('=', $code);
        return $getcode[1];
    }

    /**
     * Логинимся через Вконтакте
     */
    public static function loginVk($getcode){

        $client_id = '5874155'; // ID приложения
        $client_secret = 'qm5KdWoyuV0KiTdD5mbs'; // Защищённый ключ
        $redirect_uri = 'http://lightit/user/login/'; // Адрес сайта

        if (isset($_GET['code'])) {
            $params = array(
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'code' => $getcode,
                'redirect_uri' => $redirect_uri
            );

            $ku = curl_init();
            curl_setopt($ku, CURLOPT_URL, 'https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params)));
            curl_setopt($ku, CURLOPT_RETURNTRANSFER, true);
            $token = json_decode(curl_exec($ku));
            curl_close($ku);
        }
        if (isset($token->access_token)) {

            $params = array(
                'uids' => $token->user_id,
                'fields' => 'uid,first_name',
                'access_token' => $token->access_token
            );

            $ku_2 = curl_init();
            curl_setopt($ku_2, CURLOPT_URL, 'https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params)));
            curl_setopt($ku_2, CURLOPT_RETURNTRANSFER, true);
            $userInfo = json_decode(curl_exec($ku_2));
            curl_close($ku_2);

        }
        return $userInfo;
    }

    /**
     * Регистрируем пользователя
     */
    public static function register($user_id, $name, $last_name)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO user (user_id, name, last_name) '
            . 'VALUES (:user_id, :name, :last_name)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Проверяем существует ли пользователь
     */
    public static function checkUserData($user_id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM user WHERE user_id = :user_id';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->execute();

        // Обращаемся к записи
        $user = $result->fetch();

        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return true;
        }
        return false;
    }

    /**
     * Запоминаем пользователя
     */
    public static function auth($userId, $userInfo)
    {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userId;
        $_SESSION['userInfo'] = $userInfo;
    }

     /**
     * Проверяет является ли пользователь гостем
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }


}
