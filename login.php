<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login - Agendador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-secondary">

    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div style="background-color: aliceblue;" class="col-10 col sm-8 col-md-6 col-lg-4 p-4 bg-whithe shadow rounded">
                <div class="row justify-content-center mb-4">
                    <img src="img/logo_agendador.png" alt="agendador" class="mb-4">
                    <form class="needs-validation" novalidate action="index.php" method="post">
                        <div class="form-group">
                            <label class="form-label" for="loginUser">Login</label>
                            <div class="input-group mb-4">
                                <span class="input-group-text">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input required class="form-control" type="text" name="loginUser" id="loginUser">
                                <div class="invalid-feedback">
                                    Informe o Login
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="senhaUser" class="form-label">Senha</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-key-fill"></i>
                                    </span>
                                    <input required class="form-control" type="password" name="senhaUser" id="senhaUser">
                                    <div class="invalid-feedback">
                                    Informe a Senha
                                </div>
                                </div>
                            </div>
                            
                            <button class="btn btn-success w-100"><i class="bi bi-box-arrow-in-right"></i> Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="./js/validation.js"></script>
</body>
</html>