<?php

return array(


    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'ajax/answer' => 'ajax/answer',
    'ajax/update' => 'ajax/update',

    '/views/site/comments_template.php' => 'site/index',
    'form' => 'comment/form',
    'update/([0-9]+)' => 'comment/update/$1',
    'answer/([0-9]+)' => 'comment/answer/$1',
    'delete/([0-9]+)' => 'comment/delete/$1',
    'comment' => 'comment/comment',
    'index.php' => 'site/index', // actionIndex в SiteController

    '' => 'site/index', // actionIndex в SiteController
);
