<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">


    <title>exemplo</title>
</head>

<body>



    <div class="container mt-5">
        <h1>Lista de Tarefas Gilberto</h1>

        <table class="table table-hover" class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarefas as $tarefa)
                    <tr>
                        <td>{{ $tarefa['id'] }}</td>
                        <td>{{ $tarefa['titulo'] }}</td>
                        <td>
                            @if ($tarefa['concluida'])
                                <span class="badge bg-success">Concluída</span>
                            @else
                                <span class="badge bg-warning">Pendente</span>
                            @endif
                        </td>
                        <td>
                            <!-- Botão de Ativar/Desativar -->
                            <button class="btn btn-primary toggle-btn" data-id="{{ $tarefa['id'] }}" data-state="off">
                                Inativo
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('.toggle-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                if (this.getAttribute('data-state') === 'off') {
                    this.setAttribute('data-state', 'on');
                    this.textContent = 'Concluída';
                    this.classList.remove('btn-primary');
                    this.classList.add('btn-success');
                } else {
                    this.setAttribute('data-state', 'off');
                    this.textContent = 'Inativo';
                    this.classList.remove('btn-success');
                    this.classList.add('btn-primary');
                }
            });
        });
    </script>
</body>

</html>
