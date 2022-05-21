<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_instances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->string('damage');
            $table->string('notes');
            $table->string('status');
            $table->string('current_loan_ends_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_instances');
    }
};
