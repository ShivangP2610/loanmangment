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
        Schema::create('proprietor_details', function (Blueprint $table) {
            $table->bigIncrements('proprietor_id');
            $table->unsignedBigInteger('loan_id');
            $table->unsignedBigInteger('cust_id');
            $table->string('title', 20);
            $table->text('proprietor_name', 200);
            $table->enum('relation_with_applicant', ['Partner', 'Director', 'Proprietor', 'Promoter', 'Karta', 'Benificiary', 'Others']);
            $table->enum('applying_as_co_borrower', ['Yes', 'No']);
            $table->string('father_or_spouse_name', 50);
            $table->string('shareholding_with_cust_entity', 20);
            $table->date('Date_of_Birth');
            $table->enum('Gender', ['Male', 'Female' , 'Other']);
            $table->enum('Marital_Status', ['Married', 'UnMarried']);
            $table->string('Citizenship', 20);
            $table->enum('Residential_Status', ['Resident Individual', 'Non Resident India','Foreign National','Person of Indian Origin']);
            $table->enum('Occupation_type', ['Service', 'Business','Not categorized','Others']);
            $table->enum('Different_from_Permanent_addess', ['Yes', 'No']);
            $table->text('Current_Residence_Address');
            $table->string('Current_Landmark', 100);
            $table->string('Current_City', 100);
            $table->string('Current_District', 100);
            $table->string('Current_State', 100);
            $table->integer('Current_pincode');
            $table->string('Current_State_code', 100);
            $table->string('Current_Country_Code', 100);
            $table->enum('Residence_Type', ['Rented', 'Owned','Parental','Other']);
            $table->string('Current_Residences_years', 50);
            $table->enum('Address_as_per_proof', ['Yes', 'No']);
            $table->text('Permanent_Residence_Address');
            $table->string('Permanent_Landmark', 100);
            $table->string('Permanent_City', 100);
            $table->string('Permanent_District', 100);
            $table->string('Permanent_State', 100);
            $table->integer('Permanent_pincode');
            $table->string('Permanent_State_code', 100);
            $table->string('Permanent_Country_Code', 100);
            $table->integer('proprietor_Mobile_no');
            $table->string('proprietor_email', 50);
            $table->string('proprietor_pannumber', 50);
            $table->enum('proprietor_Form_60', ['yes', 'no']);
            $table->string('proprietor_adharnumber', 50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proprietor_details');
    }
};
