<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kategori_kode' => 'required',
            'kategori_nama' => 'required',
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required',
            'level_id' => 'required',
            'level_kode' => 'required',
            'level_nama' => 'required',
        ];
    }

    public function store(StorePostRequest $request): RedirectResponse{
        $validated = $request->validated();
        $validated = $request->save()->only(['kategori_kode'], 'kategori_nama');
        $validated = $request->save()->expect(['kategori_kode'], 'kategori_nama');

        return redirect('/kategori');
    }
}
