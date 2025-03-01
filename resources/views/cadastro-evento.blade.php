<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/eventos.css') }}">
    <title>Gerenciador de Evento</title>
</head>

<body>

    <fieldset>
        <legend>Cadastro de Evento</legend>

        <form action="/eventos/salvar" method="post">
            @csrf

            <div class="form-grid">
                <div>

                    <label>Nome:</label>
                    <input type="text" name="nome" maxlength="150" required>
                </div>

                <div>
                    <label for="tipo">Tipo do Evento:</label>
                    <select name="tipo" id="tipo" required>
                        <option value="" disabled selected>Escolha o tipo de evento</option>
                        <option value="social">Social</option>
                        <option value="cultural">Cultural</option>
                        <option value="esportivo">Esportivo</option>
                        <option value="corporativo">Corporativo</option>
                        <option value="religioso">Religioso</option>
                        <option value="entretenimento">Entretenimento</option>
                        <option value="outros">Outros</option>
                    </select>
                </div>

                <div>
                    <label>Descrição:</label>
                    <input type="text" name="descricao" maxlength="100" required>
                </div>
                <div>
                    <label>Preço:</label>
                    <input type="number" name="preco">
                </div>

                <div class="full-width">
                    <label>Endereço:</label>
                    <input type="text" name="endereco" maxlength="100" required>
                    <br><br>
                    <label>Link do Endereço:</label>
                    <input type="text" name="link" maxlength="500">
                </div>

                <div class="full-width data-hora">
                    <label>Data:</label>
                    <input type="date" name="data" required>
                    <label>Hora:</label>
                    <input type="time" name="hora" required>
                </div>
            </div>

            <div class="botoes">
                <button class="botao-primario" type="submit">Salvar</button>
                <a class="botao-secundario" href="/eventos/listagem">Cancelar</a>
            </div>

        </form>
    </fieldset>

</body>

</html>