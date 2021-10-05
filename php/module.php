<?php

    foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/satellites/news/php/model/*.php') AS $models) { require($models); }
    foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/satellites/news/php/view/*.php') AS $views) { require($views); }
    foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/satellites/news/php/controller/*.php') AS $controllers) { require($controllers); }

?>