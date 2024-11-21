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
        Schema::create('customer_reference', function (Blueprint $table) {
            $table->bigIncrements('ref_id');
            $table->unsignedBigInteger('loan_id');
            $table->unsignedBigInteger('cust_id');
            $table->string('Name', 100);
            $table->text('Address');
            $table->string('City', 50);
            $table->integer('pincode');
            $table->string('State', 50);
            $table->string('Country', 50);
            $table->string('Phone', 20);
            $table->string('Mobile', 20);
            $table->string('Email', 100);
            $table->string('Relation_with_applicant', 200);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_reference');
    }
};
