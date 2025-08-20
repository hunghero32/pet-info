<?php
// app/Http/Controllers/PetPdfController.php
namespace App\Http\Controllers;

use App\Models\Pet;
use Barryvdh\DomPDF\Facade\Pdf;

class PetPdfController extends Controller
{
    public function export(Pet $pet)
    {
        $pdf = Pdf::loadView('pets.pdf', compact('pet'))
                  ->setPaper('a6', 'landscape'); // Kích thước thẻ nhỏ (A6 ngang)

        return $pdf->download("pet-{$pet->id}.pdf");
    }
}
