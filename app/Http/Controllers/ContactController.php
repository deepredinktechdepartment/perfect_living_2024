<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    // Display contact form
    public function index()
    {
        try {
            $pageTitle="Contact us";
            return view('frontend.contact.index',compact('pageTitle'));
        } catch (\Exception $e) {
            Log::error('Error displaying contact form: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to display the contact form.');
        }
    }

    // Store form data
    public function store(Request $request)
    {

   
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'country_code' => 'required',
            'message' => 'required|string',
        ]);

        try {
            // Store the contact data
            Contact::create($validated);

            // Redirect with success message
            return redirect()->back()->with('success', 'Thank you for contacting us!');
        } catch (Exception $e) {
            // Handle the error and show error message
            return redirect()->back()->with('error', 'An error occurred while sending your message. Please try again.');
        }
    }

    // Admin side: display all contact inquiries
    public function adminIndex()
    {
        try {
            $contacts = Contact::latest()->paginate(10);
            $pageTitle="Contact Inquiries";
            return view('contacts.index', compact('contacts','pageTitle'));
        } catch (\Exception $e) {
            Log::error('Error displaying contacts in admin: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch contact inquiries. Please try again later.');
        }
    }

    // Admin side: show single contact
    public function show($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            return view('contacts.show', compact('contact'));
        } catch (\Exception $e) {
            Log::error('Error displaying contact details: ' . $e->getMessage());
            return redirect()->route('contacts.index')->with('error', 'Unable to display contact details.');
        }
    }

    // Admin side: delete contact
    public function destroy($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully');
        } catch (\Exception $e) {

            return redirect()->route('contacts.index')->with('error', 'Unable to delete the contact. Please try again later.');
        }
    }
}
