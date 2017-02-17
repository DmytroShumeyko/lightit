<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <h1>Welcome&nbsp;<span><?php if (isset($_SESSION['userInfo'])) {
                                echo($_SESSION['userInfo']->first_name);
                            } ?></span></h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">

                    <form method="post" action="/comment/" class="comment-form validate-form" role="form" id="formMain">
                        <fieldset>
                            <div class="input-row field form-group">
                                <input type="hidden" name="id_message" value="1">
                                <input class="form-control input-field required" style="width: 20%; text-align: center"
                                       type="text" name="name" placeholder="Ваше имя" disabled
                                       value="<?php if (isset($_SESSION['userInfo'])) {
                                           echo($_SESSION['userInfo']->first_name);
                                       } ?>">
                            </div>
                            <div class="input-row form-group">
                                <textarea required class="form-control input-field textarea" rows="3" name="message"
                                          placeholder="Комментарий"></textarea>
                            </div>
                            <div class="input-row" id="smb">
                                <?php if (User::isGuest()): ?>
                                    <div class="com-sm-6 pull-right">
                                        <p>Для отправки сообщений необходимо авторизироваться</p>
                                    </div>
                                <?php else: ?>
                                    <input class="btn btn-primary comment-submit pull-right" type="submit"
                                           value="Оставить комментарий">
                                <?php endif; ?>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <a class="slideall" > Cвернуть все комментарии <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <a class="slideallmsg" >&nbsp&nbspCвернуть все сообщения <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div style="border: 1px solid orange; margin-top: 30px; min-height: 50px;">
                        <?php echo $comments; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>