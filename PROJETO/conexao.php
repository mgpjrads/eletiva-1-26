<?php
    $dominio = "mysql:host=localhost;dbname=projetophp"; //qual banco (SGBD):onde está
    $usuario = "root";
    $senha = "";
    
    try{
        $pdo = new PDO($dominio, $usuario, $senha); //php data objects
    } catch(Exception $e){
        die("Erro ao conectar ao banco: ". $e->getMessage()); // pode ser ponto no lugar da seta
    }

?>