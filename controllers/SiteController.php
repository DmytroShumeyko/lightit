<?php


class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {

        // Ссылка на авторизацию
        $linkvk = Site::getLink();

        // Обработка массива комментариев
        $commentsList = Comments::getComments();
        $commentsList = Comments::sortComments($commentsList);
        $comments = Comments::getCommentsTemplate($commentsList);


        require_once(ROOT . '/views/site/index.php');
        return true;
    }


}
