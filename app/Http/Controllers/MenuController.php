<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Display a listing of the menus
    public function index()
    {
            // Fetch and group menus by position
            $menus = Menu::all()->groupBy('position');
            $addlink=route('menus.create');

        return view('menus.index', compact('menus','addlink'));
    }

 // Show the form for creating a new menu or editing an existing one
 public function create($id = null)
 {
    $positions = Menu::all()->groupBy('position')->keys();

     $menu = $id ? Menu::findOrFail($id) : new Menu;
     return view('menus.form', compact('menu','positions'));
 }

 public function edit($id)
 {
     $menu = Menu::findOrFail($id);
     $positions = Menu::all()->groupBy('position')->keys();


     return view('menus.form', compact('menu', 'positions'));
 }

 // Store a newly created menu in storage
 public function store(Request $request)
 {
     $request->validate([
         'name' => 'required|string|max:255',
         'url' => 'required|url',
         'position' => 'nullable|string|max:255',
         'active' => 'required|boolean',
     ]);

     Menu::create($request->all());

     return redirect()->route('menus.index')
         ->with('success', 'Menu created successfully.');
 }

 // Update the specified menu in storage
 public function update(Request $request, $id)
 {
     $request->validate([
         'name' => 'required|string|max:255',
         'url' => 'required|url',
         'position' => 'nullable|string|max:255',
         'active' => 'required|boolean',
     ]);

     $menu = Menu::findOrFail($id);
     $menu->update($request->all());

     return redirect()->route('menus.index')
         ->with('success', 'Menu updated successfully.');
 }

    // Remove the specified menu from storage
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus.index')
            ->with('success', 'Menu deleted successfully.');
    }
}
