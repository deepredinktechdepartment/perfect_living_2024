<?php
namespace App\Http\Controllers;
use App\Models\Company; // Import the Company model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Exception;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $companies = Company::all();
            $addlink = route('companies.create');
            $pageTitle = "Builders List";
            return view('companies.index', compact('companies', 'addlink', 'pageTitle'));
        } catch (Exception $e) {
            Log::error('Error fetching companies list: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching the companies list.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $pageTitle = "Create New Builder";
            return view('companies.create', compact('pageTitle'));
        } catch (Exception $e) {
            Log::error('Error displaying company creation form: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while displaying the creation form.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|unique:companies,name',
                'address1' => 'required',
                'address2' => 'nullable',
                'about_builder' => 'nullable',
                'phone' => 'required',
                'website_url' => 'required|url',
            ]);

           // Add slug field
           $validatedData['slug'] = Str::slug($request->name) ?? null;

           // Create the company with the validated data and slug
           Company::create($validatedData);

            return redirect()->route('companies.index')->with('success', 'Company created successfully.');
        } catch (Exception $e) {
            Log::error('Error creating company: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating the company.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // You can add specific code to fetch and display the company details if needed
        } catch (Exception $e) {
            Log::error('Error displaying company: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while displaying the company details.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $company = Company::findOrFail($id);
            return view('companies.create', compact('company'));
        } catch (Exception $e) {
            Log::error('Error displaying company edit form: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while displaying the edit form.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => [
                    'required',
                    // Ensure the name is unique except for the current record
                    'unique:companies,name,' . $id,
                ],
                'address1' => 'required',
                'address2' => 'nullable',
                'about_builder' => 'nullable',
                'phone' => 'required',
                'website_url' => 'required|url',
            ]);

            // Find the company by ID or fail
            $company = Company::findOrFail($id);

            // Update the company with validated data

        //           // Add the slug field
        // $validatedData['slug'] = Str::slug($request->name) ?? null;

            $company->update($validatedData);

            // Redirect to the index page with a success message
            return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
        } catch (Exception $e) {
            // Log the error
            Log::error('Error updating company: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while updating the company.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $company = Company::findOrFail($id);
            $company->delete();

            return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error deleting company: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the company.');
        }
    }
}
