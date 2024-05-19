<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style_login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="main">
    <div class="alerta alert alert-success alert-dismissible">
  <button type="button" class="btn-close botao_criado" data-bs-dismiss="alert"></button>
  <strong>Sucesso!</strong> O usuário foi cadastrado
</div>
        <div class="form">
            <div class="texto_form">
                <section class="bg-gray-50">
                    <div class="flex flex-col items-center justify-center">
                        <div class="w-full bg-white rounded-lg shadow">
                            <div class=" form_php teste p-6 space-y-4 md:space-y-6 sm:p-8">
                                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                                    Login
                                </h1>
                                <form method ="POST" class=" form_php space-y-4 md:space-y-6" action="./php/infos.php" data-parsley-validate>
                                    <div>
                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Usuário</label>
                                        <input name="usuario" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  required="">
                                    </div>
                                    <div>
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Senha</label>
                                        <input type="password" name="senha" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <a href="#" class="text-sm font-medium text-primary-600 hover:underline">Esqueceu a senha?</a>
                                    </div>
                                    <button name = "submit" type="submit" class="botao">Entrar</button>
                                    <p class="text-sm font-light text-gray-500">
                                        Não tem conta ainda? <a href="criar.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Criar</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                  </section>
            </div>
            <div class="img">
                
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="../node_modules/parsleyjs/dist/i18n">
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/parsleyjs/dist/parsley.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>