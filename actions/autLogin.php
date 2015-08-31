<?php

require_once 'aUsuarios.php';
echo 'Autenticando!!!';
$usuario = new aUsuarios();

if (isset($_POST['Login'])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    echo 'Login' + $_POST['Username'];
    echo 'Login' + $Password;
    if ($usuario->login($Username, $Password)) {
        header('location:../SWeb_Login/Admin/index.html');
        echo 'Login Effetuado com sucesso!';
        
    } else {
        header('location:../SWeb_Login/index.html');
        echo 'Usuário ou Senha incorretos!';
    }
    
}

