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
        Schema::create('access_code_type', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_code_type');
    }
};

//php artisan make:model AccessCodeTypes
//php artisan make:model ValidateCodesAccess

//php artisan make:controller AccessCodeTypesController
//php artisan make:controller ValidateCodesAccessController
