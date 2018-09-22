<?php
    session_start();
    include "login.class.php";

    if(!empty($_SESSION['id']))
    {
        $id = $_SESSION['id'];
        $idUser = new login();
        $nomeUsuario = $idUser->getNome($id);
    }
    else
    {
        header("Location:login.php");
    }
   

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Projeto BM - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/jQuery3.3.1.js"></script>
    <script src="main.js"></script>
</head>
<body style="padding: 30px">
    <h1>Bem Vindo a Parte Interna do Sistema</h1>
    <hr/>
    <h5>Você está Logado como <?php echo $nomeUsuario['nome'] ?></h5><a href="logout.php" class="btn btn-primary btn-sm mr-2">Sair </a>
</body>
</html>