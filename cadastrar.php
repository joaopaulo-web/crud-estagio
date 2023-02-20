<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Novos Usuários</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-cadastrar2.css">
</head>

<body>
        <h1>Cadastrar Usuário</h1>

    <div class="container">

        <form method="post" action="cadastrar_action.php" class="fl-table">

            <div class="datas">

                <label for="nome" class="field">
                    *Nome: <input type="text" name="nome" required placeholder="Ex: Fernando">
                </label>

                <label for="email" class="field">
                    *Email: <input type="email" name="email" required placeholder="Ex: usuario@gmail.com">
                </label>

                <label for="idade" class="field">
                    *Idade: <input type="number" name="idade" required placeholder="Ex: 24">
                </label>

                <div class="btn-save">
                    <input type="submit" value="Salvar">
                </div>
                
                <p>*Ao clicar em salvar, você será direcionado a listagem de usuários.</p>
            </div>

        </form>
    </div>
</body>
</html>