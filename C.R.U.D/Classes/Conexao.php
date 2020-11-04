<?php
/**
 * Created by PhpStorm.
 * User: 11801263
 * Date: 24/09/2019
 * Time: 10:41
 */

class Conexao
{

    // atributos
    private $servidor;
    private $banco;
    private $usuario;
    private $senha;

    //metodos

    function __construct()
    {
        // definir os valores para conexao
        $this->servidor = "localhost";
        $this->banco = "sistemaescolar";
        $this->usuario = "root";
        $this->senha = "";
    }

    // metodo para conectar

    public function conectar()
    {
        //validação da execuç~~ão do codigo
        try {
            //criar a conexão com a classe PDO
            $con = new PDO("mysql:host=" . $this->servidor . ";dbname=" . $this->banco . ";charset=utf8", $this->usuario, $this->senha);
            //retornar a conexão
            return $con;

        } catch (PDOException $msg) {
            //mensagem de erro para usuario
            echo "Error ao conectar ao banco: " . $msg->getMessage();
        }
    }
}