<?php
unset($_SESSION['events']);

$stmt = $conn->prepare("SELECT even.id_eventos, even.observacao, even.valor, pg.descricao, cli.nome, even.horario, 
CASE 
    WHEN casa_estudio = 0 THEN 'estudio'
    WHEN casa_estudio = 1 THEN 'casa cli'
    ELSE 'não definido'
END as casa_estudio, even.taxa_adicional FROM erp_data_eventos even
LEFT JOIN erp_clientes cli on even.cliente = cli.id_cliente
LEFT JOIN erp_forma_pgto pg on even.forma_pagto = pg.id_forma_pgto
ORDER BY even.horario asc;");

$stmt->execute();
$events = $stmt->fetchAll();

if(count($events) > 0)
foreach($events as $dados){
  $data_hora = new DateTime($dados['horario']);

  $id_event = $dados['id_eventos'];

  $_SESSION['events'][$id_event]['data'] = $data_hora->format('Y-m-d');
  $_SESSION['events'][$id_event]['hora'] = $data_hora->format('H:i:s');;
  $_SESSION['events'][$id_event]['cliente'] = $dados['nome'];
  $_SESSION['events'][$id_event]['observacao'] = $dados['observacao'];
  $_SESSION['events'][$id_event]['pagamento'] = $dados['descricao'];
  $_SESSION['events'][$id_event]['valor'] = $dados['valor'];
  $_SESSION['events'][$id_event]['casa_estudio'] = $dados['casa_estudio'];
  $_SESSION['events'][$id_event]['taxa_adicional'] = $dados['taxa_adicional'];
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>


    <title>Sistema</title>

    <style>
        body{
            background-color: white;
        }

        a.hide_link{
          text-decoration: none;
          color: black;
        }


    </style>

    <script>

    $( document ).ready(function() {
        // $(".parent").click(function() {
        // $(this).find(".child").toggle();
        // });

        /*Calendario*/

        $('#calendar').fullCalendar({
          events: [
            <?php if(isset($_SESSION['events'])){
              $data_atual = date("Y-m-d");

              foreach($_SESSION['events'] as $id => $event) {
                    echo "
                  {
                    title: '".$_SESSION['events'][$id]['observacao']."',
                    start: '".$_SESSION['events'][$id]['data']."'
                    ";
                    
                    if(new DateTime($_SESSION['events'][$id]['data']) < new DateTime($data_atual))
                      echo ", color: '#ff0000' ";
                      echo "
                  },";

              }
            }
            
              ?>
              
          ],eventClick: function(event, jsEvent, view) {
                eventoClick(event.start, jsEvent, view);
            },
            dayClick: function(date, jsEvent, view) {
              eventoClick(date, jsEvent, view);
            }
        });

    });

    function eventoClick(date, jsEvent, view) {
      $("#info").show();
          var data = date.format().split("-",3);
          $("#data").html(data[2] + "/" + data[1] + "/" + data[0]);

          lista_events(date.format());
        }

    function lista_events(date){
      $.ajax({
          type: "POST",
          url: "sistema/load_events.php",
          data: { data: date },
          success: function(response) {
              $("#table_events").html(response);
          }
      });
    }

    </script>

</head>
<body>

<?php include_once 'navbar/navbar.php';?>

  <div class="main-content mt-4">

    <div id="calendar"></div>

    <div id="info" style="display:none" class="mt-4">

      <div class="container">
        <div class="row">
          <div class="col-8">
            <label class="fs-5">Eventos:</label> 
          </div>
          <div class="col-4">
            <span id="data" name="data" class="fs-5">data</span>
          </div>
        </div>
      </div>

      <div id="table_events" name="table_events" class="mt-4">

      </div>

    </div>

  </div>
</body>

</html>