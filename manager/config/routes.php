<?php
return array(
    'news/([0-9]+)/edit' => 'news/edit/$1',
    'news/([0-9]+)' => 'news/view/$1',
    'news/new' => 'news/new',
    'register' => 'user/register',
    'login' => 'user/login',
    'logout' => 'user/logout',
  'news' => 'news/main', // method actionMain in NewsController
);