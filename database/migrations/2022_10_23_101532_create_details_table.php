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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->integer('entry_point');
            $table->integer('exit_point');
            $table->text('note');
            $table->date('updated_at');
            $table->date('created_at');
            $table->foreignId('employee_id')
                ->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('machine_id')
                ->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
};
