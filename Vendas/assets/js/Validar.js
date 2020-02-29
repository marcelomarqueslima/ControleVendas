function Validar(tela) {

    var ret = true;


    switch (tela) {

        case 1:

            if ($("#usuario").val().trim() == '') {
                ret = false;
                $("#val_email").show();
                $("#val_email").html("* Preencher o campo e-mail!");
            } else
            {
                $("#val_email").hide();
            }
            if ($("#senha").val().trim() == '') {
                ret = false;
                $("#val_senha").show();
                $("#val_senha").html("* Preencher o campo senha");
            } else
            {
                $("#val_senha").hide();
            }
            break;

        case 2:

            if ($("#modelo").val().trim() == '') {
                ret = false;
                $("#val_modelo").show();
                $("#val_modelo").html("* Selecione o modelo!");
            } else {
                $("#val_modelo").hide();
            }
            break;

        case 3:

            if ($("#cliente").val().trim() == '') {
                ret = false;
                $("#val_cliente").show();
                $("#val_cliente").html("* Preencher o cliente!");
            } else {
                $("#val_cliente").hide();
            }
            if ($("#email").val().trim() == '') {
                ret = false;
                $("#val_email").show();
                $("#val_email").html("* Preencher o e-mail!");
            } else {
                $("#val_email").hide();
            }
            if ($("#telefone").val().trim() == '') {
                ret = false;
                $("#val_telefone").show();
                $("#val_telefone").html("* Preencher o telefone!");
            } else {
                $("#val_telefone").hide();
            }
            if ($("#endereco").val().trim() == '') {
                ret = false;
                $("#val_endereco").show();
                $("#val_endereco").html("* Preencher o endereço!");
            } else {
                $("#val_endereco").hide();
            }
            break;
        case 4:
            if ($("#cliente").val().trim() == '') {
                ret = false;
                $("#val_cliente").show();
                $("#val_cliente").html("* Selecionar o cliente!");
            }
            if ($("#formapgto").val().trim() == '') {
                ret = false;
                $("#val_formapgto").show();
                $("#val_formapgto").html("* Preencher a forma de pagamento!");
            }
            if ($("#descricao").val().trim() == '') {
                ret = false;
                $("#val_observacao").show();
                $("#val_observacao").html("* Preencher a observação!");
            }
            break;
        case 5:
            if ($("#dtinicial").val().trim() == '') {
                ret = false;
                $("#val_dtinicial").show();
                $("#val_dtinicial").html("* Preencher data inicial!");
            } else {
                $("#val_dtinicial").hide();
            }

            if ($("#dtfinal").val().trim() == '') {
                ret = false;
               $("#val_dtfinal").show();
                $("#val_dtfinal").html("* Preencher data final!");
            } else {
                $("#val_dtfinal").hide();
            }
            
            break;
           
    }

    return ret;
}
