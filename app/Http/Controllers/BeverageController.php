<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beverage;
use App\Traits\UploadFile;
use App\Models\Category;

class BeverageController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beverages = Beverage::all();
        return view('admin.beverages', compact('beverages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.addBeverage', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages= $this->errMsg();

        $data =$request->validate([
            'title'=>'required|max:100',
            'content'=>'required|max:300',
            'price'=>'required',
            'image' => 'required|mimes:jpg,bmp,png',
            'category_id' => 'required',
             ] , $messages);

        $data['category_id']=$request->category_id;
        $filename=$this->upload($request->image , 'assets/img');
        $data['image']=$filename;

        $data['special']=isset($request->special);
        $data['published']=isset($request->published);
       
        Beverage::create($data);
        return redirect()->route('addBeverage')->with('success', 'Beverage added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)     //not used in the project
    {

        $beverage = Beverage::findOrFail($id);
        $category = $beverage->category;
        return view('admin.showBeverage' , compact('beverage' ,'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $beverage = Beverage::findOrFail($id);
        $categories = Category::all();
        return view('admin.editBeverage' , compact('beverage','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->errMsg();

        $data =$request->validate([
            'title'=>'required|max:100',
            'content'=>'required|max:300',
            'price'=>'required',
            'image' => 'sometimes|mimes:jpg,bmp,png',
             'category_id' => 'required',      
            ] , $messages);


            if($request->hasFile('image')){
                $fileName=$this->upload($request->image , 'assets/img');
                $data['image']=$fileName;
            }else{
                $data['image'] = Beverage::where('id', $id)->value('image');
            }


        $data['special']=isset($request->special);
        $data['published']=isset($request->published);

        Beverage::where('id',$id)->update($data);
        return redirect()->route('beverages')->with('success', 'Beverage updated successfully!');

    }



    public function destroy(Request $request)
    {
        $id=$request->id;
        Beverage::where('id',$id)->delete();
        return redirect()->route('beverages')->with('success', 'Beverage deleted successfully!');
    }



    public function errMsg()
        {
            return [
               'title.required' => 'Title is required.',
                'content.required' => 'Content is required.',
                'category_id.required' => 'Please select a category.',
                'image.mimes' => 'Image must be a file of type: jpg, bmp, png.'
            ];
        }

}
