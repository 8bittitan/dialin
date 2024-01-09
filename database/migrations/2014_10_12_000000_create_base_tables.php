<?php

use App\Enums\FamilyUserRole;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('family_id')->nullable()->index();
            $table->string('role')->default(FamilyUserRole::Parent->value);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('correction_factor');
            $table->integer('target');
            $table->integer('insulin_carb_ratio');
            $table->integer('basal_insulin_dose');
            $table->float('weight');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->integer('glucose');
            $table->integer('carbs');
            $table->integer('timeframe');
            $table->float('insulin');
            $table->integer('ketones');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('families');
        Schema::dropIfExists('family_user');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('entries');
    }
};
