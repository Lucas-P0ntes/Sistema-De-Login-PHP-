<?php 
session_start();
if($_COOKIE['usuario']){
    $_SESSION['usuario'] = $_COOKIE['usuario'];
}

if(!$_SESSION['usuario']){


    header('Location: ./login_signout_register/login/login_lucas.php');
}
if($_FILES && $_FILES['arquivo']){
    $pastauploade=__DIR__.'/../oi/';
    $nomeArquivo =$_FILES['arquivo']['name'];
    $arquivo=$pastauploade . $nomeArquivo;
    $tmp =$_FILES['arquivo']['tmp_nome'];
    if(move_uploaded_file($tmp, $arquivo)){
        echo "foi";
    }else{
        echo "não foi";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_lucas.css">
    <title>Document</title>
</head>
<body class="main">
    <div class="big_box">
    <h1> O perfil de <?= $_SESSION['usuario']?> foi autorizado</h1>
    <div class="b">
        <form action="#" method="post"
        enctype="multipart/form-data">
        <input type="file" name="arquivo" >
        <button> subimeter</button>
    </form>
</div>
    <a href="./signout/signout_lucas.php"> Sair da Sessão</a> 
    </div>
</body>
</html>
<?php 


