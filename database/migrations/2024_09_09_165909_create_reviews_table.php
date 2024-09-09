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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Assuming reviews are linked to users
            $table->unsignedBigInteger('product_id'); // If reviews are linked to products/services
            $table->tinyInteger('star_rating')->unsigned(); // 1-5 star rating
            $table->text('review'); // User's review text
            $table->timestamp('reviewed_on')->nullable(); // Date when the review was given
            $table->ipAddress('ip_address'); // IP address of the reviewer
            $table->boolean('approval_status')->default(false); // Approval status (false=not approved, true=approved)
            $table->unsignedBigInteger('approved_by')->nullable(); // ID of admin who approved the review
            $table->timestamp('approved_on')->nullable(); // Date when the review was approved
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('approved_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
