<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $id=$this->article;
        return [
            //
            'title' => 'required|unique:articles,title|max:255',
            'content' => 'required|unique:articles,content|min:50',
            'userfile' => 'required|image|mimes:jpeg,png|min:1|max:250'
        ];
    }
    public function messages(){
        return [
            //
            'required' => ':attribute is required, isi!!!',
            'title.unique' => 'Title must unique, take another title'
        ];
    }
}
