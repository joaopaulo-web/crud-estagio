<?php
require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);

if ($nome && $email && $idade) {
    if (strpos($email, '@') !== false && strpos($email, '.com') !== false) {
        $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() === 0) {

            $sql = $pdo->prepare("INSERT INTO usuario (nome, email, idade) VALUES (:nome, :email, :idade)");

            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':idade', $idade);
            $sql->execute();

            echo '<script>alert("Usuário cadastrado com sucesso!"); window.location.href = "index.php";</script>';
            exit;
        } else {
            echo '<script>alert("ERRO: Email duplicado"); window.location.href = "index.php";</script>';
        }
    } else {
        header("Location: cadastrar.php");
        exit;
    }
} else {
    header("Location:cadastrar.php");
    exit;
}