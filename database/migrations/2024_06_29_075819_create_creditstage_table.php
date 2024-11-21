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
        Schema::create('creditstage', function (Blueprint $table) {
            $table->bigIncrements('credit_id');
            $table->unsignedBigInteger('loan_id');
            $table->unsignedBigInteger('cust__id');
            $table->string('requested_amount', 20);
            $table->string('requested_tenure', 10);
            $table->string('sanctioned_amount', 50);
            $table->string('maximum_sanctioned_amount', 50);
            $table->string('sanctioned_tenure', 50);
            $table->string('maximum_sanctioned_tenure', 50);
            $table->string('sanctionedInterest', 50);
            $table->string('policyrate', 50);
            $table->string('applicable_rate', 50);
            $table->string('application', 50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creditstage');
    }
};
