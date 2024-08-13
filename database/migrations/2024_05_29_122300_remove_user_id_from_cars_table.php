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
        Schema::table('cars', function (Blueprint $table) {
             // Menghapus foreign key constraint
             $table->dropForeign(['user_id']);
             // Menghapus kolom user_id jika diinginkan
             $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
               // Menambahkan kembali kolom user_id
               $table->unsignedBigInteger('user_id');
               // Menambahkan kembali foreign key constraint
               $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
        });
    }
};
