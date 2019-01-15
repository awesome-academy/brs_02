<?php

namespace App\Http\Requests\Admin\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'bname' => 'required',
            'preview' => 'required|max:150',
            'author' => 'required',
            'cat' => 'required',
            'picture' => 'required',
            'sort' => 'required|integer',
            'extract' => 'required|max:300',
        ];
    }
    public function messages()
    {
        return [
            'bname.required' => trans('book.enter_bname'),
            'preview.required' => trans('book.preview_enter'),
            'preview.max' => trans('book.max'),
            'author.required' => trans('book.author_enter'),
            'cat.required' => trans('book.cat_enter'),
            'picture.required' => trans('book.picture_enter'),
            'sort.required' => trans('book.sort_enter'),
            'sort.integer' => trans('book.sort_int'),
            'extract.required' => trans('book.extract_enter'),
            'extract.max' => trans('book.extract_max'),
        ];
    }
}
