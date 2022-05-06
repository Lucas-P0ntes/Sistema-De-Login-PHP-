<?php 
session_start();

if(count($_POST)>0){
    $erro=[];
    if(!filter_input(INPUT_POST,"nome")){
        $erro['nome']= "Nome é obrigatório";
    }
    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $erro['email']= "Email é obrigatório";
    }   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles_lucas.css" /> 
    
    <title>Document</title>
</head>
    <body class="tmain">
        <div class="box">

        
                <img src="https://preview.redd.it/tpxvny1fbdv61.png?auto=webp&s=2c624ad00989dc058a34d62a8730061d43a05df4" alt="Uma foto de login" class="img">
                <p class="tex"> Cadastro:</p>
                <?php  if($erro):?>
                    <div class="erros">
                        <?php foreach($erro as $err ):?>
                                <p><?=$err?><p>
                        <?php endforeach?>
               
                    </div>   
                <?php endif?>
                <!-- Formulario de cadastro -->
            <form action="#" method="post" class="form"> 
                <!-- input de Nome -->
            <div class="input1">
                    <label for="nome">Nome:</label>
                    <input type="nome" name="nome" id="nome"  min="8" max="64"  >
                </div>   
                <!-- input de email/login -->
                <div class="input1">
                    <label for="email">E-mail :</label>
                    <input type="email" name="email" id="email"  min="8" max="64"  >
                </div>
                <!-- input de senha -->
                <div class="input1">
                    <label for="senha">Senha :</label>
                    <input type="password" name="senha" id="senha"  minlength="8" maxlength="64">
                </div>  
                <div class="bnt">
                    <button>Enviar</button> 
                </div>
            </form>  
                <p>Já tenho conta.<a href="./../../login_signout_register/login/login_lucas.php" > Fazer login.<a></p>
        </div>
    </body>
</html>
<?php
if($_SESSION['usuario']){
    header('Location: ./../../index_lucas.php');
}