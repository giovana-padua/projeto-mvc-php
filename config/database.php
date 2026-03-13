<?php
    /* IGUAL O DA ANA

        $conexao = mysqli_connect(hostname: "localhost", username: "root", password: "");

        if (!$conexao) {
            die();
        }

    $sql = "CREATE DATABASE IF NOT EXISTS aula_mvc CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

    mysqli_select_db(mysql: $conexao, database: "aula_mvc");

    $sql = "CREATE TABLE IF NOT EXISTS produtos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        descricao TEXT,
        preco DECIMAL(10, 2) NOT NULL,
        quantidade INT NOT NULL
    )";

    */

    return [
        'host' => 'localhost',
        'dbname' => 'aula_mvc',
        'user' => 'root',
        'pass' => ''
    ];