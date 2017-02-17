<?php

class UserController
{
    /**
     * Action для страницы "Регистрация"
     */

    public function actionLogin($code)
    {


        $getcode = User::getCode($code);

        $userInfo = User::loginVk($getcode);

        if (isset($userInfo->response[0]->uid)) {
            $userInfo = $userInfo->response[0];
            $result = true;
            // Запоминаем пользователя
            User::auth($userInfo->uid, $userInfo);
            // Проверяем наличие пользователя в базе
            if (!User::checkUserData($userInfo->uid)) {
                User::register($userInfo->uid, $userInfo->first_name, $userInfo->last_name);
            }
            header("Location: /");
        }

        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {


        // Удаляем информацию о пользователе из сессии
        unset($_SESSION['userInfo']);
        unset($_SESSION["user"]);
        
        // Перенаправляем пользователя на главную страницу
        header("Location: /");
    }

}
