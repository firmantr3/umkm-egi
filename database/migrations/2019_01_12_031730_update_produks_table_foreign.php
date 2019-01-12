<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProduksTableForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->foreign('kategori_id')
                ->references('id')
                ->on('kategoris')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->foreign('kategori_id')
                ->references('id')
                ->on('kategoris');
        });
    }
}
