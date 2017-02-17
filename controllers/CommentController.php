<?php

class CommentController
{

    /**
     * Добавляем комментарий в базу
     */
    public function actionComment()
    {

   if (isset($_POST['message'])) {

        $name = $_SESSION['userInfo']->first_name;
        $message = $_POST['message'];
        $id_message = $_POST['id_message'];
        $user_id = $_SESSION['user'];

        Comments::addComment($name, $message, $id_message, $user_id);
     }

        header("Location: /");

        return true;
    }

    /**
     * Удаляем комментарий из базы
     */
    public function actionDelete($id){


        Comments::deleteComment($id);
        header("Location: /");
    }

    /**
     * Редактируем комментарий
     */
    public function actionUpdate($id){

        if (isset($_POST['message'])) {
            $message = $_POST['message'];
            Comments::updateComment($message, $id);
        }

        header("Location: /");
        return true;
    }

    /**
     * Добавляем ответ на комментарий
     */
    public function actionAnswer($id){


        if (isset($_POST['message'])) {
            $message = $_POST['message'];
            $parent_id = $id;
            $user_id = $_SESSION['user'];
            $name = $_SESSION['userInfo']->first_name;
            $id_message = 2;

            Comments::addAnswer($name, $message, $id_message, $parent_id, $user_id);

        }

     header("Location: /");
        return true;
    }


    /**
     * Вставляем дополнительную форму
     */
    public function actionForm(){
        require_once(ROOT . '/views/site/form.php');
        return true;
    }
}