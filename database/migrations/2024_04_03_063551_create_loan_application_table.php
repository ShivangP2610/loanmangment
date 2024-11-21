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
        Schema::create('loan_application', function (Blueprint $table) {
            $table->bigIncrements('loan_id');
            $table->date('date');
            $table->unsignedBigInteger('customer_id');
            $table->string('Prospect_No', 20);
            $table->string('Months', 10);
            $table->string('Loan_Amount', 50);
            $table->string('Purpose', 50);
            $table->string('Application_Type', 50);
            $table->string('Account_Type', 50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_application');
    }
};
