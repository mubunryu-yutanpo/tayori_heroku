<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidRequest extends FormRequest
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
            //viewで設定している各フォームのname属性の名前になるよ
            'name'      => 'sometimes|required|string|max:255',
            'email'     => 'sometimes|required|string|max:255',
            'password'  => 'sometimes|required|string|max:255|min:8',
            'date'      => 'sometimes|required',
            'time'      => 'sometimes|required',
            'title'     => 'sometimes|nullable|string|max:255',
            'comment'   => 'sometimes|nullable|string|max:255',
            'color'     => 'sometimes|required',
            'shape'     => 'sometimes|required',
            'smell'     => 'sometimes|required',
            'volume'    => 'sometimes|required',
            'frequency' => 'sometimes|required',
            'avatar'    => 'sometimes|nullable|mimes:jpg,jpeg,png,gif|max:1024',
            'pic1'      => 'sometimes|nullable|mimes:jpg,jpeg,png,gif|max:1024',
            'pic2'      => 'sometimes|nullable|mimes:jpg,jpeg,png,gif|max:1024',
            'pic3'      => 'sometimes|nullable|mimes:jpg,jpeg,png,gif|max:1024',
        ];
    }

    public function messages(){
        return[
            //フォームリクエスト（バリデーション）のエラーメッセージ設定

            'avatar.mimes' => 'ファイル形式はjpeg(jpg)、png、gifが利用可能です',
            'avatar.max'   => 'ファイルサイズは1MB以下にしてください',
            'pic1.mimes' => 'ファイル形式はjpeg(jpg)、png、gifが利用可能です',
            'pic1.max'   => 'ファイルサイズは1MB以下にしてください',
            'pic2.mimes' => 'ファイル形式はjpeg(jpg)、png、gifが利用可能です',
            'pic2.max'   => 'ファイルサイズは1MB以下にしてください',
            'pic3.mimes' => 'ファイル形式はjpeg(jpg)、png、gifが利用可能です',
            'pic3.max'   => 'ファイルサイズは1MB以下にしてください',
            'color.required'     => '選択必須してください',
            'shape.required'     => '選択必須してください',
            'smell.required'     => '選択必須してください',
            'volume.required'    => '選択必須してください',
            'frequency.required' => '選択必須してください',
        ];
    }
}
