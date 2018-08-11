<?php

    // function __autoload($className){
    //     //$className（インスタンス生成時に読み込まれていないクラス名）
    //     $file = 'models/' . $className . '.php';
    //     require $file;
    // }
    require_once('models/User.php');
    require_once('models/UserDao.php');

    $userDao = new UserDao();
    $userDao->getConnection();
    $users = $userDao->getAllUsers();
    $userDao->closeConnection();
    foreach($users as $user){
        echo "<p>".$user->getUserId().", ".$user->getName().", ".$user->getGender()."</p>";
    }
?>