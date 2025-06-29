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
        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('title');
            $table->foreignId('salary_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('company');
            $table->date('last_day');
            $table->text('description');
            $table->string('image');
            $table->integer('publish')->default(1);
           $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->dropForeign('vacancies_category_id_foreign');
            $table->dropForeign('vacancies_salary_id_foreign');
            $table->dropForeign('vacancies_user_id_foreign');
            $table->dropColumn('title');
            $table->dropColumn('salary_id');
            $table->dropColumn('category_id');
            $table->dropColumn('company');
            $table->dropColumn('last_day');
            $table->dropColumn('description');
            $table->dropColumn('image');
            $table->dropColumn('publish');
            $table->dropColumn('user_id');
        });
    }
};
