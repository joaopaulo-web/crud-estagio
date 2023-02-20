<?php
require 'config.php';

$usuario = [];
$id = filter_input(INPUT_GET, 'id');

if($id){
    $sql = $pdo -> prepare("SELECT * FROM usuario WHERE id = :id");
    $sql -> bindValue(':id', $id);
    $sql -> execute();

    if($sql -> rowCount() > 0){
        $usuario = $sql -> fetch(PDO::FETCH_ASSOC);
    }else{
        header("Location: index.php");
        exit;
    }
}else{
    header("Location: index.php");
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Usuários</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style-editar.css">
    </head>
    
    <body>
    
        <h1>Editar Usuário</h1>
    
        <div class ="container">
    
            <form action="editar_action.php" method="post" class="fl-table">
    
                <div class="datas">
    
                    <input type="hidden" name="id" value="<?=$usuario['id'];?>">
    
                    <label for="nome" class="field">
                        *Nome: <input type="text" name="nome" value="<?=$usuario['nome'];?>" placeholder="Ex: Fernando">
                    </label>
    
                    <label for="email" class="field">
                        *Email: <input type="text" name="email" value="<?=$usuario['email'];?>" placeholder="Ex: usuario@gmail.com">
                    </label>
    
                    <label for="idade" class="field">
                        *Idade: <input type="text" name="idade" value="<?=$usuario['idade'];?>" placeholder="Ex: 24">
                    </label>
    
                    <div class="btn-save">
                        <input type="submit" value="Atualizar">
                    </div>
    
                    <p>*Ao clicar em salvar, você será direcionado a listagem de usuários.</p>
                </div>
            </form>
    
        </div>
    </body>
</html>