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
            height: 450px;
            background-color: white;
            border: 1px solid gray;
            padding: 20px;
        }

        #container {
            width: 400px;
            height: 450px;
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
        input[type="password"] {
            margin-top: 10px;
            padding: 10px;
            width: 300px;
        }

    </style>

    <title>Login</title>
</head>
<body class="bg-secondary bg-gradient">
<div class="grid-container">
  <div class="grid-item login-form">
    <div id="container">
    <h1>Login</h1>
    <span class="text-danger <?php if(isset($_GET['err'])){ echo " mt-3 \" >E-mail ou Senha incorreta tente novamente"; }else{echo " \">";}?></span>
    <form class="mt-4" action="login/login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br>
        <a href="index.php?r=criar_login">Criar conta</a>
        <br>
        <input type="submit" class="btn btn-secondary" value="Entrar">
    </form>
    </div>
  </div>
</div>

</body>
</html>