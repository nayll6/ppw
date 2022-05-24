<?php

// Recuperando os dados do form. pelo POST
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['data_nascimento'];
$sexo = $_POST['sexo'];

// Recuperando dados da foto que foi submetida pelo form.
$nome_foto = basename($_FILES['foto']['name']);
$localtmp_foto = $_FILES['foto']['tmp_name'];
$diretorio = 'fotos/';
$extensao = strtolower(pathinfo($diretorio . $nome_foto, PATHINFO_EXTENSION));
$upload = true;

// Solicita uma conexão, caso não consiga para a execução com o DIE
$conexao = mysqli_connect('localhost','root','root','site',8889) or die ('Problemas com a conexão!');

// Monta instrução SQL para inserir os dados do formulario no BD
$sql = "INSERT INTO Clientes Values (null,'$nome','$endereco',$cpf,'$data_nascimento','$sexo', 'fotos/" . $cpf . '.' . $extensao . "');";

// Executa a instrução SQL de inserção dos dados na Tabela Cliente
if (mysqli_query($conexao,$sql))
{
	// Verifico se a extensão da foto é diferente de JPG e PNG
	if (($extensao != 'jpg') && ($extensao != 'png'))
	{
		echo 'Tipo de arquivo não aceito... Por favor, utilize somente JPG ou PNG!';
		$upload = false;
	}

	// Verifico se é para fazer o upload
	if ($upload)
	{
		move_uploaded_file($localtmp_foto, $diretorio . $cpf . '.' . $extensao);
	}
	else
	{
		// Montando uma instrução SQL para atulizar o campo foto com
		// a imagem padrão para quem adicionou um arquivo com extensão errada.

		$sql = "UPDATE Clientes SET foto = 'fotos/no_picture.png' WHERE cpf = $cpf;";

		echo $sql;

		// executa a atualização no BD
		mysqli_query($conexao,$sql);	
	}

	header('Location: form_clientes_upload.php');
}
else
{
	echo 'Problemas com a inserção do Cliente no BD!';
}
?>