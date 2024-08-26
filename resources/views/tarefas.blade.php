<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Lista de Tarefas</title>
</head>

<body>

    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">


    <div class="container mt-5 container-fluid">
        <h1>Lista de Tarefas Gilberto</h1>
        <div class="table-responsive">
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
                            <td>{{ $tarefa->id }}</td>
                            <td>{{ $tarefa->name }}</td>
                            <td>
                                @if ($tarefa->status)
                                    <span class="badge bg-success">Concluída</span>
                                @else
                                    <span class="badge bg-warning">Pendente</span>
                                @endif
                            </td>
                            <td>
                                <!-- botão e form para alternar o status -->
                                <form action="{{ route('tarefas.toggle', $tarefa->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button class="btn btn-block {{ $tarefa->status ? 'btn-success' : 'btn-primary' }}"
                                        type="submit">
                                        {{ $tarefa->status ? 'Marcar como Pendente' : 'Marcar como Concluída' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <!--botão e form para excluir tarefa -->
                                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-block" type="submit"
                                        onclick="return confirm('Você tem certeza que deseja excluir esta tarefa?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if (session('success'))
            <div class='alert alert-success'>
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('tarefas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">
                    <h5>Nome da tarefa</h5>
                </label>
                <input type="text" class="form-control" name="name">
            </div>
            <button class="btn btn-primary btn-block" type="submit">Criar Tarefa</button>
        </form>
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
                    this.textContent = 'concluir';
                    this.classList.remove('btn-success');
                    this.classList.add('btn-primary');
                }
            });
        });



        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.toggle-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let tarefaId = this.getAttribute('data-id');
                    let newState = this.getAttribute('data-state') === 'concluida' ? 'pendente' :
                        'concluida';

                    fetch(`/tarefa/${tarefaId}/status`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                status: newState
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.setAttribute('data-state', newState);
                                this.textContent = newState === 'concluida' ? 'Reabrir' :
                                    'Concluir';
                                this.closest('tr').querySelector('.badge').textContent =
                                    newState === 'concluida' ? 'Concluída' : 'Pendente';
                                this.closest('tr').querySelector('.badge').className =
                                    newState === 'concluida' ? 'badge bg-success' :
                                    'badge bg-warning';
                            }
                        });
                });
            });
        });
    </script>


</body>

</html>
