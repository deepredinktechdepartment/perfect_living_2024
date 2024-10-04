<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Models\Themeoptions;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str; // For checking encrypted strings

class ThemeoptionsController extends Controller
{
    public function index()
    {
        try {
            $theme_options_data = Themeoptions::first();
            $pageTitle = "Theme Options";
            $addlink = isset($theme_options_data) && $theme_options_data->count() > 0 ? '' : url('theme_options/create');

            return view('themeoptions.theme_options_list', compact('pageTitle', 'theme_options_data', 'addlink'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching theme options: ' . $e->getMessage());
        }
    }

    public function create_theme_options()
    {
        $pageTitle = "Add New";
        return view('themeoptions.add_theme_options', compact('pageTitle'));
    }

    public function store_theme_options(Request $request)
    {
        try {
            $request->validate([
                'header_logo' => 'required|mimes:png,jpg,jpeg|max:512',
                'favicon' => 'sometimes|nullable|mimes:png,jpg,jpeg|max:512',
                'footer_logo' => 'sometimes|nullable|mimes:png,jpg,jpeg|max:512',
                'facebook_url' => 'nullable|url',
                'twitter_url' => 'nullable|url',
                'linkedin_url' => 'nullable|url',
                'instagram_url' => 'nullable|url',
                'pinterest_url' => 'nullable|url',
                'youtube_url' => 'nullable|url',
                'whatsapp_url' => 'nullable|url',
                'short_aboutus' => 'nullable|string|max:255',
            ]);

            $header_filename = $this->handleFileUpload($request, 'header_logo');
            $favicon_filename = $this->handleFileUpload($request, 'favicon');
            $footer_filename = $this->handleFileUpload($request, 'footer_logo');

            Themeoptions::create([
                'header_logo' => $header_filename,
                'favicon' => $favicon_filename,
                'footer_logo' => $footer_filename,
                'copyright' => $request->input('copyright', ''),
                'org_id' => auth()->user()->org_id ?? 0,
                'facebook_url' => $request->input('facebook_url') ?? null,
                'twitter_url' => $request->input('twitter_url') ?? null,
                'linkedin_url' => $request->input('linkedin_url') ?? null,
                'instagram_url' => $request->input('instagram_url') ?? null,
                'pinterest_url' => $request->input('pinterest_url') ?? null,
                'youtube_url' => $request->input('youtube_url') ?? null,
                'whatsapp_url' => $request->input('whatsapp_url') ?? null,
                'short_aboutus' => $request->input('short_aboutus') ?? null
            ]);

            return redirect('theme_options')->with('success', "Success! Details are added successfully");
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while storing theme options: ' . $e->getMessage());
        }
    }

    public function edit_theme_options($id)
    {
        try {
            // Check if the provided ID is encrypted
            if ($id) {
                // Decrypt the ID
                $id = Crypt::decrypt($id);
            } else {
                return redirect()->back()->with('error', 'Invalid ID format.');
            }

            // Find the theme options or throw a 404 error
            $theme_options_data = Themeoptions::findOrFail($id);
            $pageTitle = "Edit";

            return view('themeoptions.add_theme_options', compact('theme_options_data', 'pageTitle'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching theme options for editing: ' . $e->getMessage());
        }
    }

    public function update_theme_options(Request $request, $id)
    {
        try {
            $request->validate([
                'header_logo' => 'mimes:png,jpg,jpeg|max:512',
                'favicon' => 'sometimes|nullable|mimes:png,jpg,jpeg|max:512',
                'footer_logo' => 'sometimes|nullable|mimes:png,jpg,jpeg|max:512',
                'facebook_url' => 'nullable|url',
                'twitter_url' => 'nullable|url',
                'linkedin_url' => 'nullable|url',
                'instagram_url' => 'nullable|url',
                'pinterest_url' => 'nullable|url',
                'youtube_url' => 'nullable|url',
                'whatsapp_url' => 'nullable|url',
                'short_aboutus' => 'nullable|string|max:255'
            ]);

            // Check if ID is encrypted
            if ($request->id) {
                // Decrypt the ID
                $id = Crypt::decrypt($request->id);
            } else {
                return redirect()->back()->with('error', 'Invalid ID format.');
            }

            // Find the theme options or throw a 404 error
            $theme_options = Themeoptions::findOrFail($id);

            // Handle file uploads
            $header_filename = $this->handleFileUpload($request, 'header_logo', $theme_options->header_logo);
            $favicon_filename = $this->handleFileUpload($request, 'favicon', $theme_options->favicon);
            $footer_filename = $this->handleFileUpload($request, 'footer_logo', $theme_options->footer_logo);

            // Update theme options
            $theme_options->update([
                'header_logo' => $header_filename ?? null,
                'favicon' => $favicon_filename ?? null,
                'footer_logo' => $footer_filename ?? null,
                'copyright' => $request->input('copyright', '') ?? null,
                'facebook_url' => $request->input('facebook_url') ?? null,
                'twitter_url' => $request->input('twitter_url') ?? null,
                'linkedin_url' => $request->input('linkedin_url') ?? null,
                'instagram_url' => $request->input('instagram_url') ?? null,
                'pinterest_url' => $request->input('pinterest_url') ?? null,
                'youtube_url' => $request->input('youtube_url') ?? null,
                'whatsapp_url' => $request->input('whatsapp_url') ?? null,
                'short_aboutus' => $request->input('short_aboutus') ?? null,
            ]);

            return redirect('theme_options')->with('success', "Success! Details are updated successfully");
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating theme options: ' . $e->getMessage());
        }
    }

    /**
     * Check if a string is encrypted.
     *
     * @param  string  $value
     * @return bool
     */
    protected function isEncrypted($value)
    {
        // Assuming encrypted values are always 32 characters long and include base64 characters
        return Str::length($value) === 32 && preg_match('/^[a-zA-Z0-9\/\+]+={0,2}$/', $value);
    }

    public function delete_theme_options($id)
    {
        try {
            Themeoptions::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Success! Details are deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting theme options: ' . $e->getMessage());
        }
    }

    private function handleFileUpload(Request $request, $fieldName, $existingFilePath = null)
    {
        if ($request->hasFile($fieldName)) {
            $filename = uniqid() . '_' . time() . '.' . $request->file($fieldName)->extension();

            $destinationPath = storage_path('app/uploads');
            $db_destinationPath = 'storage/app/uploads';

            $request->file($fieldName)->move($destinationPath, $filename);

            return $db_destinationPath . '/' . $filename;
        }

        return $existingFilePath ?? null;
    }
}
