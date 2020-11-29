 $(document).ready(function(){
    $(document).on('click','.pagination a',function(e){
        let aba = $(this).closest('.aba').attr('id'); //qual coleção de items o pagination foi ativado
        $("#area-"+aba).html('<div class="d-flex w-100 justify-content-center align-items-center"><img src="https://astelbg.com/wp-content/uploads/2019/10/loading.gif" style="max-width:200px;height:auto;"></div>');
        getData($(this).attr('href').split('page=')[1],aba);
        e.preventDefault();
    });
   });
//recupera a nova os dados da nova paginação no DB
function getData(page,aba){
    $.ajax({
        url: `?page=${page}&&aba=${aba}`,
        dataType: 'json'
    }).done(function(data){
    let links = JSON.stringify(data.links);
    let dados = JSON.stringify(data.data);
    putNewContent(aba,dados,links);
    }).fail(function(data){
    console.log(data)

    });
}
//coloca o novo conteudo na tela

function putNewContent(aba,dados,links){
    //let t = $('#'+tabela + ' table');
    $.ajax({
        type: 'POST',
        url:'/components/'+aba,
        data:{
            'dados':dados,
            'links': links
        },
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function(data){
        $("#area-"+aba).html(data);
    }).fail(function(data){
        console.log(data)
    })
}