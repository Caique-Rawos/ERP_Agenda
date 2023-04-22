<!DOCTYPE html>
<html lang="pt-BR">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="contas_receber/modals.js"></script>
      <title>Contas a Receber</title>

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
        button.form {
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

  </head>
  <body>
    <?php include_once 'navbar/navbar.php';?>
    <div class="mt-4 main-content" style="max-width: 500px;">
      <form id="form_contas_recener" class="form">
          <div class="container">
            <label for="cliente">Cliente <i class="fa-solid fa-circle-exclamation fa-xs color-fa"></i></label>
            <div class="row">
              <div class="col-10" style="padding-right: 0 !important;">
                <select name="cliente" id="cliente" style="padding-left: 0 !important;">
                </select>
              </div>
              <div class="col-2" style="padding-left: 0 !important;">
                <button type="button" style="margin: 12px; width: 100%;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
              </div>
            </div>
          </div>
          <div class="container">
            <label for="conta">Plano de Conta <i class="fa-solid fa-circle-exclamation fa-xs color-fa"></i></label>
            <div class="row">
              <div class="col-10" style="padding-right: 0 !important;">
                <select name="conta" id="conta" style="padding-left: 0 !important;">
                </select>
              </div>
              <div class="col-2" style="padding-left: 0 !important;">
                <button type="button" style="margin: 12px; width: 100%;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">+</button>
              </div>
            </div>
          </div>
          <div class="container">
            <label for="pagt">Pagamento <i class="fa-solid fa-circle-exclamation fa-xs color-fa"></i></label>
            <div class="row">
              <div class="col-10" style="padding-right: 0 !important;">
                <select name="pagt" id="pagt" style="padding-left: 0 !important;">
                </select>
              </div>
              <div class="col-2" style="padding-left: 0 !important;">
                <button type="button" style="margin: 12px; width: 100%;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">+</button>
              </div>
            </div>
          </div>
      </form>
    </div>

    <!--Modals-->

    <!--Modal new cli-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="$('#form_cli')[0].reset();"></button>
          </div>
          <div class="modal-body">
            <form class="form" id="form_cli">
                <label for="nome">Nome <i class="fa-solid fa-circle-exclamation fa-xs color-fa"></i></label><br>
                <input type="text" name="nome" id="nome"><br>

                <label for="cpf" class="mt-3">CPF/CNPJ</label><br>
                <input type="text" name="cpf" id="cpf"><br>

                <label for="tel" class="mt-3">Telefone</label><br>
                <input type="text" name="tel" id="tel"><br>

                <label for="nasc" class="mt-3">Data de Nascimento</label><br>
                <input type="date" name="nasc" id="nasc"><br>

                <label for="end" class="mt-3">Endereço</label><br>
                <input type="text" name="end" id="end"><br>

                <label for="obs" class="mt-3">Observação</label><br>
                <input type="text" name="obs" id="obs"><br>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="fecha" onclick="$('#form_cli')[0].reset();">Cancelar</button>
            <button type="button" class="btn btn-primary" id="salva_cli">Salvar</button>
          </div>
        </div>
      </div>
    </div>
    <!--fim Modal new cli-->

    <!--Modal Plano de conta-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Novo Plano de Conta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="$('#form_conta')[0].reset();"></button>
          </div>
          <div class="modal-body">
            <form class="form" id="form_conta">
                <label for="conta_inp">Plano de Conta <i class="fa-solid fa-circle-exclamation fa-xs color-fa"></i></label><br>
                <input type="text" name="conta_inp" id="conta_inp"><br>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="fecha2" onclick="$('#form_conta')[0].reset();">Cancelar</button>
            <button type="button" class="btn btn-primary" id="salva_conta">Salvar</button>
          </div>
        </div>
      </div>
    </div>
    <!--fim Modal Plano de conta-->

    <!--Modal Pagamento-->
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel3">Cadastrar Novo Pagamento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="$('#pagt_inp')[0].reset();"></button>
          </div>
          <div class="modal-body">
            <form class="form" id="form_pagt">
                <label for="pagt_inp">Pagamento <i class="fa-solid fa-circle-exclamation fa-xs color-fa"></i></label><br>
                <input type="text" name="pagt_inp" id="pagt_inp"><br>

                <label for="taxa" class="mt-3">Taxa</label><br>
                <input type="number" name="taxa" id="taxa"><br>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="fecha3" onclick="$('#pagt_inp')[0].reset();">Cancelar</button>
            <button type="button" class="btn btn-primary" id="salva_pagt">Salvar</button>
          </div>
        </div>
      </div>
    </div>
    <!--fim Modal Plano de conta-->

    <!--fim Modals-->
  </body>
</html>