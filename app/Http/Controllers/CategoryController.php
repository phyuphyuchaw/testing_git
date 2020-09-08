<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'category'=>'required',
            'photo'=>'required'
        ]);

        //upload file

        $imgName=time().'.'. $request->photo->extension(); 

        $request->photo->move(public_path('backend/categoryimg'),$imgName);

        $path='backend/categoryimg/'.$imgName;

        //insert data

        $category=new Category();
        $category->name=$request->category;
        $category->photo=$path;
        $category->save();

        //redirect

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.categories.edit',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
         return view('backend.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
        //validation
        $request->validate([
            'category'=>'required',
            'photo'=>'sometimes'
        ]);

        //upload
            if($request->hasFile('photo')){
                $imgName=time().'.'. $request->photo->extension(); 

        $request->photo->move(public_path('backend/categoryimg'),$imgName);

        $path='backend/categoryimg/'.$imgName;
            }else{
                $path=$request->oldphoto;
            }
        //insert data
        $category->name=$request->category;
        $category->photo=$path;
        
        $category->save();

        //redirect
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Category $category)
    {
         $category->delete();
        return redirect()->route('categories.index');
    }
}
