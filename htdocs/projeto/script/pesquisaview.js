$(document).ready(function () {

    $("#pesquisaForm").hide();

    $("#pesquisaForm").submit(function (event) {

        event.preventDefault();

        var termoPesquisa = $("#termoPesquisa").val();

        $.ajax({
            type: "GET",
            url: "../server/pesquisaserver.php", 
            data: { termo: termoPesquisa },
            dataType: "html",
            success: function (data) {

                $(".textoview").html(data);
            },
            error: function () {
                alert("Erro ao realizar a pesquisa.");
            }
        });
    });

    $("#mostrarPesquisa").click(function () {

        $("#pesquisaForm").toggle("slow");
    });
});