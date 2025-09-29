<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class HeroSection extends Model
{
    protected $table = 'hero_sections';

    protected $fillable = [
        'section_key',
        'title',
        'subtitle',
        'body',
        'image_path',
        'image_alt',
        'image_position',
        'cta_text',
        'cta_url',
        'display_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
    protected static function booted()
    {
        // عند الحذف
        static::deleting(function ($hero) {
            if ($hero->image_path && Storage::disk('public')->exists($hero->image_path)) {
                Storage::disk('public')->delete($hero->image_path);
            }
        });

        // عند التحديث (لو المستخدم غير الصورة)
        static::updating(function ($hero) {
            if ($hero->isDirty('image_path')) {
                $oldImage = $hero->getOriginal('image_path');
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
    }
}
