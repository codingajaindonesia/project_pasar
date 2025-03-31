<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contents/categories/index', compact('categories'));
    }
    public function create()  {
        return view('contents/categories/_form');
    }
    public function store(Request $request) {
        try {
            $request->validate(
                [
                    'title' => 'required',
                    'description' => 'required',
                    'types' => 'required'
                ]
            );
            Category::create($request->all());
            return redirect()->route('category.index')->with('status', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal disimpan '.$e->getMessage());
        }
    

        
    }
    public function edit(Request $request, $id) {
        $category = Category::find($id);
        return view('contents/categories/_form', compact('category'));
    }

    public function update(Request $request, $id)  {
      try {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'types' => 'required'
            ]
        );
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('category.index')->with('status', 'Data berhasil diupdate');
      } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Data gagal diupdate '.$e->getMessage());
      } 
        
    }
    public function destroy(Request $request, $id) {
        try {
            $category = Category::find($id);
            $category->delete();
            return redirect()->route('category.index')->with('status', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal dihapus '.$e->getMessage());
        }
    }

}
