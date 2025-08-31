<?php

use App\Models\Tactic;
use App\Models\Week;
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
        Schema::create('week_tactic', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Week::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tactic::class)->constrained()->cascadeOnDelete();
            $table->boolean('completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('week_tactic');
    }
};
