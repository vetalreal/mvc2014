<?php

function getConfig(){
    return array(
      'appname' => 'Тестовое приложение MVC',
      'db'=>array(
        'connection' => 'mysql:host=localhost;dbname=php14',
        'username' => 'root',
        'pass' => '',
      )
    );
}
