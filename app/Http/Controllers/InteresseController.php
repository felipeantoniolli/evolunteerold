<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InteresseController extends Controller
{
    public function insert(Request $request)
    {
        if (!isset($request)) {
            return "Por favor, preencher os campos.";
        }

        if (!$request->voluntario) {
            return "Não foi possível encontrar o voluntário!";
        }

        if (!$request->interesse) {
            return "Interesses em branco.";
        }

        $voluntario = new Voluntario();
        $voluntario->findOrfail($request->voluntario);

        if (!isset($voluntario)) {
            return "Não foi encontrado nenhum Voluntário";
        }

        $interesse = new Interesse();
        $interesse->idvol = $request->voluntario;
        $interesse->interesse = $request->interesse;

        $interesse->save();

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
            return "Não foi possível encontrar nenhum interesse!";
        }

        if (!$request->interesse) {
            return "Interesses em branco.";
        }

        $voluntario = new Voluntario();
        $voluntario->findOrfail($request->voluntario);

        if (!isset($voluntario)) {
            return "Não foi encontrado nenhum Voluntário";
        }

        $interesse = new Interesse();
        $interesse->findOrfail($request->id);

        if (!isset($interesse)) {
            return "Não foi encontrado nenhum Interesse";
        }

        $interesse = new interesse();
        $voluntario->findOrfail($request->id);

        if (!isset($interesse)) {
            return "Não foi encontrado nenhuma instituição";
        }

        $interesse = new Interesse();
        $interesse->idvol = $request->voluntario;
        $interesse->idinter = $request->id;
        $interesse->interesse = $request->interesse;

        $interesse->save();

        return "Atualizado com sucesso.";
    }

    public function delete(Request $request)
    {

        if (!isset($request)) {
            return "Não há nada para deletar.";
        }

        if (!$request->id) {
            return "Erro ao deletar o interesse.";
        }

        $interesse = new Interesse();
        $interesse->findOrFail($request->id);

        $interesse->delete();

        return redirect();
    }

    public function findById(Request $request)
    {
        if (!isset($request))
        {
            return "Não foi digitado nenhum id.";
        }

        $interesse = new interesse();
        $interesse->findOrFail($request->id);

        if (!isset($interesse)) {
            return "Nenhum interesse encontrado.";
        }

        return $interesse;
    }

    public function findByVolunteer(Request $request)
    {
        if (!isset($request))
        {
            return "Não foi digitado nenhum voluntário.";
        }

        $interesse = new Interesse();
        $interesse->where('idvol', $request->voluntario)->get();

        if (!isset($interesse)) {
            return "Interesse não encontrado";
        }

        return $interesse;
    }
}
