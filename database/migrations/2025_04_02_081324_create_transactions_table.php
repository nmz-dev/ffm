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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id'); // Reference to the user
            $table->string('type'); // Type of transaction (e.g., credit, debit)
            $table->decimal('amount', 15, 2); // Transaction amount
            $table->string('status'); // Transaction status (e.g., pending, completed)
            $table->string('description')->nullable(); // Optional description of the transaction
            $table->timestamp('transaction_date')->nullable(); // Date of the transaction
            $table->softDeletes(); // Soft delete functionality
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
