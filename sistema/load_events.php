<?php
session_start();
$data = isset($_POST['data']) ? $_POST['data'] : 'null';

$count = 0;
$table = '

<div class="container">
  <div class="row">
    <div class="col-2 border">
      Cliente
    </div>
    <div class="col-3 border">
      Descrição
    </div>
    <div class="col-2 border">
      Valor
    </div>
    <div class="col-3 border">
      Pagamento
    </div>
    <div class="col-2 border">
      Local
    </div>
  </div>


';
if($data != 'null'){
    if(isset($_SESSION['events'])){

        foreach($_SESSION['events'] as $id => $event) {
            if($_SESSION['events'][$id]["data"] == $data){
                $table .= '
                
                  <a class="hide_link" href="index.php?r=add_edit_event&id='.$id.'">
                    <div class="row">
                        <div class="col-2 border">
                        '.$_SESSION['events'][$id]["cliente"].'
                        </div>
                        <div class="col-3 border">
                        '.$_SESSION['events'][$id]['observacao'].'
                        </div>
                        <div class="col-2 border">
                        '.$_SESSION['events'][$id]['valor'].'
                        </div>
                        <div class="col-3 border">
                        '.$_SESSION['events'][$id]['pagamento'].'
                        </div>
                        <div class="col-2 border">
                        '.$_SESSION['events'][$id]['casa_estudio'].'
                        </div>
                    </div>
                  </a>
                
                ';

                $count = 1;
            }
        }
      }

      if($count == 0){
        $table = '
        
        <div class="row">
            <span class="text-center">Nenhum Evento Encontrado</span>
        </div>

        ';
      }

      $table .= "</div>";

      echo $table;
}else{ 
    echo '
      <div class="row">
        <span class="text-center">ERRO: ("Nenhuma Data Informada"), tente novamente</span>
      </div>
    ';
}
?>