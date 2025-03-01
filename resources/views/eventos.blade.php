<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/eventos.css') }}">

    <title>Gerenciador de Eventos</title>
</head>

<body>
    <header>
        <h1>Gerenciamento de Eventos</h1>
    </header>
    <div class="form-container">
        <form action="/eventos/listagem" method="GET" class="filtros">

            <input type="text" name="nome" value="{{ request('nome') }}" placeholder="Nome do Evento">
            <input type="text" name="descricao" value="{{ request('descricao') }}" placeholder="Descrição">
            <select name="tipo">
                <option value="">Todos os tipos</option>
                <option value="social" {{ request('tipo') == 'social' ? 'selected' : '' }}>Social</option>
                <option value="cultural" {{ request('tipo') == 'cultural' ? 'selected' : '' }}>Cultural</option>
                <option value="esportivo" {{ request('tipo') == 'esportivo' ? 'selected' : '' }}>Esportivo</option>
                <option value="corporativo" {{ request('tipo') == 'corporativo' ? 'selected' : '' }}>Corporativo</option>
                <option value="religioso" {{ request('tipo') == 'religioso' ? 'selected' : '' }}>Religioso</option>
                <option value="entretenimento" {{ request('tipo') == 'entretenimento' ? 'selected' : '' }}>Entretenimento</option>
                <option value="outros" {{ request('tipo') == 'outros' ? 'selected' : '' }}>Outros</option>
            </select>
            <input type="number" name="preco_de" value="{{ request('preco_de') }}" placeholder="Preço (De)">
            <input type="number" name="preco_ate" value="{{ request('preco_ate') }}" placeholder="Preço (Até)">
            <input type="date" name="data_de" value="{{ request('data_de') }}">
            <input type="date" name="data_ate" value="{{ request('data_ate') }}">
            <input type="text" name="link" value="{{ request('link') }}" placeholder="Link do endereço">
            <input type="time" name="hora" value="{{ request('hora') }}">
            <div class="botoes-filtro">
                <button class="botao-primario" type="submit">Filtrar</button>
                <a class="botao-secundario" href="/eventos/listagem">Limpar</a>
            </div>


        </form>
    </div>

    <div class="acoes-topo">
        <a class="botao-primario" href="/eventos/cadastrar">Cadastrar Evento</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Endereço</th>
                <th>Data e Hora</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
            <tr>
                <td>{{ $evento->nome }}</td>
                <td>{{ $evento->descricao }}</td>
                <td>{{$evento->tipo}}</td>
                <td>{{ $evento->endereco }} <br> <a href="{{ $evento->link }}">Ir para o Endereço</a> </td>
                <td>{{ $evento->data }} {{ $evento->hora }}</td>
                <td>{{ $evento->preco }}</td>
                <td class="actions">
                    <a href="">
                        <span class="icon edit"></span>
                    </a>
                    <a href="/eventos/excluir/{{$evento->id}}">
                        <span class="icon delete"></span>
                    </a>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>