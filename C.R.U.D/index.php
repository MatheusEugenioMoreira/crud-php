<?php
header("Content-type:text/html; charset=utf8");
//importar a classe alunos
require_once "Classes/Alunos.php";
//criar a classe alunos
$alunos = new Alunos();
//criar lista de alunos
$listaAlunos = $alunos->ListarTodos();

if(isset($_GET["matricula"])){
    $alunos->excluir($_GET["matricula"]);
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
</head>
<body>


<div class="container lista">
<!--    listagem de alunos-->
    <div class="row">
        <div class="col-md-10">
            <h3>Lista de Alunos</h3>
        </div>
        <div class="col-md-2">
            <a href="cadastrar.php" class="btn btn-outline-primary">Novo</a>
        </div>
    </div>
<!--    tabela de alunos-->
    <table class="table table-dark">
<!--        cabeçalho da tabela -> onde fica as colunas do banco de dados-->
        <thead>
            <tr> <!-- linha -->
                <th>Matricula</th> <!-- colunas-->
                <th>Nome</th>
                <th>Sexo</th>
                <th>E-mail</th>
                <th>Endereco</th>
                <th>Telefone</th>
                <th>Curso</th>
                <th>Turma</th>
                <th>Frequência</th>
                <th>Unidade</th>
                <th>Série/Período</th>
                <th>N° de chamada</th>
                <th></th> <!-- coluna vazia para exibir os botoes ecluir / editar-->
            </tr>
        </thead>
<!--        corpo da tabela -> onde fica os dados-->
        <tbody>
        <?php if ($listaAlunos) :
            foreach ($listaAlunos as $aluno) : ?>
            <tr>
                <td><?php echo $aluno->matricula; ?></td>
                <td><?php echo $aluno->nome; ?></td>
                <td><?php echo $aluno->sexo; ?></td>
                <td><?php echo $aluno->email; ?></td>
                <td><?php echo $aluno->endereco; ?></td>
                <td><?php echo $aluno->telefone; ?></td>
                <td><?php echo $aluno->curso; ?></td>
                <td><?php echo $aluno->turma_codigo; ?></td>

                <td><?php echo $aluno->unidade_codigo; ?></td>
                <td><?php echo $aluno->serie_periodo; ?></td>
                <td><?php echo $aluno->n_chamada; ?></td>
                <td>
                    <a href="alterar.php?matricula=<?php echo $aluno->matricula; ?>" class="btn btn-success">A</a>
                    <a href="index.php?matricula=<?php echo $aluno->matricula; ?>" class="btn btn-outline-danger">E</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Nenhum aluno encontrado</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html