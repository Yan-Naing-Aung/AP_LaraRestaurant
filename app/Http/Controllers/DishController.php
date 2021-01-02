<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\DishRequest;

class DishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('kitchen.dish',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('kitchen.createDish',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishRequest $request)
    {
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->category_id = $request->category_id;

        $imageName = date('YmdHis').".". request()->dish_image->getClientOriginalExtension();
        $request->dish_image->move(public_path('images'),$imageName);

        $dish->image = $imageName;
        $dish->save();

        return redirect('dish')->with('status','Dish created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $categories = Category::all();
        return view('kitchen.editDish',compact('dish','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        request()->validate([
            'name'=>'required',
            'category_id'=>'required',
            'dish_image'=>'image'
        ]);
        $dish->name = $request->name;
        $dish->category_id= $request->category_id;

        if(request()->dish_image){
            $imageName = date('YmdHis').".". request()->dish_image->getClientOriginalExtension();
            $request->dish_image->move(public_path('images'),$imageName);

            $dish->image = $imageName;
        }

        $dish->save();
        return redirect('dish')->with('status','Dish updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect('dish')->with('status','Dish deleted successfully');
    }
}
