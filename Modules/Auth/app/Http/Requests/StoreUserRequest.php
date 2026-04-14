<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Auth\Http\Requests;

use Modules\Core\Http\Requests\BaseFormRequest;

class StoreUserRequest extends BaseFormRequest
{
    use UserRules;

    public function rules(): array
    {
        $rules = $this->baseRules();

        return [
            'name' => ['required', ...$rules['name']],
            'email' => ['required', ...$rules['email'], 'unique:users,email'],
            'password' => ['required', ...$this->passwordRules()],
            'roles' => $rules['roles'],
            'roles.*' => $rules['roles.*'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('Le nom est obligatoire.'),
            'email.required' => __("L'adresse email est obligatoire."),
            'email.unique' => __('Cette adresse email est déjà utilisée.'),
            'password.required' => __('Le mot de passe est obligatoire.'),
            'password.min' => __('Le mot de passe doit contenir au moins 8 caractères.'),
            'password.confirmed' => __('La confirmation du mot de passe ne correspond pas.'),
        ];
    }
}
