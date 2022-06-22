<?php 

if (isset($_POST["enviar"])){

$nome=$_POST["nome"]; 
$nascimento=$_POST["date"]; 
$email=$_POST["email"];  
$senha=$_POST["password"];  

$msg=$_POST["mensagem"]; 

echo "<p>Olá, ".$nome."</p>"; 

echo "<p>Seu email é: ".$email."</p>"; 

echo "<p>Seu nascimento é: ".$nascimento."</p>"; 
  
echo "<p>Sua mensagem é:<br/>".$msg."</p>"; 

} 


?>
