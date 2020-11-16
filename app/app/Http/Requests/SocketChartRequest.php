<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SocketChartRequest
 * @package App\Http\Requests
 * @property string $label
 * @property int $sale
 * @property boolean $realtime
 */
class SocketChartRequest extends FormRequest
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
            'label'=> 'string|max:250',
            'sale'=>'integer',
        ];
    }



    public function messages()
    {
        return [
            'label.string' => 'Поле  строкове',
            'label.max' => 'Поле Тема должно содержать не больше 250 букв',
            'sale.integer' => 'Поле числовое',
        ];
    }
}
