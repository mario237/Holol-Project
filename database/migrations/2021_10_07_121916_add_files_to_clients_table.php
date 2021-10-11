<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilesToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // صورة الهوية
        // صورة بطاقة العائلة
        // تعريف بالراتب
        // كشف حساب اخر 3 شهور مختوم من البنك
        // صورة الصك
        // صورة رخصة البناء
        // صورة هوية المالك
        Schema::table('clients', function (Blueprint $table) {
            $table->string('identity')->nullable();
            $table->string('family_identity')->nullable();
            $table->string('salary_identity')->nullable();
            $table->string('account_statement')->nullable();
            $table->string('instrument')->nullable();
            $table->string('construction_license')->nullable();
            $table->string('owner_identity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn(
                'identity',
                'family_identity',
                'salary_identity',
                'account_statement',
                'instrument',
                'construction_license',
                'owner_identity',
            );
        });
    }
}
