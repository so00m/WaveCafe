<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages= $this->errMsg();

        $data =$request->validate([
            'name'=>'required|max:100',
             ] , $messages);

        Category::create($data);
        return redirect()->route('addCategory')->with('success', 'New category added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $Category = Category::findOrFail($id);
        return view('admin.showCategory' , compact('Category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.editCategory' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->errMsg();
        $data =$request->validate([
            'name'=>'required|max:100',
            ] , $messages);

        Category::where('id',$id)->update($data);
        return redirect()->route('categories')->with('success', 'Category updated successfully!');

    }



    public function destroy(Request $request)
    {
        $id=$request->id;
        $category = Category::find($id);

        if ($category->beverages()->count() > 0) {
            return redirect()->route('categories')->with('error','Not allowed to delete this , because it contains items underneath it');
        }

        $category->delete();
        return redirect()->route('categories')->with('success', 'Category deleted successfully!');
    }



    public function errMsg()
        {
            return [
               'name' => 'category name is required.',
            ];
        }

}
