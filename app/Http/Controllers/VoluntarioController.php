<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voluntario;

class VoluntarioController extends Controller
{
    public function rules(Request $request)
    {
        $rules = [
            'usuario' => 'required|min:3|max:50|unique:voluntarios',
            'senha' => 'required|min:5|max:50',
            'nome' => 'required|min:3|max:150',
            'email' => 'required|email|max:50',
            'cpf' => 'required|min:11|max:11',
            'rg' => 'nullable',
            'genero' => 'nullable',
            'data_nasc' => 'required|date'
        ];

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'usuario.min' => 'O minimo de caracteres validos é 3.',
            'usuario.max' => 'O máximo de caracteres validos é 50.',
            'senha.min' => 'O minimo de caracteres validos é 3.',
            'senha.max' => 'O máximo de caracteres validos é 50.',
            'email.max' => 'O máximo de caracteres validos é 50.',
            'cpf.min' => 'CPF inválido.',
            'cpf.max' => 'CPF inválido.',
            'data_nasc.required' => 'Data de nascimento inválida.',
            'data_nasc.date' => 'Data de nascimento inválida.',
        ];

        $request->validate($rules, $messages);
    }

    public function insert(Request $request)
    {
        $this->rules($request);

        Voluntario::create($request->all());

        return view('login');
    }

    public function update(Request $request)
    {
        $rules = $this->rules();
        $request->validate($rules[0], $rules[1]);

        $voluntario = new Voluntario;

        $voluntario->findOrFail($request->id);
        if (!isset($voluntario)) {
            return "Não foi encontrado nenhum voluntário com esse id.";
        }

        $voluntario->idvol = $request->id;
        $voluntario->usuario = $request->usuario;
        $voluntario->senha = $request->senha;
        $voluntario->nome = $request->nome;
        $voluntario->email = $request->email;
        $voluntario->cpf = $request->cpf;
        $voluntario->rg = $request->rg ? $request->rg : null;
        $voluntario->data_nasc = $request->data_nasc;
        $voluntario->genero = $request->genero ? $request->genero : null;

        $voluntario->save();

        return "Atualizado com sucesso.";
    }

    public function delete(Request $request)
    {
        if (!isset($request)) {
            return "Não há nada para deletar.";
        }

        if (!$request->id) {
            return "Erro ao deletar o voluntário.";
        }

        $voluntario = new Voluntario;
        $voluntario->findOrFail($request->id);

        $voluntario->delete();

        return "Deletado com sucesso.";
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'senha' => 'required'
        ], [
            'required' => 'Campo vazio'
        ]);

        $voluntario = Voluntario::where([
            ['usuario', '=', $request->usuario],
            ['senha', '=', $request->senha]
        ])->first();

        if (empty($voluntario)) {
            $loginError = 'Login ou senha inválidos.';
            return view('login', ['message' => $loginError]);
        }

        $request->session()->put('voluntario', $voluntario->idvol);

        return $this->myAccount();
    }

    public function signUp()
    {
        $voluntario = session('voluntario');
        if (isset($voluntario)) {
            return view('minhaconta');
        }

        return view('cadastro');
    }

    public function signIn()
    {
        $voluntario = session('voluntario');
        if (isset($voluntario)) {
            return view('minhaconta');
        }

        return view('login');
    }

    public function myAccount()
    {
        $voluntario = session('voluntario');

        if  (!isset($voluntario)) {
            $notLoged = 'Você não está logado.';
            return view('login', ['message' => $notLoged]);
        }

        $voluntario = Voluntario::where('idvol', $voluntario)->first();

        if (!isset($voluntario)) {
            $notFound = 'Usuário não encontrado.';
            return view('login', ['message' => $notFound]);
        }

        return view('minhaconta', ['voluntario' => $voluntario]);
    }

    public function findById(Request $request)
    {
        if (!isset($request)) {
            return "Não foi digitado nenhum id.";
        }

        $voluntario = new Voluntario;
        $voluntario->findOrFail($request->id);

        if (!isset($voluntario)) {
            return "Voluntário não encontrado";
        }

        return $voluntario;
    }

    public function findByName(Request $request)
    {
        if (!isset($request)) {
            return "Não foi digitado nenhum nome.";
        }

        $voluntario = new Voluntario;
        $voluntario->where('nome', $request->nome)->get();

        if (!isset($voluntario)) {
            return "Voluntário não encontrado";
        }

        return $voluntario;
    }
}
