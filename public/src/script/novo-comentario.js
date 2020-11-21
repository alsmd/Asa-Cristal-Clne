$(document).ready(()=>{
    $('#enviar-comentario').on('click',()=>{
        let conteudo = $("#novo-comentario").val();
        conteudo = conteudo.trim();
        let url = $("#novo-comentario").attr('name');
        console.log(url);
        $.ajax({
            type:"post",
            data:`conteudo=${conteudo}`,
            url:url,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:(e)=>{
                console.log(e)
                //montando o comentario com as informações do novo comentario inserido no DB
               let comentario_modelo = (new DOMParser()).parseFromString($("#comentario-modelo").html(),'text/html');
               $(comentario_modelo).find('.nome').html(e.nome);
               $(comentario_modelo).find('.foto').attr('src',e.foto);
               $(comentario_modelo).find('.comentario-conteudo').html(e.conteudo);
               let comentario = $(comentario_modelo).find('body');
               comentario = comentario.html();
               $(comentarios).append(comentario);
               $("#novo-comentario").val('');
            },
            error: (e)=>{
                console.log(e)
            }
        })
    });
});