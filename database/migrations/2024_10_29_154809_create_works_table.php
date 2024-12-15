<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('work_title', 255);
            $table->string('work_company', 255);
            $table->string('work_city', 255);
            $table->date('work_start');
            $table->date('work_end')->nullable(); // Aggiunto nullable nel caso in cui non sia ancora terminato
            $table->boolean('work_present')->default(0);
            $table->boolean('is_work')->default(0);
            $table->boolean('is_study')->default(0);
            $table->mediumText('work_explained');
            $table->string('work_logo')->nullable();
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
        Schema::dropIfExists('works');
    }
}
