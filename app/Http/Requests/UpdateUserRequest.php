<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user')->id;

        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'username' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique(User::class)->ignore($userId)
            ],
            'email' => [
                'sometimes',
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($userId)
            ],
            'phone' => [
                'nullable',
                'string',
                'max:20',
                Rule::unique(User::class)->ignore($userId)
            ],
            'password' => ['nullable', 'string', 'min:8'],
            'role' => [
                'sometimes',
                'required',
                Rule::in(['admin', 'staff', 'partner', 'collaborator', 'owner', 'guest']),
            ],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:20480'],
            'points' => ['nullable', 'integer', 'min:0'],
            'active' => ['sometimes', 'boolean'],
            'social_id' => ['nullable', 'string', 'max:255'],
            'social_provider' => ['nullable', 'string', 'max:50'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'username.required' => 'Vui lòng nhập tên đăng nhập.',
            'username.unique' => 'Tên đăng nhập này đã tồn tại.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Địa chỉ email này đã được sử dụng.',
            'phone.unique' => 'Số điện thoại này đã được sử dụng.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
            'role.required' => 'Vui lòng chọn vai trò cho người dùng.',
            'role.in' => 'Vai trò được chọn không hợp lệ.',
            'avatar.image' => 'Avatar phải là một tệp hình ảnh.',
            'avatar.mimes' => 'Avatar phải có định dạng: jpeg, png, jpg, gif.',
            'avatar.max' => 'Kích thước avatar không được vượt quá 20MB.',
            'points.integer' => 'Điểm phải là một số nguyên.',
            'points.min' => 'Điểm không được nhỏ hơn :min.',
            'active.boolean' => 'Trạng thái hoạt động không hợp lệ.',
        ];
    }
}
