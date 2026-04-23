<?php

namespace App\Http\Requests\Admin;

use App\Enums\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    public function rules(): array
    {
        $userId = $this->route('user')->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => [
                'required', 
                Rule::enum(UserRole::class),
                function ($attribute, $value, $fail) use ($userId) {
                    if ($this->user()->id === $userId && $value !== UserRole::Admin->value) {
                        $fail('You cannot change your own role.');
                    }
                },
            ],
        ];
    }

    protected function passedValidation(): void
    {
        if (empty($this->password)) {
            $this->request->remove('password');
        }
        // Note: No manual Hash::make here. The User model has 'password' => 'hashed' cast.
    }
}
