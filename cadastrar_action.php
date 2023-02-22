<?php
require 'config.php';

$nome = filter_input(INPUT_POST,'nome');
$email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
$idade = filter_input(INPUT_POST,'idade');

if($nome && $email && $idade){
    
    $sql = $pdo -> prepare("SELECT * FROM usuario WHERE email = :email");
    $sql -> bindValue(':email', $email);
    $sql -> execute();

    if($sql -> rowCount() === 0){

        $sql = $pdo->prepare("INSERT INTO usuario (nome, email, idade) VALUES (:nome, :email, :idade)");
        
        $sql -> bindValue(':nome', $nome);
        $sql -> bindValue(':email',$email);
        $sql -> bindValue(':idade',$idade);
        $sql -> execute();

        echo '<script>alert("Usuário cadastrado com sucesso!"); window.location.href = "index.php";</script>';
        exit;
    }else{
        header("Location: cadastrar.php");
        exit;
    }
}else{
    header("Location:cadastrar.php");
    exit;
}