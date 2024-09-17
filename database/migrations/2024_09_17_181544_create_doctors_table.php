<?php

use App\Models\Location;
use App\Models\Specialty;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default("feras");
            $table->foreignIdFor(Specialty::class, 'specialty_id')
                ->default(1)
                ->constrained();
            $table->foreignIdFor(Location::class, 'location_id')
                ->default(1)
                ->constrained();
            $table->string('address')->nullable();
            $table->double('visit_price')->nullable();
            $table->string('bio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};