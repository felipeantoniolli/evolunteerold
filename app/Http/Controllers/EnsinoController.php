<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ensino;

class EnsinoController extends Controller
{
    public function insert(Request $request)
    {
        if (!isset($request)) {
            return "Por favor, preencher os campos.";
        }

        if (!$request->voluntario) {
            return "Não foi possível encontrar o voluntário!";
        }

        if (!$request->nome) {
            return "Nome em branco.";
        }

        if (!$request->tipo) {
            return "Tipo de instituição de ensino em branco.";
        }

        if (!$request->inicio) {
            return "Inicio em branco.";
        }

        $voluntario = new Voluntario();
        $voluntario->findOrfail($request->voluntario);

        if (!isset($voluntario)) {
            return "Não foi encontrado nenhum Voluntário";
        }

        $ensino = new Ensino();
        $ensino->idvol = $request->voluntario;
        $ensino->nome = $request->nome;
        $ensino->tipo = $request->tipo;
        $ensino->inicio = $request->inicio;
        $ensino->conclusao = $request->conclusao? $request->conclusao :null;
        $ensino->concluido = $request->concluido ? 1 : 0;
        $ensino->obs = $request->obs ? $request->obs : null;

        $ensino->save();

        return "Cadastrado com sucesso.";
    }

    public function update(Request $request)
    {
        if (!isset($request)) {
            return "Por favor, preencher os campos.";
        }

        if (!$request->voluntario) {
            return "Não foi possível encontrar o voluntário!";
        }

        if (!$request->id) {
            return "Não foi possível encontrar os dados da instituição!";
        }

        if (!$request->nome) {
            return "Nome em branco.";
        }

        if (!$request->tipo) {
            return "Tipo de instituição de ensino em branco.";
        }

        if (!$request->inicio) {
            return "Inicio em branco.";
        }

        $voluntario = new Voluntario();
        $voluntario->findOrfail($request->voluntario);

        if (!isset($voluntario)) {
            return "Não foi encontrado nenhum Voluntário";
        }

        $ensino = new Ensino();
        $voluntario->findOrfail($request->id);

        if (!isset($ensino)) {
            return "Não foi encontrado nenhuma instituição";
        }

        $ensino->idens = $request->id;
        $ensino->idvol = $request->voluntario;
        $ensino->nome = $request->nome;
        $ensino->tipo = $request->tipo;
        $ensino->inicio = $request->inicio;
        $ensino->conclusao = $request->conclusao? $request->conclusao :null;
        $ensino->concluido = $request->concluido ? 1 : 0;
        $ensino->obs = $request->obs ? $request->obs : null;

        $ensino->save();

        return "Cadastrado com sucesso.";
    }

    public function delete(Request $request)
    {

        if (!isset($request)) {
            return "Não há nada para deletar.";
        }

        if (!$request->id) {
            return "Erro ao deletar o endereço.";
        }

        $ensino = new Ensino();
        $ensino->findOrFail($request->id);

        $ensino->delete();

        return redirect();
    }

    public function findById(Request $request)
    {
        if (!isset($request))
        {
            return "Não foi digitado nenhum id.";
        }

        $ensino = new Ensino();
        $ensino->findOrFail($request->id);

        if (!isset($ensino)) {
            return "Instituição de ensino não encontrado.";
        }

        return $ensino;
    }

    public function findByType(Request $request)
    {
        if (!isset($request))
        {
            return "Não foi digitado nenhum tipo de instituição.";
        }

        $ensino = new Ensino();
        $ensino->where('nome', $request->tipo)->get();

        if (!isset($ensino)) {
            return "Instituição não encontrado.";
        }

        return $ensino;
    }

    public function findByVolunteer(Request $request)
    {
        if (!isset($request))
        {
            return "Não foi digitado nenhum voluntário.";
        }

        $ensino = new Ensino();
        $ensino->where('idvol', $request->voluntario)->get();

        if (!isset($ensino)) {
            return "Instituição de ensino não encontrada.";
        }

        return $ensino;
    }
}
