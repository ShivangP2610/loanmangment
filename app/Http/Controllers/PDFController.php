<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Facades\Pdf;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

// class PDFController extends Controller
// {
//     public function generatePDF($id)
//     {
//         // Fetch data or use mock data
//         $data = [
//             'ckycNo' => '1234567789',
//             'dateOfApplication' => 'hdjkdjkdkjkjd',
//             'customerId' => '4567890',
//             'prospectNo' => '5461235',
//             'tenure' => '36',
//             'loanAmount' => '46513',
//             'purpose' => 'kdkdlk',
//             'applicationType' => 'New',
//             'accountType' => 'New', // Assuming this is the default option
//         ];
        
//         // Load the view with the data
//         $pdf = PDF::loadView('pdfview1', $data);

//         // Optionally, customize the PDF here (e.g., set paper size, orientation, etc.)

//         // Download the PDF
//         return $pdf->download('pdfview1.pdf');
//     }
// }
class PDFController extends Controller
{
    public function generatePDF()
    {
        // Fetch data or use mock data
        $data = [
            'ckycNo' => '1234567789',
            'dateOfApplication' => 'hdjkdjkdkjkjd',
            'customerId' => '4567890',
            'prospectNo' => '5461235',
            'tenure' => '36',
            'loanAmount' => '46513',
            'purpose' => 'kdkdlk',
            'applicationType' => 'New',
            'accountType' => 'New', // Assuming this is the default option
        ];

        // Load the view with the data
        $html = View::make('pdfview1', $data)->render();
        
        // Setup Dompdf
        $dompdf = new Dompdf();
          
    
        // Load HTML content
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        // $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Stream the generated PDF back to the user
        return $dompdf->stream('pdfview1.pdf');
    }
}