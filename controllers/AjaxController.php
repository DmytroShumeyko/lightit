<?php


class AjaxController
{

    /**
     * Редактирование сообщения
     */
    public function actionUpdate()
    {

        if (isset($_POST['id'])) {

            $id = $_POST['id'];
            $data = Comments::getCommentForUpdate($id);
            echo($data['message']);

        }
        return true;

    }
}