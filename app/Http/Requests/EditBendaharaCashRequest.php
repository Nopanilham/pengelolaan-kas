<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditBendaharaCashRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->kelas_id == Auth::user()->kelas_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipe' => 'required',
            'tanggal' => 'required',
            'kode' => 'required',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required'
        ];
    }
}
