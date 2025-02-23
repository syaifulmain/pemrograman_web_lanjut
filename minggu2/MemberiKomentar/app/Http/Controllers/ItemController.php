<?php

namespace App\Http\Controllers;

use App\Models\Item; // Import model Item
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all(); // Mengambil semua data dari model Item
        return view('items.index', compact('items')); // Mengirim data ke view
    }

    public function create()
    {
        return view('items.create'); // Menampilkan view create
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]); // Validasi inputan

         Item::create($request->only(['name', 'description'])); // Menambahkan data ke database
        return redirect()->route('items.index')->with('success', 'Item added successfully.'); // Redirect ke halaman index
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item')); // Menampilkan view show
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item')); // Menampilkan view edit
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]); // Validasi inputan

         $item->update($request->only(['name', 'description'])); // Mengupdate data ke database
        return redirect()->route('items.index')->with('success', 'Item updated successfully.'); // Redirect ke halaman index
    }

    public function destroy(Item $item)
    {
       $item->delete(); // Menghapus data dari database
       return redirect()->route('items.index')->with('success', 'Item deleted successfully.'); // Redirect ke halaman index
    }
}
