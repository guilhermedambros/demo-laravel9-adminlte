<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use App\Helpers\Helpers;
use Illuminate\Validation\Rule;
class StoreEmpresaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pessoa_criar'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nome' => ['string','required',],
            'email_fatura' => ['email','required',],
        ];
    }

    //metodo utilizado caso haja necessidade de alterar algum campo antes de validar o form
    protected function prepareForValidation()
    {
        $this->merge([
            'documento' => Helpers::removeSpecialChar($this->documento),//remove caracteres do documento
            'telefone' => Helpers::removeSpecialChar($this->telefone),//remove caracteres do telefone
            'cep' => Helpers::removeSpecialChar($this->cep),//remove caracteres do cep
        ]);
    }
}
