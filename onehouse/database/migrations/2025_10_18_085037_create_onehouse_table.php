<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();
            $table->timestamps();
        });

        Schema::create('makers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('sales')->nullable();
            $table->string('option')->nullable();
            $table->integer('star');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('tag');
        });

        Schema::create('makers_feature', function (Blueprint $table) {
            $table->foreignId('maker_id')->constrained()->cascadeOnDelete();
            $table->foreignId('feature_id')->constrained()->cascadeOnDelete();
            $table->primary(['maker_id', 'feature_id']);
        });

        Schema::create('loan_simulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $table->bigInteger('loan');
            $table->decimal('rate', 5, 2);
            $table->integer('loan_term');
            $table->integer('age');
            $table->bigInteger('income');
            $table->bigInteger('expense');
            $table->timestamps();
        });
        Schema::create('floors', function (Blueprint $table) {
            $table->id();
            $table->integer('floor');
        });
        Schema::create('landlogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $table->string('address');
            $table->decimal('landarea', 5, 2);
            $table->unsignedSmallInteger('far');
            $table->unsignedSmallInteger('bcr');
            $table->foreignId('floor_id')->constrained()->cascadeOnDelete();
            $table->integer('builable_area');
            $table->bigInteger('range');
        });

        Schema::create('phases', function (Blueprint $table) {
            $table->id();
            $table->integer('phase')->nullable();
            $table->string('list');
        });
        Schema::create('checklists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $table->foreignId('phase_id')->constrained()->cascadeOnDelete();
            $table->boolean('checked')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checklists');
        Schema::dropIfExists('phases');
        Schema::dropIfExists('floors');
        Schema::dropIfExists('landlogs');
        Schema::dropIfExists('loan_simulations');
        Schema::dropIfExists('makers_feature');
        Schema::dropIfExists('features');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('makers');
        Schema::dropIfExists('profiles');
    }
};
