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
        Schema::create('customer_details', function (Blueprint $table) {
        $table->bigIncrements('cust_id');
        $table->unsignedBigInteger('loan_id');
        $table->string('cust_name', 100);
        $table->string('cust_entity_type', 100);
        $table->date('Date_of_Incorporation');
        $table->text('Principal_office_address');
        $table->string('Principal_City', 50);
        $table->string('Principal_District', 50);
        $table->string('Principal_State', 50);
        $table->integer('Principal_pincode');
        $table->string('Principal_State_code', 5);
        $table->string('Principal_Country_Code', 5);
        $table->text('Permanent_office_address');
        $table->string('Permanent_City', 50);
        $table->string('Permanent_District', 50);
        $table->string('Permanent_State', 50);
        $table->integer('Permanent_pincode');
        $table->string('Permanent_State_code', 5);
        $table->string('Permanent_Country_Code', 5);
        $table->string('Place_of_incorporation', 100);
        $table->integer('cust_Telephone');
        $table->string('cust_email', 50);
        $table->string('Type_of_Industry', 40);
        $table->string('Segment', 40);
        $table->string('cust_gst', 20);
        $table->string('cust_pannumber', 40);
        $table->enum('Form_60', ['yes', 'no']);
        $table->string('Overall_Business_Vintage', 50);
        $table->timestamps();
        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_details');
    }
};
