<!DOCTYPE html>
<html lang="en">
@include('head')
<head>
    <title>Desafio - 9</title>
</head>
<body>
    <div class="row bg-dark text-light m-0 px-3">
        <div class="offset-2 col-8 text-center mt-2">
            <h3>Desafio nº 9 - Validar parênteses balanceados</h3>
            <p>
                Crie uma função que determine se uma string tem parênteses corretamente balanceados.
            </p>
        </div>
        <div class="offset-3 col-6 text-center mt-2">
            <p>Valide abaixo:</p>
            <input type="text" class="form-control" id="frase"><br>
            <button class="btn btn-primary" id="enviar" disabled>Enviar</button>
        </div>
        <div class="offset-3 col-6 text-center mt-2">
            <div id="resultado" class="d-none"></div>
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
        $('#frase').on('input', () => {
            $('#enviar').prop('disabled', !$('#frase').val().trim());
        });

        $('#enviar').click(function() {
            $.ajax({
                url: '/api/v1/nono',
                type: 'POST',
                data: {
                    frase: $('#frase').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#resultado').html(
                        '<div class="alert alert-' + (response ? 'success' : 'danger') + '">' +
                        (response ? "O fechamento está correto" : "O fechamento está incorreto") +
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