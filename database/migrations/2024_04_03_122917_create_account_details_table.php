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
        Schema::create('account_details', function (Blueprint $table) {
            $table->bigIncrements('account_id');
            $table->unsignedBigInteger('loan_id');
            $table->unsignedBigInteger('cust_id');
            $table->string('bank_name', 50);
            $table->text('branch_address');
            $table->string('account_holder_name', 200);
            $table->string('account_number', 200);
            $table->string('account_oprete_since', 200);
            $table->string('ifsc_code', 200);
            $table->string('micr_code', 200);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_details');
    }
};
