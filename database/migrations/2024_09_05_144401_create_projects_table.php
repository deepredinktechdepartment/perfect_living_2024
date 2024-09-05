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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('site_address');
            $table->string('logo')->nullable();
            $table->string('website_url')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('master_plan_layout')->nullable();
            $table->text('about_project')->nullable();
            $table->json('elevation_pictures')->nullable(); // To store multiple image paths
            $table->string('enquiry_form_url')->nullable(); // URL for enquiry form
            $table->json('map_collections')->nullable(); // To store map collection data
            $table->json('map_badges')->nullable(); // To store map badge data
            $table->enum('project_type', ['Standalone Villa', 'Standalone Apartment', 'Villa Gated Community', 'Apartment Gated Community', 'Commercial Space', 'Retail Space']);
            $table->integer('no_of_acres')->default(0);
            $table->integer('no_of_towers')->default(0);
            $table->integer('no_of_units')->default(0);
            $table->decimal('price_per_sft', 10, 2)->default(0);
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
        Schema::dropIfExists('projects');
    }
};
