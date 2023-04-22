<?php
$id = isset($_GET['id']) ? $_GET['id'] : "null";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Adicionar evento</title>

    <style>
        /*Conteudo principal*/

        .main-content{
          width: 50%;
          margin: auto;
        }

        @media only screen and (max-width: 700px) {
          .main-content{
              width: 96%;
          }
          button {
            width: 70% !important;
          }
          input, select {
            width: 100% !important;
          }
          #center{
            text-align: center;
          }
        }

        /* Estilos de entrada */
        input {
            width: 70%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        select{
            width: 70%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        /* Estilos de rótulo */
        label {
            width: 20%;
            text-align: left;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            font-weight: bold;
        }

        /* Estilos de botão */
        button {
            width: 40%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>

    <script>
        
    </script>
</head>
<body>
<div class="main-content mt-4">
    <h1 class="text-center lead display-3"><?php if($id != 'null')echo 'Alterar Evento'; else echo 'Adicionar Evento'; ?></h1>

    <form action="sistema/add_edit_event/proc_eventos.php" method="post" class="mt-4">

    <div class="container">
        <div class="row" <?php if($id == 'null') echo 'style="display:none;"'; ?>>
            <div class="col-3">
                <label for="id">ID:</label>
            </div>
            <div class="col-9">
                <input type="text" value="<?php if($id != 'null') echo $id; else echo "0"; ?>" id="id" name="id" required disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="cliente">Cliente:</label>
            </div>
            <div class="col-9">
                <input type="text" id="cliente" name="cliente" required>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="data">Data:</label>
            </div>
            <div class="col-9">
                <input type="date" id="data" name="data" required>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="hora">Hora:</label>
            </div>
            <div class="col-9">
                <input type="time" id="hora" name="hora" required>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="valor">Valor:</label>
            </div>
            <div class="col-9">
                <input type="number" id="valor" name="valor" min="0" step="0.01" required>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="formaPagamento">Pagto:</label>
            </div>
            <div class="col-9">
                <select id="formaPagamento" name="formaPagamento" class="mt-4" required>
                    <option value="cartao">Cartão</option>
                    <option value="dinheiro">Dinheiro</option>
                    <option value="cheque">Cheque</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="casa">Local:</label>
            </div>
            <div class="col-9">
                <select id="casa_estudio" name="casa_estudio" class="mt-4" required>
                    <option value="0" selected>Estudio</option>
                    <option value="1">Casa</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="taxa">Taxa add:</label>
            </div>
            <div class="col-9">
                <input type="number" class="mt-3" id="taxa" name="taxa" min="0" maxLength="4" step="0.01" required><br>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
            <button type="submit" class="mt-4">Enviar</button>
            </div>
        </div>
    </div>
    </form>
</div>
</body>
</html>