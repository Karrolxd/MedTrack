<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check()
            && in_array(auth()->user()->role->name, ['admin', 'receptionist'], true);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],

            // 11 cyfr, unikalny w tabeli patients
            'pesel' => ['required', 'digits:11', 'unique:patients,pesel'],

            // 9 cyfr (PL) – dostosuj, jeśli przyjmujesz inny format
            'phone' => ['nullable', 'regex:/^[0-9]{9}$/'],

            'date_of_birth' => ['required', 'date', 'before:today'],

            // enum z bazy: M = mężczyzna, F = kobieta, X = nieokreślono
            'sex' => ['required', 'in:M,F,X'],

            // opcjonalne dodatkowe dane – muszą być poprawnym JSON-em
            'medical_json' => ['nullable', 'json'],
        ];
    }

    public function messages(): array
    {
        return [
            'pesel.digits' => 'PESEL musi składać się z dokładnie 11 cyfr.',
            'pesel.unique' => 'Pacjent z takim PESEL-em już istnieje.',
            'phone.regex' => 'Telefon powinien zawierać 9 cyfr bez spacji i myślników.',
            'sex.in' => 'Wybierz prawidłową wartość pola Płeć.',
        ];
    }
}
