<?php
require 'config.php';

$lista = [];
$sql = $pdo -> query("SELECT * FROM usuario");

if($sql -> rowCount() > 0){
    $lista = $sql -> fetchAll(PDO::FETCH_ASSOC);
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-index.css">
</head>

<h1>Lista de Usuários</h1>

<div class="table-wrapper">

    <table class="fl-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>
    </thead>
        <?php foreach ($lista as $usuario): ?>
            <tr>
                <td> <?=$usuario['id'];?> </td>
                <td> <?=$usuario['nome'];?> </td>
                <td> <?=$usuario['email'];?> </td>
                <td> <?=$usuario['idade'];?> </td>
                <td>
                    <a href="editar.php?id=<?=$usuario['id'];?>">[ Editar ]</a>
                    <a href="excluir.php?id=<?=$usuario['id'];?>">[ Excluir ]</a>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
    
    <div class="btn-bottom">
        <a href="cadastrar.php">Cadastrar Usuário</a>
    </div>
</div>