<?php

require_once("models/user.php");
require_once("models/Message.php");
require_once("models/userDAO.php");
require_once("globals.php");
require_once("db.php");

$message = new Message($BASE_URL);


// Resgata o tipo do formulário
$type = filter_input(INPUT_POST, "type");



//Verificação do tipo de formulário

if($type === "register") {

    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");


    //Verificação de dados minimos
    if($name && $lastname && $email && $password) {




    } else {

        // enviar uma msg de erro dados faltantes
        $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
 }

} else if($ype === "login") {


}