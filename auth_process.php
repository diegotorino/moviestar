<?php

require_once("models/user.php");
require_once("models/Message.php");
require_once("dao/userDAO.php");
require_once("globals.php");
require_once("db.php");

$message = new Message($BASE_URL);


$userDao = new UserDAO($conn, $BASE_URL);


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

        // verificar se as senhas batem

        if($password === $confirmpassword) {

            // Verificar se o e-mail já está cadastrado no sistema
            if($userDao->findByEmail($email) == false) {

                $user = new User();

                //Criação de Token e Senha

                $userToken = $user->generateToken();
                $finalPassword = $user->generateToken($password);

                $user->name = $name;
                $user->lastname = $lastname;
                $user->email = $email;
                $user->password = $finalPassword;
                $user->token = $usertoken;

                $auth = true;

                $userDAO->create($user, $auth);

            } else {
                //
                $message->setMessage("usuario já cadastrado, tente outro e-mail.", "error", "back");
            }


        } else {

            //enviar uma msg de erro . de senhas nao batem

            $message->setMessage("As senhas não são iguais.", "error", "back");

        }




    } else {

        // enviar uma msg de erro dados faltantes
        $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
 }

} else if($ype === "login") {


}

?>