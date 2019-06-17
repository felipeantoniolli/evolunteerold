<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Controllers\HomeController;
use App\Usuario;
use App\Voluntario;

class VoluntarioController extends Controller
{
    private $salt = "YlthmR1AyzIZSW4G";
    public function rules(Request $request)
    {
        $rules = [
            'usuario' => 'required|min:3|max:50|unique:usuarios',
            'senha' => 'required|min:5|max:50',
            'nome' => 'required|min:3|max:50',
            'sobrenome' => 'required|min:3|max:100',
            'email' => 'required|email|max:50|unique:usuarios',
            'cpf' => 'required|min:11|max:11',
            'rg' => 'nullable',
            'genero' => 'nullable',
            'data_nasc' => 'required|date'
        ];

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'unique' => 'Campo inválido.',
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

        $voluntario = $request->all();

        $user = [
            'email' => $voluntario['email'],
            'usuario' => $voluntario['usuario'],
            'senha' => hash("sha256", $voluntario['senha'] . $this->salt),
            'tipo' => 0,
            'ativo' => 1
        ];
        $userId = Usuario::create($user)->id;

        $voluntario = array_merge($voluntario, ['idUsuario' => $userId]);
        Voluntario::create($voluntario);

        return view('root/login');
    }

    public function signUp()
    {
        if (HomeController::isLogged()) {
            return HomerController::userIndex();
        }

        return view('voluntario/cadastro');
    }

    public function myAccount()
    {
        $usuario = Auth::user();

        $usuario = Usuario::where('idUsuario', $usuario->idUsuario)->first();
        if (!isset($usuario)) {
            $notFound = 'Usuário não encontrado.';
            return view('login', ['message' => $notFound]);
        }

        $voluntario = Voluntario::where(['idUsuario', $usuario->idUsuario])->first();

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
