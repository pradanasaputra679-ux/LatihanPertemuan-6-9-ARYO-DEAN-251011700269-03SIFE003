<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf;

class ProjectPdfController extends Controller
{
    public function export()
    {
        $projects = Project::latest()->get();

        $pdf = Pdf::loadView('admin.projects.pdf', compact('projects'));

        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('laporan-project-myprofile.pdf');
    }
}
