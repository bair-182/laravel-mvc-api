<?php

namespace App\Http\Requests;

use App\Models\Enums\MovementTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ProductMovementRequest extends FormRequest
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
            'product_id' => 'required|string',
            'from_warehouse_id' => 'numeric',
            'to_warehouse_id' => 'numeric',
            'count' => 'required|numeric',
            'type' => [new Enum(MovementTypes::class)]
        ];
    }
}
