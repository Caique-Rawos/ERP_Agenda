<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

        .grid-container {
            display: grid;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .grid-item {
            width: 400px;
            height: 650px;
            background-color: white;
            border: 1px solid gray;
            padding: 20px;
        }

        #container {
            width: 400px;
            height: 650px;
            background-color: #ccc;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 10px black;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="email"],
        input[type="text"],
        input[type="password"] {
            margin-top: 10px;
            padding: 10px;
            width: 300px;
        }

        #senha_gerente, #email_gerente{
            width: 160px;
        }

    </style>

    <title>Login</title>
</head>
<body class="bg-secondary bg-gradient">
<div class="grid-container">
  <div class="grid-item login-form">
    <div id="container">
    <h1>Criar Usuário</h1>
    <span class="text-danger text-center <?php if(isset($_GET['err'])){ echo " mt-3 \" >permissão para alteração negada"; }else{echo " \">";}?></span>
    <form class="mt-4" action="criar_login/proc_criar_user.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br>
        <a href="index.php?r=criar_login.php"></a>
        <a href="index.php">Login</a>
        <br>
        <input type="submit" class="btn btn-secondary" value="Entrar">
        <br>
        <div class="container">
        <div class="row">
            <div class="col">
            <label for="email_gerente">Email Gerente:</label><br>
            <input type="email" id="email_gerente" name="email_gerente" required>
            </div>
            <div class="col">
            <label for="email_gerente">Senha Gerente:</label><br>
            <input type="password" id="senha_gerente" name="senha_gerente" required>
            </div>
        </div>
    </div>
    </form>
    </div>
  </div>
</div>

</body>
</html>