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
        Schema::create('partners_details', function (Blueprint $table) {
            $table->bigIncrements('co_cust_id');
            $table->unsignedBigInteger('loan_id');
            $table->unsignedBigInteger('cust_id');
            $table->text('partners_name', 200);
            $table->date('Date_of_Birth');
            $table->string('partners_pannumber', 50);
            $table->text('partners_Residence_Address');
            $table->integer('partners_Mobile_no');
            $table->string('partners_workexp', 20);
            $table->string('shareholding_with_cust_entity', 20);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners_details');
    }
};
