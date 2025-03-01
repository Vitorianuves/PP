<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function listagem(Request $request)
    {
        $query = Evento::query();
        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->filled('descricao')) {
            $query->where('descricao', 'like', '%' . $request->descricao . '%');
        }

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->filled('preco_de')) {
            $query->where('preco', '>=', $request->preco_de);
        }

        if ($request->filled('preco_ate')) {
            $query->where('preco', '<=', $request->preco_ate);
        }

        if ($request->filled('data_de')) {
            $query->whereDate('data', '>=', $request->data_de);
        }

        if ($request->filled('data_ate')) {
            $query->whereDate('data', '<=', $request->data_ate);
        }

        $eventos = $query->get();

        return view('eventos', compact('eventos'));
    }




    public function cadastro()
    {
        return view('cadastro-evento');
    }

    public function salvar(Request $form)
    {
        $nome = $form->input('nome');
        $tipo = $form->input('tipo');
        $descricao = $form->input('descricao');
        $endereco = $form->input('endereco');
        $link = $form->input('link') ?: null;
        $preco = $form->input('preco');
        $data = $form->input('data');
        $hora = $form->input('hora');

        $cadastrar = new Evento();
        $cadastrar->nome = $nome;
        $cadastrar->tipo = $tipo;
        $cadastrar->descricao = $descricao;
        $cadastrar->endereco = $endereco;
        $cadastrar->link = $link;
        $cadastrar->preco = $preco;
        $cadastrar->data = $data;
        $cadastrar->hora = $hora;
        $cadastrar->save();

        return redirect('eventos/listagem')->with('success', 'Evento cadastrado com sucesso.');
    }

    public function exclusao($id)
    {

        $evento = Evento::find($id);

        if ($evento) {
            $evento->delete();
            return redirect('/eventos/listagem')->with('success', 'Evento excluído com sucesso.');
        } else {
            return redirect('/eventos/listagem')->with('error', 'Evento não encontrado.');
        }
    }
}
