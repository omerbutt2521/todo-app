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
        Schema::table('fetch_users', function (Blueprint $table) {
            $table->string('phone');
            $table->string('website');
            $table->string('company_name');
            $table->string('bs');
            $table->string('address');
            $table->string('suite');
            $table->string('city');
            $table->string('zipcode');
            $table->string('lat');
            $table->string('lng');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fetch_users', function (Blueprint $table) {
            //
        });
    }
};
