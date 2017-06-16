<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BpvBedrijfRequest extends FormRequest
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
        // 11-05-2017 Lars: Deze gegevens zijn noodzakelijke anders wordt het nieuwe bedrijf niet toegevoegd
        return [
            'id' => 'required',
            'naam' => 'required',
            'adres' => 'required',
            'plaats' => 'required',
            'telnr' => 'required',
            'praktijkbegeleider' => 'required',
            'mail' => 'required',
            'beroepsprofiel' => 'required',
            'erkenning' => 'required'
        ];
    }
}
