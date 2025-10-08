<!DOCTYPE html>
<html lang="en">
@include('head')
<head>
    <title>Desafio - 3</title>
</head>
<body>
    <div class="row bg-dark text-light m-0 px-3">
        <div class="offset-2 col-8 text-center mt-2">
            <h3>Desafio nº 3 - Encontrar o maior e o menor número em uma sequência</h3>
            <p>
                Nesta pequena tarefa, você recebe uma sequência de números separados por espaços e deve retornar o maior e o menor número.
            </p>
        </div>
        <div class="offset-3 col-6 text-center mt-2">
            <p>Digite o números abaixo:</p>
            <input type="text" class="form-control" id="numeros"><br>
            <button class="btn btn-primary" id="enviar" disabled>Enviar</button>
        </div>
        <div class="offset-3 col-6 text-center mt-2">
            <div id="resultado" class="alert alert-secondary d-none"></div>
            <div id="error" class="alert alert-danger d-none"></div>
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
        $('#numeros').on('input', () => {
            $('#enviar').prop('disabled', !$('#numeros').val().trim());
        });

        $('#enviar').click(function() {
            $.ajax({
                url: '/api/v1/terceiro',
                type: 'GET',
                data: {
                    numeros: $('#numeros').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#resultado').html('O menor e o maior número são respectivamente: ' + response);
                    $('#resultado').removeClass('d-none');
                    $('#enviar').prop('disabled', true);

                    setTimeout(() => {
                        $('#resultado').addClass('d-none');
                        $('#enviar').prop('disabled', false);
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    $('#error').removeClass('d-none');
                    $('#error').html(xhr.responseJSON.error);

                    setTimeout(() => {
                        $('#error').addClass('d-none');
                    }, 5000);
                }
            });
        });
    });
</script>