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
        Schema::table('search_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // To store the user ID
            $table->string('device')->nullable(); // To store device type (desktop or mobile)
            $table->string('tab')->nullable(); // To store the tab from which the search was made
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_logs');
    }
};
