<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voluntario;

class VoluntarioController extends Controller
{
    public function insert(Request $request)
    {
        if (!isset($request)) {
            return "Por favor, preencher os campos.";
        }

        if (!$request->usuario) {
            return "Nome de usuário em branco.";
        }

        if (!$request->senha) {
            return "Senha em branco.";
        }

        if (!$request->nome) {
            return "Nome em branco.";
        }

        if (!$request->email) {
            return "Email em branco.";
        }

        if (!$request->cpf) {
            return "Cpf em branco.";
        }

        if (!$request->data_nasc) {
            return "Data de nascimento em branco.";
        }

        $voluntario = new Voluntario();
        $voluntario->usuario = $request->usuario;
        $voluntario->senha = $request->senha;
        $voluntario->nome = $request->nome;
        $voluntario->email = $request->email;
        $voluntario->cpf = $request->cpf;
        $voluntario->rg = $request->rg ? $request->rg : null;
        $voluntario->data_nasc = $request->data_nasc;
        $voluntario->genero = $request->genero ? $request->genero : null;
        $voluntario->ativo = 1;

        $voluntario->save();

        return "Cadastrado com sucesso";
    }

    public function update(Request $request)
    {
        if (!isset($request)) {
            return "Por favor, preencher os campos.";
        }

        if (!$request->id) {
            return "Erro ao atualizar os dados.";
        }

        if (!$request->usuario) {
            return "Nome de usuário em branco.";
        }

        if (!$request->senha) {
            return "Senha em branco.";
        }

        if (!$request->nome) {
            return "Nome em branco.";
        }

        if (!$request->email) {
            return "Email em branco.";
        }

        if (!$request->cpf) {
            return "Cpf em branco.";
        }

        if (!$request->data_nasc) {
            return "Data de nascimento em branco.";
        }

        $voluntario = new Voluntario();

        $voluntario->findOrFail($request->id);
        if (!isset($voluntario)) {
            return "Não foi encontrado nenhum voluntário.";
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
        $voluntario->ativo = 1;

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

        $voluntario = new Voluntario();
        $voluntario->findOrFail($request->id);

        $voluntario->delete();

        return "Deletado com sucesso.";
    }

    public function findById(Request $request)
    {
        if (!isset($request))
        {
            return "Não foi digitado nenhum id.";
        }

        $voluntario = new Voluntario();
        $voluntario->findOrFail($request->id);

        if (!isset($voluntario)) {
            return "Voluntário não encontrado";
        }

        return $voluntario;
    }

    public function findByName(Request $request)
    {
        if (!isset($request))
        {
            return "Não foi digitado nenhum nome.";
        }

        $voluntario = new Voluntario();
        $voluntario->where('nome', $request->nome)->get();

        if (!isset($voluntario)) {
            return "Voluntário não encontrado";
        }

        return $voluntario;
    }
}
