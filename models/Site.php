<?php


class Site
{
    /**
     * Получаем ссылку для авторизации
     */
    public static function getLink(){
        $client_id = '5874155'; // ID приложения
        $redirect_uri = 'http://lightit/user/login/'; // Адрес сайта
        $url = 'http://oauth.vk.com/authorize';
        $params = array(
            'client_id'     => $client_id,
            'redirect_uri'  => $redirect_uri,
            'response_type' => 'code'
        );
        $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a></p>';
    return $link;
    }
}