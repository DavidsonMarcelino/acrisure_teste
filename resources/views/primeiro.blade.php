<!DOCTYPE html>
<html lang="en">
@include('head')
<head>
    <title>Desafio - 1</title>
</head>
<body>
    <div class="row bg-dark text-light m-0 px-3">
        <div class="offset-2 col-8 text-center mt-2">
            <h3>Desafio nº 1 - Verificar se uma frase é pangramática</h3>
            <p>
                Uma frase pangramática utiliza todas as letras do alfabeto pelo menos uma vez.
            </p>
            <p>
                Por exemplo, a sentença "Quero faxina nas locadoras de video: jogue blitz com whisky PM" cumpre essa característica, pois contém cada letra de A a Z ao menos uma vez (detalhes extras podem ser ignorados).
            </p>
            <p>
                Dado um texto, determine se ele é pangramático ou não. Retorne True caso seja, e False caso contrário.
                Desconsidere números e símbolos de pontuação na verificação.
            </p>
        </div>
        <div class="offset-3 col-6 text-center mt-2">
            <p>Digite a frase abaixo:</p>
            <input type="text" class="form-control" id="frase"><br>
            <button class="btn btn-primary mt-1" id="enviar">Enviar</button>
            <div id="resultado" class="my-1"></div>
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
        $('.btn-primary').click(function() {
            $.ajax({
                url: '/api/v1/primeiro',
                type: 'POST',
                data: {
                    frase: $('#frase').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#frase').removeClass('is-invalid is-valid');
                    $('#enviar').prop('disabled', true);

                    if(response){
                        $('#frase').addClass('is-valid');
                        $('#resultado').html('<div class="alert alert-success mt-2">Frase pangramática!</div>');
                    } else {
                        $('#frase').addClass('is-invalid');
                        $('#resultado').html('<div class="alert alert-danger mt-2">Frase não pangramática!</div>');
                    }

                    setTimeout(() => {
                        $('#frase').removeClass('is-invalid is-valid');
                        $('#enviar').prop('disabled', false);
                        $('#resultado').html('');
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    console.error('Erro:', error);
                }
            });
        });
    });
</script>