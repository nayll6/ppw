<?php

//conexão com o banco de dados via include
include("./conexao.php");

$nome = $_POST['name'];
$nascimento = $_POST['date'];
$email = $_POST['email'];
$senha = $_POST['password'];

$sql = "INSERT INTO usuarios(`nome`, `nascimento`, `email`, `senha`) VALUES ('$nome', '$nascimento', '$email', '$senha')";

if(mysqli_query($conexao, $sql))
    echo "Cadastro realizado com sucesso!";
else
    echo "Erro! ".mysqli_connect_error($conexao);

mysqli_close($conexao);

?>