<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('unit_configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->integer('beds')->default(0);
            $table->integer('baths')->default(0);
            $table->integer('balconies')->default(0);
            $table->string('facing')->nullable();
            $table->decimal('unit_size', 10, 2)->default(0); // Unit size in square feet
            $table->string('floor_plan')->nullable(); // Floor plan image path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_configurations');
    }
};
