<!-- Chama a biblioteca jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<script type = "text/javascript">
jQuery(document).ready(function(){
var param = 10;
    jQuery.ajax({
        url: 'teste2.php',
        ascyn: false,
        data:{
            'param': param
        },
        type: 'POST',
        dataType: 'html',
        success: function (data){
        /*Recebe os dados*/
        var dados = [];
        var produtos = [];
        dados.push(JSON.parse(data));
        /* Carrega os dados da tabela */
        dados.forEach((elem) => {
            for(i = 0; i <= (elem.length-1); i++){
                produtos.push(`
                    <tr>
                        <td>${elem[i].idprod}</td>
                        <td>${elem[i].nome}</td>
                        <td>${elem[i].cor}</td>
                        <td>${elem[i].preco}</td>
                    </tr>
                `);
            }
        });    
        /* Tabela */
        tabela.innerHTML = [`
            <table class='table table-dark'>
            <thead>
                <tr>
                <th scope='col'>ID Produto</th>
                <th scope='col'>Cor</th>
                <th scope='col'>Nome</th>
                <th scope='col'>Preço</th>
                </tr>
            </thead>
            <tbody>
            ${produtos.join('')}
            </tbody>
            </table>
        `];
    }
});
});
</script>
<div id = "tabela"></div>
