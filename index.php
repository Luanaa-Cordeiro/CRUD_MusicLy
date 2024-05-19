<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="./node_modules/parsleyjs/src/parsley.css">
    <link rel="stylesheet" href="./css/style_login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<form method ="POST" class=" form_php space-y-4 md:space-y-6" action="./login/php/infos.php" data-parsley-validate>
<div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="row border rounded-5 bg-white shadow box-area">

    <?php 
        if(isset($_GET['success'])) {
            echo '<div class="alerta alert alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Sucesso!</strong> O usuário foi cadastrado
            </div>
            ';
        } elseif(isset($_GET['incorreto'])){
            echo '<div class="alerta alert alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Tente novamente!</strong> Usuário ou senha incorretos
            </div>
            ';
        }
    ?> 
    <div class="col-md-6 right-box">
        <div class="row align-items-center">
                <div class="header-text mb-1 ">
                    <h2>Entre no Musicly</h2>
                    <p>Faça seu login!</p>
                </div>
                <div class=" mb-4 d-flex flex-column">
                    <label for="usuario" class="mb-2 fs-6 fw-medium text-gray-900">Usuário</label>
                    <input name="usuario" id="usuario" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Usuário"  required>

                </div>
                <div class="mb-4 d-flex flex-column">
                    <label for="senha" class="mb-2 fs-6 fw-medium text-gray-900">Senha</label>
                    <input name="senha" id="password" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Senha" style="width: 300px; @media only screen and (max-width: 768px){width: 100px}" required>
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck" onclick="show()">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Exibir senha</small></label>
                        <small><a href="#" class="forgot_senha">Esqueceu a senha?</a></small>
                    </div>

                </div>
                <div class="mb-4">
                    <button class="btn btn-lg fs-6 botao" id="botao">Entrar</button>
                </div>

                
                <div class="input-group mb-4">
                    <button class="btn btn-lg btn-light fs-6" style="width: 300px;" ><img src="./assets/pesquisa.png" style="width:20px" class="me-2"><small>Inscreva-se com o google</small></button>
                </div>
                <div class="row">
                    <small>Não tem uma conta? <a href="./login/criar.php">Criar</a></small>
                </div>
        </div>
    </div> 

    <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
        <div class="featured-image mb-3 img">
        <img src="./assets/MusicLy.png" class="img-fluid image" style="width: 800px;">
        </div>
    </div> 
    
    </div>
    </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
    let isenha, usuario, senha, botao;


function show() {
    isenha= document.getElementById("password");
    if(isenha.type === "password") {
        isenha.type = "text";
        
    } else {
        isenha.type = "password";
        
    } 
}
</script>

<script src="./node_modules/jquery/dist/jquery.js"></script>
<script src="./node_modules/parsleyjs/dist/parsley.min.js"></script>
<script src="./node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
    
</body>
</html>