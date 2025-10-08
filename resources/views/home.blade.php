<!DOCTYPE html>
<html lang="en">
@include('head')
<head>
    <title>Desafio - Home</title>
</head>
<body>
    <div class="row bg-dark text-light m-0 px-3">
        <div class="col-12 text-center mt-2">
            <h3>Abaixo estão as respostas para os 9 desafios em ordem:</h3>
        </div>
        @for($i = 1 ; $i < 10 ; $i++)
            <div class="col-3">
                <div class="card text-dark">
                    <div class="card-head p-1 bg-dark-blue">
                        Desafio Nº{{ $i }}
                    </div>
                    <div class="card-footer p-1">
                        <a href="{{ url('desafio/' . $i) }}" class="btn btn-primary w-100">
                            Acessar <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>