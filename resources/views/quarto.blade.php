<!DOCTYPE html>
<html lang="en">
@include('head')
<head>
    <title>Desafio - 4</title>
</head>
<body>
    <div class="row bg-dark text-light m-0 px-3">
        <div class="offset-2 col-8 text-center mt-2">
            <h3>Desafio nº 4 - Verificar se uma string termina com outra</h3>
            <p>
                Complete a solução para que ela retorne verdadeiro se o primeiro argumento (string) passado terminar com o segundo argumento (também uma string).
            </p>
        </div>
        <div class="offset-3 col-6 text-center mt-2">
            <p>Primeiro argumento:</p>
            <input type="text" class="form-control" id="frase1"><br>
            <p>Segundo argumento:</p>
            <input type="text" class="form-control" id="frase2"><br>
            <button class="btn btn-primary" id="enviar" disabled>Enviar</button>
        </div>
        <div class="offset-3 col-6 text-center mt-2">
            <div id="resultado"></div>
        </div>
    </div>
    <a href="/" class="btn btn-outline-secondary text-light" id="back"><i class="fas fa-home"></i></a>
    <pre>Atenção, por padrão, o resultado ficará disponível por 5 segundos</pre>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#frase1').on('input', () => {
            $('#enviar').prop('disabled', !$('#frase1').val().trim());
        });

        $('#enviar').click(function() {
            $.ajax({
                url: '/api/v1/quarto',
                type: 'POST',
                data: {
                    frase1: $('#frase1').val(),
                    frase2: $('#frase2').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#resultado').html(
                        '<div class="alert alert-' + (response ? 'success' : 'danger') + '">' +
                        (response ? "Os finais são identicos!" : "Os finais diferem!") +
                        '</div>'
                    );

                    $('#resultado').removeClass('d-none');
                    $('#enviar').prop('disabled', true);


                    setTimeout(() => {
                        $('#resultado').addClass('d-none');
                        $('#enviar').prop('disabled', false);
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    console.error('Erro:', error);
                }
            });
        });
    });
</script>