

<?php
    include "login.class.php";
    session_start();

   
    $login = new login();

    if(isset($_POST['email']) && !empty($_POST['email']))
    {
        $email = addslashes(strtolower($_POST['email']));
        $senha = addslashes(md5($_POST['password']));

       $dados =  $login->logar($email,$senha);
        
        if($dados!=false)
        {

            $_SESSION['id'] = $dados['id'];
            header("Location: index.php");
        }
        else
        {
            echo "<script>alert('Usuário e/ou Senha Incorreto(s)')</script>";
        }
    }
   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Projeto BM - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/jQuery3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
    <script src="assets/js/main.js"></script>
</head>
<body>
    <div class="container-login">
        <div class="d-flex justify-content-between align-items-center space-between" style=" padding:20px; width:600px;background-color: rgba(255,255,255,.4);">
            <div class="logo">
                <h1>Projeto BM</h1>
            </div>
            
            <div class="form-area">
                <form method="POST" class="form-horizontal">
                    
                    <div class="form-group row"> 
                        <div class="input-group mb-2 mr-sm-2 border-success">
                            <div class="input-group-prepend">
                                <div class="input-group-image"><img src="assets/img/user.png" width="30" heigth="30" class="mr-2"/></div>
                            </div>
                            <input type="email" name="email" class="form-control rounded border-success" placeholder="Email">
                            
                        </div>                  
                    </div>

                    <div class="form-group row"> 
                        <div class="input-group mb-2 mr-sm-2 border-success">
                            <div class="input-group-prepend">
                                <div class="input-group-image"><img src="assets/img/lock.png" width="30" heigth="30" class="mr-2"/></div>
                            </div>
                            <input type="password" name="password" class="form-control rounded border-success" placeholder="Senha">
                            
                        </div>                  
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-block btn-lg"> Entrar </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>