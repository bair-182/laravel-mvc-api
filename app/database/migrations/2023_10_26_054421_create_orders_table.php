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
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('customer', 255)->comment('имя клиента');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('completed_at')->useCurrentOnUpdate()->nullable();

            $table->foreignId('warehouse_id')
                ->nullable()
                ->references('id')
                ->on('warehouses')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->enum('status',['active', 'completed', 'canceled'])->default('active');
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
