<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContentRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content_type'  => ['required', Rule::in(['blog','article','quote',]),],
            'title'         => ['required','string','max:255',],
            'slug'          => ['nullable', 'string', 'max:255', Rule::unique('contents', 'slug')->ignore($this->route('content')),],
            'category_id'   => ['nullable','integer','exists:categories,id',],
            'tags'          => ['nullable','array',],
            'tags.*'        => ['integer','exists:tags,id',],
            'excerpt'       => ['nullable','string','max:1000',],
            'content'       => ['nullable','string',],
            'featured_image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120',],
            'quote_author'  => ['nullable','string','max:255','required_if:content_type,quote',],
            'status'        => ['required',Rule::in(['draft','published','scheduled',]),],
            'published_at'  => ['nullable','date',],
            'is_featured'   => ['nullable','boolean',],

            /*
             * SEO
             */
            'meta_title'    => ['nullable','string','max:255',],
            'meta_description' => ['nullable','string','max:500',],
            'meta_keywords' => ['nullable','string','max:1000',],
            'canonical_url' => ['nullable','url','max:2048',],
            'og_title'      => ['nullable','string','max:255',],
            'og_description' => ['nullable','string','max:500',],
            'og_image'      => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120',],
            'twitter_title' => ['nullable','string','max:255',],
            'twitter_description' => ['nullable','string','max:500',],
            'twitter_image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120',],
            'robots'        => ['nullable','string','max:100',],
        ];
    }

    public function messages(): array
    {
        return [
            'content_type.required'     => 'Please select a content type.',
            'title.required'            => 'Content title is required.',
            'slug.unique'               => 'This slug is already in use.',
            'category_id.exists'        => 'The selected category is invalid.',
            'tags.*.exists'             => 'One or more selected tags are invalid.',
            'featured_image.image'      => 'The featured image must be a valid image.',
            'featured_image.mimes'      => 'Featured image must be JPG, JPEG, PNG or WEBP.',
            'featured_image.max'        => 'Featured image cannot exceed 5MB.',
            'quote_author.required_if'  => 'Quote author is required for quote content.',
            'og_image.image'            => 'The OG image must be a valid image.',
            'twitter_image.image'       => 'The Twitter image must be a valid image.',
        ];
    }
}
