<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('site_infos', function (Blueprint $table) {
        $table->id();
        $table->string('brand_name');
        $table->string('tagline')->nullable();
        $table->text('description')->nullable();

        $table->json('emails')->nullable();       // [ {type, email, label}, ... ]
        $table->json('phones')->nullable();       // [ {type, number, label, preferred}, ... ]
        $table->json('addresses')->nullable();    // [ {type, city, country, address_line, lat, lng}, ... ]
        $table->json('social_links')->nullable(); // { facebook, instagram, twitter, linkedin, youtube, ... }
        $table->json('quick_links')->nullable();  // [ {title, url}, ... ]
        $table->json('seo')->nullable();          // { meta_title, meta_description }
        $table->json('settings')->nullable();     // { timezone, currency, analytics_id, ... }

        $table->boolean('contact_card_enabled')->default(true);
        $table->string('locale', 10)->default('ar');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_infos');
    }
};
