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
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName');
            $table->string('phoneNumber');
            $table->string('email');
            $table->enum('status', ['Đang công tác', 'Đình chỉ', 'Vắng', 'Thôi việc'])->default('Đang công tác');
            $table->integer('supervisor_id')->unsigned();
            $table->foreign('supervisor_id')->references('id')->on('supervisors');
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
        Schema::dropIfExists('teachers');
    }
};
