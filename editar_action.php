<?php
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$idade = filter_input(INPUT_POST, 'idade');

if($id && $nome && $email && $idade){
    $sql = $pdo -> prepare('UPDATE usuario SET nome = :nome, email = :email, idade = :idade WHERE id = :id');
    $sql -> bindValue(':id', $id);
    $sql -> bindValue(':nome', $nome);
    $sql -> bindValue(':email', $email);
    $sql -> bindValue(':idade', $idade);
    $sql -> execute();
    header("Location: index.php");
} else{
    header("Location: index.php");
}