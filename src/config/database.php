<?php

class Database
{

    // Método para obter a conexão com o banco de dados
    public static function getConnection()
    {
        // Caminho do arquivo de configuração
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
        // Leitura das configurações do banco de dados do arquivo .ini
        $env = parse_ini_file($envPath);

        // Criação de uma nova instância da classe mysqli para estabelecer a conexão
        $conn = new mysqli(
            $env['host'],
            $env['username'],
            $env['password'],
            $env['database']
        );

        // Verifica se ocorreu algum erro na conexão
        if ($conn->connect_error) {
            // Encerra o programa e exibe uma mensagem de erro
            die("Erro: " . $conn->connect_error);
        }

        // Retorna a conexão estabelecida
        return $conn;
    }

    // Método para obter o resultado de uma consulta SQL
    public static function getResultFromQuery($sql)
    {
        // Obtém a conexão com o banco de dados
        $conn = self::getConnection();

        // Executa a consulta no banco de dados
        $result = $conn->query($sql);

        // Fecha a conexão
        $conn->close();

        // Retorna o resultado da consulta
        return $result;
    }

    // Método para executar uma consulta SQL que modifica o banco de dados
    public static function executeSQL($sql)
    {
        // Obtém a conexão com o banco de dados
        $conn = self::getConnection();

        // Executa a consulta no banco de dados
        if (!mysqli_query($conn, $sql)) {
            // Lança uma exceção se ocorrer um erro na execução da consulta
            throw new Exception(mysqli_error($conn));
        }

        // Obtém o ID da última inserção no banco de dados, se aplicável
        $id = $conn->insert_id;

        // Fecha a conexão
        $conn->close();

        // Retorna o ID da última inserção
        return $id;
    }
}
