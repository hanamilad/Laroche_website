<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    protected $fillable = [
        'brand_name', 'tagline', 'description',
        'emails', 'phones', 'addresses',
        'social_links', 'quick_links',
        'seo', 'settings', 'contact_card_enabled', 'locale',
    ];

    protected $casts = [
        'emails' => 'array',
        'phones' => 'array',
        'addresses' => 'array',
        'social_links' => 'array',
        'quick_links' => 'array',
        'seo' => 'array',
        'settings' => 'array',
        'contact_card_enabled' => 'boolean',
    ];
}
