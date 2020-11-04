<?php

// importar a class conexao
// include / require -> include nao para execuxao do programa apenas a mensegem de erro / require para a execucao do programa
// include_onde / require_onde -> importa o arquivo apenas uma vez
require_once "Conexao.php";

class Alunos
{

    //Atributos
    public $matricula;
    public $nome;
    public $endereco;
    public $telefone;
    public $sexo;
    public $email;
    public $curso;
    public $turma_codigo;
    public $unidade_codigo;
    public $serie_periodo;
    public $n_chamada;

    //metodos

    //metodo listar

    public function ListarTodos(){
        try {
            // instanciar a class conexao
            $bd = new Conexao();
            //criar o objeto com a conexao PDO
            $con = $bd->conectar();

            // criar o comando sql para enviar ao  BD
            $sql = $con->prepare("select * from aluno");

            // executar o comando no BD
            $sql-> execute();

            //verificar se retornou valores
            if($sql->rowCount() > 0){
                // retornar os dados dos alunos para o HTML / fetchAll retorna em formato linhas/colunas
                return $result = $sql->fetchAll(PDO:: FETCH_CLASS);
            }
        }catch(PDOException $msg){
            echo "Nao foi possivel listar os alunos " .$msg->getMessge();
        }
    }

    public function inserir()
    {
        try {

            if (isset($_POST['nome']) && isset($_POST['endereco'])) {
                $this->nome = $_POST["nome"];
                $this->endereco = $_POST["endereco"];
                $this->telefone = $_POST["telefone"];
                $this->sexo = $_POST["sexo"];
                $this->email = $_POST["email"];
                $this->curso = $_POST["curso"];
                $this->turma_codigo = $_POST["turma_codigo"];
                $this->unidade_codigo = $_POST["unidade_codigo"];
                $this->serie_periodo = $_POST["serie_periodo"];
                $this->n_chamada = $_POST["n_chamada"];


                $bd = new Conexao();

                $con = $bd->conectar(); 

                $sql = $con->prepare("insert into aluno(matricula,nome,endereco,telefone,sexo,email,curso,turma_codigo,unidade_codigo,serie_periodo,n_chamada)
                                values (null,?,?,?,?,?,?,?,?,?,?)");

                $sql->execute(array(
                    $this->nome,
                    $this->endereco,
                    $this->telefone,
                    $this->sexo,
                    $this->email,
                    $this->curso,
                    $this->turma_codigo,
                    $this->unidade_codigo,
                    $this->serie_periodo,
                    $this->n_chamada,

                ));

                //var_dump($sql->errorInfo()); die();
                if ($sql->rowCount() > 0) {
                    header("location: index.php");
                }
            }else{
                header("location: index.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possivel inserir o aluno: " . $msg->getMessage();
        }
    }

    public function excluir($matricula)
    {
        try
        {
            if (isset($matricula))
            {
                $this->matricula = $matricula;

                $bd = new Conexao();

                $con = $bd->conectar();

                $sql = $con->prepare("delete from aluno where matricula = ?");

                $sql->execute(array($this->matricula));

                if ($sql->rowCount() > 0)
                {
                    header("location:index.php");
                }
            }else{
                header("location:index.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possivel excluir os alunos: " . $msg->getMessage();
        }
    }

    public function alterar()
    {
        try
        {
            if (isset($_POST["Salvar"])){
                $this->nome = $_POST["nome"];
                $this->endereco = $_POST["endereco"];
                $this->telefone = $_POST["telefone"];
                $this->sexo = $_POST["sexo"];
                $this->email = $_POST["email"];
                $this->curso = $_POST["curso"];
                $this->turma_codigo = $_POST["turma_codigo"];
                $this->unidade_codigo = $_POST["unidade_codigo"];
                $this->serie_periodo = $_POST["serie_periodo"];
                $this->n_chamada = $_POST["n_chamada"];

                $bd = new Conexao();

                $con = $bd->conectar();

                $sql = $con->prepare("update aluno set nome = ?,endereco =?,telefone = ?,sexo = ?,email = ?,curso = ?,turma_codigo = ?,unidade_codigo = ?,serie_periodo = ?,n_chamada = ? where matricula = ?");

                $sql->execute(array(
                    $this->nome,
                    $this->endereco,
                    $this->telefone,
                    $this->sexo,
                    $this->email,
                    $this->curso,
                    $this->turma_codigo,
                    $this->unidade_codigo,
                    $this->serie_periodo,
                    $this->n_chamada,
                    $this->matricula
                ));

                //var_dump($sql->errorInfo()); die();
                if ($sql->rowCount() > 0)
                {
                    header("location: index.php");
                }
            }else{
                header("location: index.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possivel alterar o aluno: " . $msg->getMessage();
        }
    }

    public function listarID($matricula)
    {
        try
        {
            if (isset($matricula))
            {
                $this->matricula = $matricula;

                $bd = new Conexao();

                $con = $bd->conectar();

                $sql = $con->prepare("select * from aluno where matricula = ?");

                $sql->execute(array($this->matricula));

                if ($sql->rowCount() > 0){
                    return $result = $sql->fetchObject();
                }
            }
        }catch (PDOException $msg){
            echo "Não foi possivel listar o aluno: " . $msg->getMessage();
        }
    }


}