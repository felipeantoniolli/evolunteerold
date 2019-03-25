<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Endereco;

class EnderecoController extends Controller
{
    public function insert(Request $request)
    {
        if (!isset($request)) {
            return "Por favor, preencher os campos.";
        }

        if (!$request->voluntario) {
            return "Não foi possível encontrar o voluntário!";
        }

        if (!$request->cep) {
            return "Cep em branco.";
        }

        if (!$request->rua) {
            return "Rua em branco.";
        }

        if (!$request->numero) {
            return "Numero em branco.";
        }

        if (!$request->complemento) {
            return "Complemento em branco.";
        }

        if (!$request->cidade) {
            return "Cidade em branco.";
        }

        if (!$request->estado) {
            return "Estado em branco.";
        }

        $voluntario = new Voluntario();
        $voluntario->findOrfail($request->voluntario);

        if (!isset($voluntario)) {
            return "Não foi encontrado nenhum Voluntário";
        }

        $endereco = new Endereco();
        $endereco->idvol = $request->voluntario;
        $endereco->usuario = $request->usuario;
        $endereco->cep = $request->cep;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->complemento = $request->complemento;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;

        $endereco->save();

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
            return "Não foi possível encontrar o endereço!";
        }

        if (!$request->cep) {
            return "Cep em branco.";
        }

        if (!$request->rua) {
            return "Rua em branco.";
        }

        if (!$request->numero) {
            return "Numero em branco.";
        }

        if (!$request->complemento) {
            return "Complemento em branco.";
        }

        if (!$request->cidade) {
            return "Cidade em branco.";
        }

        if (!$request->estado) {
            return "Estado em branco.";
        }

        $voluntario = new Voluntario();
        $voluntario->findOrfail($request->voluntario);

        if (!isset($voluntario)) {
            return "Não foi encontrado nenhum Voluntário";
        }

        $endereco = new Endereco();
        $endereco->findOrfail($request->id);

        if (!isset($endereco)) {
            return "Não foi possivel encontrar o endereço.";
        }

        $endereco->idend - $request->id;
        $endereco->idvol = $request->voluntario;
        $endereco->usuario = $request->usuario;
        $endereco->cep = $request->cep;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->complemento = $request->complemento;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;

        $endereco->save();

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

        $endereco = new Endereco();
        $endereco->findOrFail($request->id);

        $endereco->delete();

        return redirect();
    }

    public function findById(Request $request)
    {
        if (!isset($request))
        {
            return "Não foi digitado nenhum id.";
        }

        $endereco = new Endereco();
        $endereco->findOrFail($request->id);

        if (!isset($endereco)) {
            return "Endereço não encontrado.";
        }

        return $endereco;
    }

    public function findByState(Request $request)
    {
        if (!isset($request))
        {
            return "Não foi digitado nenhum estado.";
        }

        $endereco = new Endereco();
        $endereco->where('estado', $request->estado)->get();

        if (!isset($endereco)) {
            return "Endereço não encontrado";
        }

        return $endereco;
    }

    public function findByVolunteer(Request $request)
    {
        if (!isset($request))
        {
            return "Não foi digitado nenhum voluntário.";
        }

        $endereco = new Endereco();
        $endereco->where('idvol', $request->voluntario)->get();

        if (!isset($endereco)) {
            return "Endereco não encontrado.";
        }

        return $endereco;
    }
}
