<h1>Resultado Banco de Dados</h1>
<?php 
//Consultar e listar dados
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "banco";
$tab = "tab1";
$conx = new PDO("mysql:host=$host;dbname=$db", $user, $pass);	 
try {
	  $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  echo "<table><tr><td>Nome</td><td>Email</td><td>Web-Site</td><td>Sexo</td></tr>";
      foreach($conx->query('SELECT * from banco.tab1 order by nome asc') as $linha){
		
		//Escreve cada linha da tabela
		echo "<tr><td>" . $linha['nome'] . "</td><td>" . $linha['email'] . "</td><td>" . $linha['site'] . "</td><td>" . $linha['sexo'] . "</td></tr>";
		}
		echo "</table>";
}
catch (PDOException $e) 
	{
	echo "Consulta falha...<br />" . $e->getMessage();	
	}
	
 $conx = null;
 ?>

 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Resultado Banco de Dados</title>
         <link rel="stylesheet" type="text/css" href="style.css" media="all">
     </head>
     <body>
     	<br/>
     	<a href="form.html">Home</a>
     </body>
 </html>