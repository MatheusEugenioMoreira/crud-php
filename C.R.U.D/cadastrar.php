<?php
header("Content-type:text/html; charset=utf8");
//importar a classe Alunos
require_once "Classes/Alunos.php";
//instaciar a classe Alunos
$Alunos = new Alunos();
//criar a lista de alunos
if (isset($_POST["Salvar"])) {
//   chamar a funcao inserir
    $Alunos->inserir();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Sistema Escolar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<div class="container lista">
    <div align="center">
        <img src="img/Logo%203.1.png" width="250" alt="Logo">
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="cadastrar.php" method="post">
                <div class="row">
                    <div class="form-group col-lg-9">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="sexo">Sexo</label>
                        <select name="sexo" class="form-control">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                            <option value="O">Outros</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="email@com.br">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" class="form-control">
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="telefone">Telefone</label>
                        <input type="number" name="telefone" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="curso">Curso</label>
                        <input type="text" name="curso" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="turma_codigo">Turma</label>
                        <input type="number" name="turma_codigo" class="form-control">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="unidade_codigo">Unidade</label>
                        <input type="number" name="unidade_codigo" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="serie_periodo">Série</label>
                        <input type="number" name="serie_periodo" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="n_chamada">N° de chamada</label>
                        <input type="number" name="n_chamada" class="form-control">
                    </div>
                </div>
                <div align="center">
                    <button class="btn btn-success" type="submit" name="Salvar">Salvar</button>
                    <a class="btn btn-outline-danger" href="index.php">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>