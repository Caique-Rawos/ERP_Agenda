function ajax_resposta(local, valor){
    switch(valor){
        case '0':
            Swal.fire(
            'Sucesso',
            local + ' foi cadastrado com sucesso',
            'success'
            );

            break;

        case '1':
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Preencha o '+local+'!'
            });

        break;

        case '2':
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: local + ' já cadastrado!'
            });

            break;

        case '3': 
            Swal.fire({
            icon: 'error',
            title: 'Erro ao criar ' + local,
            text: 'Entre em contato com um desenvolvedor/supervisor do sistema'
            });

        break;

        case '4': 
            Swal.fire({
            icon: 'error',
            title: 'Erro ao buscar '+local+' já existente',
            text: 'Entre em contato com um desenvolvedor/supervisor do sistema'
            });

        break;
    }
}
function busca_cli(last = 0){
    $.post( "contas_receber/ajax_busca_cli.php", {
    'last': last
    }).done(function( data ) {
    $("#cliente").html(data);
    });
}

function busca_conta(last = 0){
    $.post( "contas_receber/ajax_busca_conta.php", {
    'last': last
    }).done(function( data ) {
    $("#conta").html(data);
    });
}

$(document).ready(function() {

    busca_cli();
    busca_conta();

    //Modals....

    /*Modal Cliente*/

    $("#salva_cli").on( "click", function(event) {
    if($("#nome").val().trim() == ""){
        ajax_resposta("Cliente", "1");
    }else{
        $("#form_cli").submit();
    }
    });

    $("#form_cli").submit(function(e) {

    e.preventDefault();

    $.ajax({
        type: "post",
        url: "contas_receber/proc_cli.php",
        data: $(this).serialize(), 
        success: function(data)
        {
            ajax_resposta("Cliente", data);
            $("#fecha").click();
            busca_cli(1);
        }
    });

    $(this)[0].reset();

    });
    /*Fim Modal Cliente*/

    /*Modal Plano de conta*/
    $("#salva_conta").on( "click", function(event) {
    if($("#conta_inp").val().trim() == ""){
        ajax_resposta("Plano de Conta", "1");
    }else{
        $("#form_conta").submit();
    }
    });

    $("#form_conta").submit(function(e) {

    e.preventDefault();

    var form = $(this);

    $.ajax({
        type: "post",
        url: "contas_receber/proc_plano_conta.php",
        data: form.serialize(), 
        success: function(data)
        {
            ajax_resposta("Plano de Conta", data);
            $("#fecha2").click();
            busca_conta(1);
        }
    });

    $(this)[0].reset();

    });

    /*Fim Modal Plano de conta*/

    /*Modal Pagamento*/
    $("#salva_pagt").on( "click", function(event) {
        if($("#pagt_inp").val().trim() == ""){
            ajax_resposta("Pagamento", "1");
        }else{
            $("#form_pagt").submit();
        }
        });
    
        $("#form_pagt").submit(function(e) {
    
        e.preventDefault();
    
        var form = $(this);
    
        $.ajax({
            type: "post",
            url: "contas_receber/proc_pagt.php",
            data: form.serialize(), 
            success: function(data)
            {
                ajax_resposta("Pagamento", data);
                $("#fecha3").click();
                busca_conta(1);
            }
        });
    
        $(this)[0].reset();
    
        });
    
        /*Fim Modal Pagamento*/

  });

