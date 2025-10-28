<?php

namespace App\Filament\Resources\SiteInfos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\KeyValue;
use Filament\Schemas\Schema;

class SiteInfoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            // 🟩 القسم الأساسي - معلومات عامة
            TextInput::make('brand_name')
                ->label('اسم البراند')
                ->required(),

            TextInput::make('tagline')
                ->label('سطر الوصف (Tagline)')
                ->nullable(),

            Textarea::make('description')
                ->label('وصف الموقع')
                ->rows(4)
                ->nullable(),

            // 🟦 القسم 1 - الإيميلات
            Repeater::make('emails')
                ->label('عناوين البريد الإلكتروني')
                ->schema([
                    Select::make('type')
                        ->label('النوع')
                        ->options([
                            'support' => 'دعم فني',
                            'sales' => 'مبيعات',
                            'info' => 'معلومات',
                            'custom' => 'مخصص',
                        ])
                        ->default('info')
                        ->required(),

                    TextInput::make('email')
                        ->label('البريد الإلكتروني')
                        ->email()
                        ->required(),

                    TextInput::make('label')
                        ->label('التسمية الظاهرة (مثلاً: تواصل معنا)')
                        ->nullable(),
                ])
                ->reorderable()
                ->columns(3)
                ->nullable(),

            // 🟨 القسم 2 - الهواتف
            Repeater::make('phones')
                ->label('أرقام الهواتف')
                ->schema([
                    Select::make('type')
                        ->label('النوع')
                        ->options([
                            'phone' => 'هاتف',
                            'whatsapp' => 'واتساب',
                            'fax' => 'فاكس',
                        ])
                        ->required()
                        ->default('phone'),

                    TextInput::make('number')
                        ->label('الرقم')
                        ->tel()
                        ->required(),

                    TextInput::make('label')
                        ->label('التسمية (مثلاً: خدمة العملاء)')
                        ->nullable(),

                    Select::make('icon')
                        ->label('الأيقونة')
                        ->options([
                            'phone' => '📞 هاتف',
                            'whatsapp' => '💬 واتساب',
                            'fax' => '📠 فاكس',
                        ])
                        ->default('phone'),

                    Toggle::make('preferred')
                        ->label('الأساسي')
                        ->default(false),
                ])
                ->reorderable()
                ->columns(3)
                ->nullable(),

            // 🟧 القسم 3 - العناوين
            Repeater::make('addresses')
                ->label('العناوين')
                ->schema([
                    Select::make('type')
                        ->label('النوع')
                        ->options([
                            'main' => 'الرئيسي',
                            'branch' => 'فرع',
                            'warehouse' => 'مخزن',
                        ])
                        ->default('main'),

                    TextInput::make('city')->label('المدينة')->nullable(),
                    TextInput::make('country')->label('الدولة')->nullable(),
                    Textarea::make('address_line')->label('العنوان الكامل')->rows(2)->nullable(),
                    TextInput::make('lat')->label('Latitude')->numeric()->nullable(),
                    TextInput::make('lng')->label('Longitude')->numeric()->nullable(),
                ])
                ->reorderable()
                ->columns(3)
                ->nullable(),

            // 🟩 القسم 4 - روابط السوشيال
            KeyValue::make('social_links')
                ->label('روابط التواصل الاجتماعي')
                ->keyLabel('المنصة (facebook, instagram, twitter...)')
                ->valueLabel('الرابط الكامل')
                ->addButtonLabel('إضافة منصة جديدة')
                ->reorderable()
                ->nullable(),

            // 🟦 القسم 5 - روابط سريعة للفوتر
            Repeater::make('quick_links')
                ->label('روابط سريعة')
                ->schema([
                    TextInput::make('title')
                        ->label('العنوان')
                        ->required(),
                    TextInput::make('url')
                        ->label('الرابط')
                        ->url()
                        ->required(),
                ])
                ->reorderable()
                ->columns(2)
                ->nullable(),

            // 🟨 القسم 6 - إعدادات SEO
            KeyValue::make('seo')
                ->label('إعدادات تحسين محركات البحث (SEO)')
                ->keyLabel('المفتاح (meta_title, meta_description, ...)')
                ->valueLabel('القيمة')
                ->nullable(),

            // 🟪 القسم 7 - إعدادات عامة
            KeyValue::make('settings')
                ->label('إعدادات عامة')
                ->keyLabel('الإعداد (timezone, currency, analytics_id, ...)')
                ->valueLabel('القيمة')
                ->nullable(),

            // 🟥 الإعدادات النهائية
            Toggle::make('contact_card_enabled')
                ->label('تفعيل بطاقة التواصل')
                ->default(true),

            TextInput::make('locale')
                ->label('اللغة الافتراضية')
                ->default('ar')
                ->maxLength(10),
        ]);
    }
}
