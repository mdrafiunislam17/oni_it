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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('order_number')->unique();

            $table->enum('status', ['pending', 'confirmed', 'delivered', 'cancelled'])->default('pending');

            $table->enum('payment_method', ['bkash', 'nagad', 'cash_on_hand'])->default('bkash');
            $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid');

            $table->string('shipping_charge');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('post_code')->nullable();
            $table->text('address1');
            $table->text('address2')->nullable();

            $table->decimal('coupon', 10, 2)->nullable();
            $table->decimal('sub_total', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
