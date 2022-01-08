<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimeEntryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required|array',
            'type.id' => 'sometimes|exists:types,id',
            'type.name' => 'sometimes|required_without:type.id|string',
            'category' => 'required|array',
            'category.id' => 'sometimes|exists:categories,id',
            'category.name' => 'sometimes|required_without:category.id|string',
            'tags' => 'required|array|min:1',
            'tags.*.id' => 'sometimes|exists:tags,id',
            'tags.*.name' => 'sometimes|required_without:tags.*.id|string',
            
            'date' => 'required|date',
            'spent_time' => 'required|numeric',
            'notes' => 'nullable|string',
        ];
    }
}
