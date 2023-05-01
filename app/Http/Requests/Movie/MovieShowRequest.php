<?php

namespace App\Http\Requests\Movie;

use App\Gateways\TMDB;
use Illuminate\Foundation\Http\FormRequest;

class MovieShowRequest extends FormRequest
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
           //
        ];
    }

    public function handle():static
    {
        $this->data = (new TMDB)->show($this->input('movie'))->getCollection();
        $this->getPosterUrl();
        // $this->getTrailer();
        return $this;
    }

    private function getPosterUrl()
    {
        $this->data['poster_url'] = config('tmdb.image_base_url') . $this->data['poster_path']; 
    }

    public function view()
    {  
        return view("show", ['movie' => $this->data]);
    }

}
