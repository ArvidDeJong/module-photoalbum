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
        Schema::create('photoalbums', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('host')->nullable();
            $table->integer('pid')->nullable();
            $table->string('locale')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->integer('sort')->default(1);
            $table->string('title')->nullable();
            $table->string('title_2')->nullable();
            $table->string('title_3')->nullable();
            $table->string('slug')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('tags')->nullable();
            $table->text('summary')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('homepage')->default(0);
            $table->boolean('locked')->default(0);   // Used when text is locked in website
            $table->boolean('fullpage')->default(0);   // Can be used as standalone page
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photoalbums');
    }
};
