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
        Schema::create('supervisors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName');
            $table->string('phoneNumber');
            $table->string('email');
            $table->enum('status', ['Bình thường', 'Đình chỉ', 'Vắng', 'Thôi việc'])->default('Bình thường');
            $table->enum('shift', ['Sáng', 'Chiều', 'Tối'])->default('Sáng');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins');
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
        Schema::dropIfExists('supervisors');
    }
};
