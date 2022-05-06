<?php 
session_start();

$email =$_POST['email'];
$senha = $_POST['senha'];

if($_POST['email']){
    $usuarios = [
        [
            "nome"=>"Lucas",
            "email"=>"Lucas@l",
            "senha"=>"Lucas",

        ],
        [
            "nome"=>"Lucas",
            "email"=>"Lucas@l",
            "senha"=>"lucas",

        ],
    ];
    foreach($usuarios as $usuario){
        $emailValido = $email===$usuario['email'];
        $senhaValida = $senha === $usuario['senha'];

        if($emailValido && $senhaValida){
            $_SESSION['erros'] = null;
            $_SESSION['usuario'] = $usuario['nome'];
            $tempo = time()+60*60*24*30;
            setcookie('usuario',$usuario['nome'], $tempo);
            header('Location: ././index_lucas.php');
        }         
    }
   if(!$_SESSION['usuario']){
       $_SESSION['erros'] = ["Error: Seu usuário ou senha estar incorreto."];
   }
}
?>
<!-- Começo do HTML  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style_lucas.css" />  
    <title>Login</title>
</head>
<body class="tmain">
    <div class="box">
        <img src="https://preview.redd.it/tpxvny1fbdv61.png?auto=webp&s=2c624ad00989dc058a34d62a8730061d43a05df4" alt="Uma foto de login" class="img">
        <p class="tex"> Login</p>
        <form action="#" method="post" class="form">
<!-- //////////////////// Mensagem de exibição de erros do formulario /////////////// -->
        <?php  if($_SESSION['erros']):?>
            <div class="erros">
                <?php foreach($_SESSION['erros'] as $erro ):?>
                    <p><?=$erro?><p>
                <?php endforeach?>
            </div>   
        <?php endif?>
<!-- /////////////////////////////////////////////////////////////////-->
            <div class="input1">
                <label for="email">E-mail :</label>
                <input type="email" name="email" id="email"  min="5" max="31"  >
            </div>
            <div class="input1">
                <label for="senha">Senha :</label>
                <input type="password" name="senha" id="senha"  minlength="5" maxlength="30">
            </div>  
                <div class="bnt">
                    <button>Entrar</button> 
                </div>
               
                
        </form>  
        <p>Criar conta: <a href="./../../login_signout_register/register/register_lucas.php" >Cadastrar</a> </p>
    </div>
</body>
</html>
<?php
if($_SESSION['usuario']){
    header('Location: ./../index_lucas.php');
}