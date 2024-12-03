<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FormOffice;
use Illuminate\Http\Request; 


class LoanController extends Controller
{
    public function index()
    { 
        // dd('fhgfgfdgghn');
        // Fetch all loans to populate the dropdown
        $loans = FormOffice::all();
// dd($loans);
        // Return the home view with the loans data
        return view('home', compact('loans'));
    }

    /**
     * Handle loan selection and fetch associated details
     */
    public function selectLoan($loanId)
    {
        // Find the loan by ID
        $loan = FormOffice::find($loanId);

        // If the loan does not exist, return an error response
        if (!$loan) {
            return response()->json(['error' => 'Loan not found'], 404);
        }

        // Fetch the associated customer (assuming one-to-one or related model)
        $customer = $loan->customer; // Adjust based on your actual relationship

        // If no customer is found, handle gracefully
        if (!$customer) {
            return response()->json(['error' => 'Customer not found for the selected loan'], 404);
        }

        // Save selected loan and customer details into the session
        session([
            'loan_id' => $loan->loan_id,
            'loan_application_number' => $loan->application_number, // Assuming this column exists
            'customer_id' => $customer->id,
            'customer_name' => $customer->name,
        ]);

        // Return loan and customer details as JSON
        return response()->json([
            'application_number' => $loan->application_number,
            'customer_id' => $customer->id,
            'customer_name' => $customer->name,
        ]);
    }

    /**
     * Clear session data for a new loan application
     */
    public function clearSession()
    {
        // Clear specific session variables related to the loan
        session()->forget([
            'loan_id',
            'loan_application_number',
            'customer_id',
            'customer_name',
        ]);

        // Return success response
        return response()->json(['success' => true]);
    }

    /**
     * Save the Loan Application Data
     */
    public function save(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'application_number' => 'required|string|max:255',
            'lon_id' => 'required|exists:loans,loan_id',
            'customer_id' => 'required|exists:customers,id',
        ]);

        // Logic to save the loan application (adjust as per your DB schema)
        $loan = FormOffice::find($validated['lon_id']);
        $loan->application_number = $validated['application_number'];
        $loan->customer_id = $validated['customer_id']; // Assuming customer_id is a column in loans table
        $loan->save();

        // Clear the session after saving
        session()->forget([
            'loan_id',
            'loan_application_number',
            'customer_id',
            'customer_name',
        ]);

        // Redirect back with success message
        return redirect()->route('loan.dashboard')->with('success', 'Loan application saved successfully!');
    }

}
