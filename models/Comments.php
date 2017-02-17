<?php

class Comments
{

    /**
     * Добавляем комментарий в базу
     */
    public static function addComment($name, $message, $id_message, $user_id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO comments (name, message, id_message, user_id) '
            . 'VALUES (:name, :message, :id_message, :user_id)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':message', $message, PDO::PARAM_STR);
        $result->bindParam(':id_message', $id_message, PDO::PARAM_INT);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        return $result->execute();
    }

    /**
     * Берем из базы комментарии
     */
    public static function getComments()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT * FROM comments ORDER BY parent_id DESC, created DESC');
        $i = 0;
        $commentsList = array();
        while ($row = $result->fetch()) {
            $commentsList[$i]['id'] = $row['id'];
            $commentsList[$i]['id_message'] = $row['id_message'];
            $commentsList[$i]['parent_id'] = $row['parent_id'];
            $commentsList[$i]['name'] = $row['name'];
            $commentsList[$i]['user_id'] = $row['user_id'];
            $commentsList[$i]['message'] = $row['message'];
            $commentsList[$i]['created'] = $row['created'];
            $i++;
        }
        return $commentsList;
    }

    /**
     * Удаляем комментарий
     */
    public static function deleteComment($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM comments WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Получаем комментарий для редактирования
     */
    public static function getCommentForUpdate($id)
    {

        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT message FROM comments WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        //     $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();

    }

    /**
     * Записываем отредактированные данные комментария
     */
    public static function updateComment($message, $id)
    {

        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE comments SET message = :message WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':message', $message, PDO::PARAM_STR);

        return $result->execute();

    }

    /**
     * Записываем комментарий на комментарий
     */
    public static function addAnswer($name, $message, $id_message, $parent_id, $user_id)
    {

        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO comments (name, message, id_message, parent_id, user_id) '
            . 'VALUES (:name, :message, :id_message, :parent_id, :user_id)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':message', $message, PDO::PARAM_STR);
        $result->bindParam(':id_message', $id_message, PDO::PARAM_INT);
        $result->bindParam(':parent_id', $parent_id, PDO::PARAM_INT);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        return $result->execute();
    }

    /**
     * Сортировка массива комментариев
     */
    public static function sortComments($data, $root = 0)
    {


        $tree = array();
        foreach ($data as $ids => $node) {

            if ($node['parent_id'] == $root) {
                unset($data[$ids]);
                $node['children'] = self::sortComments($data, $node['id']);
                $tree[] = $node;

            }
        }
        return $tree;
    }

    /**
     * Формирование HTML кода комментариев
     */
    public static function getCommentsTemplate($comments)
    {

        $html = '';
        foreach ($comments as $comment) {
            ob_start();
            $iduser = 1;
            if (isset($_SESSION['user'])) {
                $iduser = $_SESSION['user'];
            }
            include ROOT . '/views/site/comments_template.php';
            $html .= ob_get_clean();
        }

        return $html;
    }


}