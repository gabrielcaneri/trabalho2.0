<h1>Cadastro realizado</h1>
<?php 

$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "banco";
$tab = "tab1";
$conx = new PDO("mysql:host=$host;dbname=$db", $user, $pass);	

// 4 COLUNAS: nome, email, site, sexo

try {
    // Conexão com o servidor
    
    //$conx = new PDO("mysql:host=$host", $user, $pass); 
    $conx = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  
    // Define o modo de erro PDO para exceção:
    $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criação do banco de dados
    
    $criadb = "CREATE DATABASE IF NOT EXISTS $db";
    
    $conx->exec($criadb);
    echo "Database ok!<br>";
    }
catch(PDOException $e)
    {
    echo $criadb . "Falha na criação do DB:<br>" . $e->getMessage();
    }

    
// Criação da tabela

try {
    $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    $criatab = "CREATE TABLE IF NOT EXISTS $db.$tab (
        nome VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        site VARCHAR(50) NOT NULL,
        sexo VARCHAR(10) NOT NULL
        )";
    
    $conx->exec($criatab);
    echo "Tabela ok!<br>";
} 
catch(PDOException $e)
    {
    echo $criatab . "Falha na criação da Tabela:<br>" . $e->getMessage();
    }
    
// Inclusão de dados na tabela
try {
    $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
    
	$nome  = $_POST ["nome"];  //atribuição do campo "nome" vindo do formulário para variavel  
    $email  = $_POST ["email"]; //atribuição do campo "email" vindo do formulário para variavel
    $site    = $_POST ["site"];   //atribuição do campo "site" vindo do formulário para variavel
    $sexo    = $_POST ["sexo"];  //atribuição do campo "sexo" vindo do formulário para variavel
    $incl = "INSERT INTO $tab (nome, email, site, sexo)
	VALUES ('$nome', '$email', '$site', '$sexo')";
    //Verifica se o campo nome não está em branco.
    echo !empty($nome) ? "Nome: {$nome}<br/>" : "Favor digitar seu nome<br/>";

    //Verifica se o campo email não está em branco.
    echo (!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL)) ? "Email: {$email}<br/>" : "Favor digitar seu email ou um email válido<br/>";

    //Verifica se o campo site não está em branco.
    echo (!empty($site) and filter_var($site, FILTER_VALIDATE_URL)) ? "Web-site: {$site}<br/>" : "Favor digitar um web-site válido <br/> ";

    $conx->exec($incl);
    echo "Registro incluido com sucesso!<br />";
    }
catch(PDOException $e)
    {
    echo $incl . "<br>" . $e->getMessage();
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <br/>
        <a href="form.html">Home</a>
        <a href="listagem.php">Listar Banco de Dados</a>
    </body>
</html>