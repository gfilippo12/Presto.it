<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnnouncementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        public $title;
        public $body;
        public $price;
        public $category;

        protected $rules = [
            'title' => 'required|min:4',
            'body' => 'required|min:8',
            'category' => 'required',
            'price' => 'required|numeric',
        ];

        protected $messages = [
            'required' => 'Il campo :attribute è obbligatorio',
            'min' => 'Il campo :attribute è troppo corto',
            'numeric' => 'Il campo :attribute dev\' essere un numero',
        ];
    }
}


