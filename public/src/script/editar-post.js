$(document).ready(()=>{
    //tira co conteudo e coloca um textarea para mudar o poste, esconde o botão de editar e mostra o de enviar
    $("#btn-editar-postagem").on('click',()=>{
        let conteudo = $('.conteudo').html();
        let titulo = $('.titulo').html();
        conteudo = conteudo.trim();
        titulo = titulo.trim();
        let textarea = document.createElement('textarea');
        let input = document.createElement('input');

        //estilizando o textarea
        $(textarea).html(conteudo);
        $(textarea).addClass('form-control')
        $(textarea).addClass('bg-dark')
        $(textarea).addClass('pt-4')
        $(textarea).addClass('text-light')
        $(textarea).addClass('p-4')
        $(textarea).addClass('h-50')
        $(textarea).attr('id','conteudo');
        $(textarea).attr('minlength','5');

        //estilizando input
        $(input).val(titulo);
        $(input).addClass('form-control')
        $(input).addClass('bg-dark')
        $(input).addClass('text-light')
        $(input).addClass('my-4')
        $(input).attr('id','titulo');
        $(input).attr('minlength','5');
        
        //escondendo titulo e postagem atual
        $('.conteudo').addClass('d-none');
        $('.titulo').addClass('d-none');
        //trocando a visualização dos buttoes
        $("#btn-editar-postagem").addClass('d-none');
        $("#btn-enviar-postagem").addClass('d-block');
        //inserindo novos elementos para editar o poste
        $('.titulo').after(textarea);
        $('.container-postagem').prepend(input);
    });


    //Ao confirmar a edição
    $('#btn-enviar-postagem').on('click',()=>{
        //recupera os novos valores e enviam para o backend realizar a atualização 
        let conteudo = $('#conteudo').val();
        let titulo = $("#titulo").val();
        let url = $("#btn-enviar-postagem").attr('name');
        $.ajax({
            type:"put",
            data:`conteudo=${conteudo}&&titulo=${titulo}`,
            url:url,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:(e)=>{
                //remove os campos utilizados para a edição e mostra os campos referentes ao poste que estava escondido ja com os novos valores
                $("#conteudo").remove();
                $("#titulo").remove();
                $('.conteudo').html(conteudo);
                $('.conteudo').removeClass('d-none');
                $('.titulo').html(titulo);
                $('.titulo').removeClass('d-none');
                $("#btn-editar-postagem").removeClass('d-none');
                $("#btn-enviar-postagem").removeClass('d-block');
            },
            error: (e)=>{
                console.log(e)
            }
        })
    })
});