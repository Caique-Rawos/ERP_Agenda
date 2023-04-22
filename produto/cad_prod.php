<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Produto/Serviço</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        /* display: flex; */
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      .form {
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 5px 0px #ccc;
        width: 400px;
      }
      .form input,
      .form select {
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 16px;
      }
      .form button {
        width: 100%;
        background-color: #4CAF50;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
      }

      .color-fa{
        color: #ff9800;
      }
    </style>

    <script>

      function verifica(){
        let erro = '';
        if($("#tipo").val() == ''){
          erro += 'Tipo, ';
        }if($("#referencia").val() == ''){
          erro += 'Referencia, ';
        }if($("#descricao").val() == ''){
          erro += 'Descrição, ';
        }if($("#custo").val() == ''){
          erro += 'Custo, ';
        }if($("#preco1").val() == ''){
          erro += 'Venda 1, ';
        }if($("#estoque").val() == '' && $("#sem_estoque").val() == '0'){
          erro += 'Estoque, ';
        }
        erro += '.';
        if(erro != '.'){
          erro = erro.replace(', .', '');

          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Preencha os campos: ' + erro
          })
        }else{
          var form = $('#form');
          var formData = form.serialize();

          $.ajax({
            type: 'POST',
            url: 'produto/proc_cad_prod.php',
            data: formData,
            headers: {
              'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(response) {

              switch (response) {
                case '0': 
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Preencha a Referencia e a Descrição corretamente!'
                  });
                  break;

                case '1': 
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Referencia já existente!'
                  });
                  break;

                case '2':
                  Swal.fire({
                    icon: 'error',
                    title: 'Erro ao criar novo produto',
                    text: 'Entre em contato com um desenvolvedor/supervisor do sistema'
                  });
                  break;

                case '3':
                  Swal.fire({
                    icon: 'error',
                    title: 'Erro ao buscar referencia',
                    text: 'Entre em contato com um desenvolvedor/supervisor do sistema'
                  });
                  break;
                  
                case '4':
                  Swal.fire(
                    'Sucesso',
                    'Produto/Serviço foi cadastrado com sucesso',
                    'success'
                  );
                  $('#limpaForm').trigger('click');
                break;
              }

            }

          });
          
        }
      }

      $( document ).ready(function() {
        let check = $("#sem_estoque");
        if(check.checked){ $('#estoque').attr('disabled','disabled'); $("#sem_estoque").val('1'); $('#estoque').val('');}else{$('#estoque').removeAttr('disabled'); $("#sem_estoque").val('0');}
      });
    </script>
</head>
<body>

<?php include_once 'navbar/navbar.php';?>
<div class="form mt-4 main-content" style="max-width: 500px;">
      <form id="form" method="POST">
        <label for="tipo">Tipo: <i class="fa-solid fa-circle-exclamation fa-xs color-fa"></i></label>
        <select id="tipo" name="tipo" required>
        <option value="1">Serviço</option>
        <option value="2">Produto</option>
        </select>
        <label for="referencia">Referência: <i class="fa-solid fa-circle-exclamation fa-xs color-fa"></i></label>
        <input type="text" id="referencia" name="referencia" required maxlength="200" oninput="this.value = this.value.toUpperCase();">
        <label for="descricao">Descrição: <i class="fa-solid fa-circle-exclamation fa-xs color-fa"></i></label>
        <input type="text" id="descricao" name="descricao" required maxlength="30">
        <label for="custo">Custo: <i class="fa-solid fa-circle-exclamation fa-xs color-fa"></i></label>
        <input type="number" id="custo" name="custo" step="0.01" required onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
        <label for="preco1">Preço de Venda 1: <i class="fa-solid fa-circle-exclamation fa-xs color-fa"></i></label>
        <input type="number" id="preco1" name="preco1" step="0.01" required onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
        <label for="preco2">Preço de Venda 2:</label>
        <input type="number" id="preco2" name="preco2" step="0.01" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">

        <div class="container">
          <div class="row">
            <div class="col-3">
            <label for="estoque" class="mt-1">Estoque: <i class="fa-solid fa-circle-exclamation fa-xs color-fa"></i></label>
            </div>
            <div class="col">
              <table>
                <tr><td><input type="checkbox" value="0" name="sem_estoque" id="sem_estoque" onchange="if(this.checked){ $('#estoque').attr('disabled','disabled'); this.value='1'; $('#estoque').val('');}else{$('#estoque').removeAttr('disabled'); this.value='0';}"></td>
                <td><label for="sem_estoque">&nbsp;Vender sem estoque</label></td></tr>
              </table>
            </div>
          </div>
        </div>

        <input type="number" id="estoque" name="estoque" onkeypress="return event.charCode >= 48 && event.charCode <= 57" oninput="this.value = this.value.toUpperCase().replace('E', '');">


        <input type="button" class="mt-3" value="Cadastrar" style="background-color: #00FF00; color: white;" onclick="verifica();">
        <input type="reset" id='limpaForm' class="mt-3" value="Limpar" style="background-color: red; color: white;" onclick="$('#estoque').removeAttr('disabled');">
      </form>
    </div>
</body>

</html>