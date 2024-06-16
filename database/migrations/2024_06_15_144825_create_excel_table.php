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
        Schema::create('excel', function (Blueprint $table) {
            $table->id('uid');
            $table->bigInteger('id');
            $table->string('scheme_code');
            $table->string('scheme_name');
            $table->string('central_state_scheme');
            $table->string('fin_year');
            $table->bigInteger('state_disbursement')->nullable();
            $table->bigInteger('central_disbursement')->nullable();;
            $table->bigInteger('total_disbursement');
            $table->timestamps();          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excel');
    }
};
