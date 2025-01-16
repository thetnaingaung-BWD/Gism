<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('email');
            $table->bigInteger('TH_ph')->nullable();
            $table->bigInteger('MM_ph')->nullable();
            $table->text('HEC')->nullable();
            $table->integer('CON')->nullable();
            $table->integer('program_id')->nullable();
            $table->text('address')->nullable();
            $table->text('subject')->nullable();
            $table->longText('remark')->nullable();
            $table->text('mail_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
