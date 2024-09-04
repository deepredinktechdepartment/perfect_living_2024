<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Logic to retrieve data can go here

        // Return the view
        return view('frontend.projects.project'); // this corresponds to resources/views/projects/index.blade.php
    }
}
