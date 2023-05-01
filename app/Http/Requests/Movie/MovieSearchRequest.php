<?php

namespace App\Http\Requests\Movie;

use App\Gateways\TMDB;
use Illuminate\Foundation\Http\FormRequest;

class MovieSearchRequest extends FormRequest
{
    private $data;
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
            'search' => ['required', 'min:4', 'max:160'],
        ];
    }

    public function handle():static
    {
        $this->data = (new TMDB)->search($this->input('search'))->getCollection();
        return $this;
    }

    public function view()
    {  
        return view("index", ['movies' => $this->data]);
    }

}
