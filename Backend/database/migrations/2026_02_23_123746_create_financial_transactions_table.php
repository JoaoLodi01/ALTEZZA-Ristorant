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
        Schema::create('financial_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('module', 20);
            $table->string('type', 10);
            $table->string('origin_type')->nullable();
            $table->unsignedBigInteger('origin_id')->nullable();
            $table->decimal('amount_original', 12, 2)->default(0);
            $table->decimal('amount_interest', 12, 2)->default(0);
            $table->decimal('amount_fine', 12, 2)->default(0);
            $table->decimal('amount_fees', 12, 2)->default(0);
            $table->decimal('amount_discount', 12, 2)->default(0);
            $table->decimal('amount_addition', 12, 2)->default(0);
            $table->decimal('amount_liquid', 12, 2)->default(0);
            $table->integer('installment_number')->nullable();
            $table->integer('installment_quantity')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreignId('payment_method_id')->nullable()->constrained()->nullOnDelete();
            $table->date('due_date')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->string('status', 20)->default('pending');
            $table->timestamp('canceled_at')->nullable();
            $table->unsignedBigInteger('user_created')->nullable();
            $table->unsignedBigInteger('user_canceled')->nullable();
            $table->unsignedBigInteger('user_paid')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->timestamps();
            
            $table->index(['company_id', 'module']);
            $table->index(['company_id', 'status']);
            $table->index(['due_date']);
            $table->index(['origin_type', 'origin_id']);
            $table->index(['group_id']);
            $table->index(['parent_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('financial_transactions');
    }
};
