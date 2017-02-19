<div class="firstmsg">
    <div class="panel panel-default bgclass" id="<?php echo($comment['id']) ?>">
        <div class="panel-body">
            <div class="col-sm-12">
                <div class="com-sm-6" style="float:left">
                    Автор: <?php echo($comment['name']) ?>
                </div>
                <div class="com-sm-6 pull-right">
                    Дата добавления: <?php echo($comment['created']) ?>
                </div>
            </div>
            <div class="col-sm-12 msg">
                Сообщение: <?php echo($comment['message']) ?>
            </div>

            <div class="com-sm-6 pull-right">
                <?php if ($comment['user_id'] == $iduser): ?>
                    <a class="addToComment" data-id="<?php echo $comment['id']; ?>"
                       title="Ответить">Ответить</a>
                    <a title="Редактировать"><i
                                class="fa fa-pencil-square-o editComment"
                                data-id="<?php echo $comment['id']; ?>"></i></a>
                    <a href="/delete/<?php echo $comment['id']; ?>" title="Удалить"><i
                                class="fa fa-times"></i></a>
                    <?php elseif (isset($_SESSION['user'])): ?>
                    <a class="addToComment" data-id="<?php echo $comment['id']; ?>"
                       title="Ответить">Ответить</a>
                <?php else: ?>
                    <div class="com-sm-6 pull-right">
                        <p><span class="label label-warning">Действия: Только просмотр</span>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="inner" data-in="<?php echo $comment['id']; ?>">
            </div>
        </div>
    </div>
    <?php if (!empty($comment['children'])): ?>
        <a class="slide" data-slide="<?php echo $comment['id']; ?>">Cвернуть <i class="fa fa-angle-down"
                                                                                ></i></a>
        <div class="padding slide<?php echo $comment['id']; ?>" >
            <?php echo Comments::getCommentsTemplate($comment['children']); ?>
        </div>
    <?php endif; ?>
</div>
