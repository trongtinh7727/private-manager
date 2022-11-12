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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('email', 30)->unique();
            $table->string('password', 30);
            $table->string('name', 50);
            $table->string('address')->default('');
            $table->date('birthday')->default('2003/01/01');
            $table->smallInteger('level')->comment('EmployeeLevelEnum')->index();
            $table->date('updated_at');
            $table->date('created_at');
            //foreign key -> store
            $table->foreignId('store_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
