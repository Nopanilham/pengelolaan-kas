<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAdminCashRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'tanggal' => 'required|date',
            'kode' => 'required',
            'kelas_id' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required',

        ];
    }
}
