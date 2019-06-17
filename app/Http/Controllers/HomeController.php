<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Auth;

class HomeController extends Controller
{

    private $salt = "YlthmR1AyzIZSW4G";
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ($this->isLogged()) {
            $this->userIndex();
        }

        return view('root/index');
    }

    public function login()
    {
        if ($this->isLogged()) {
            $this->userIndex();
        }

        return view('root/login');
    }

    public function signIn(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'senha' => 'required'
        ], [
            'required' => 'Campo vazio'
        ]);

        $password = hash('sha256', $request->senha . $this->salt);

        $usuario = Usuario::where([
            ['usuario', '=', $request->usuario],
            ['senha', '=', $password]
        ])->first();

        if (empty($usuario)) {
            $loginError = 'Login ou senha inválidos.';
            return view('root/login', ['message' => $loginError]);
        }

        Auth::login($usuario);

        return $this->userIndex();
    }

    public function signUp()
    {
        if ($this->isLogged()) {
            $this->userIndex();
        }

        return view('root/cadastro');
    }

    public function isLogged()
    {
        if (!Auth::check()) {
            return false;
        }

        return true;
    }

    public function userIndex() {
        $user = Auth::user();

        if ($user->tipo == 0) {
            return route('voluntario.index');
        } elseif ($user->tipo == 1) {
            return route('instituicao.index');
        } else {
            return view('/404');
        }
    }
}
