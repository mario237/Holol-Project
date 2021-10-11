<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToClientFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_files', function (Blueprint $table) {
            $table->dropColumn('created_at', 'updated_at');
        });
        Schema::table('client_files', function (Blueprint $table) {
            $table->string('type')->nullable();
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
        Schema::table('client_files', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
