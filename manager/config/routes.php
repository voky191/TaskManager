<?php
return array(
    //'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'news/([0-9]+)' => 'news/$1',
  'news' => 'news/index', // method actionIndex in NewsController
    'news/([a-z]+)' => 'news/index'
  //'products' => 'product/list' //method actonList in ProductController

);