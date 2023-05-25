<?php

use App\Models\User;
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
        // Schema::disableForeignKeyConstraints();

        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignId('preference_categories_id')->constrained();
            $table->timestamps();
        });
        // Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferences');
    }
};
