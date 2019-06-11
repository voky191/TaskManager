<?php
return array(
    //'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'news/([0-9]+)/edit' => 'news/edit/$1',

    'news/([0-9]+)' => 'news/view/$1',

    'news/new' => 'news/new',

    'register' => 'user/register',
    'login' => 'user/login',

  'news' => 'news/main', // method actionMain in NewsController


);