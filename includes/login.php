<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
}

function cripto($senha){
    return base64_encode($senha);
}

function gerarHash($senha){
    $txt = cripto($senha);
    $hash = password_hash($txt,PASSWORD_DEFAULT);
    return $hash;
}

function testarHash($senha,$hash){
    $ok = password_verify(cripto($senha),$hash);
    return $ok;
}

function login(){
    $_SESSION['user']='';
    $_SESSION['nome']='';
}

function logout(){
    unset($_SESSION['user']);
    unset($_SESSION['nome']);
}

function is_logado(){
    return empty($_SESSION['user'])?false:true;
}

?>