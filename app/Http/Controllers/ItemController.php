<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Subcategory;
use App\Brand;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $items=Item::all();
        return view('item.list',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        
        $subcategories=Subcategory::all();
        
        $brands=Brand::all();
        return view('item.new',compact('subcategories','brands'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =$request->validate([
                'name'=>['required','string','max:225','unique:items'],
                'photo'=>'required|mimes:jpeg,bmp,png,jpg'
        ]);
        if($validator)
        {
            
                    $codeno=$request->codeno;
                    $name=$request->name;
                    $photo=$request->photo;
                    $price=$request->price;
                    $discount=$request->discount;
                    $description=$request->description;
                    $subcategory_id=$request->subcategory_id;
                    $brand_id=$request->brand_id;

                  
                    
          
            $imageName=time().'.'.$photo->extension();
            $photo->move(public_path('images/item'),$imageName);
            $filepath='images/item/'.$imageName;


            $codeno = "JPM-".rand(11111,99999);
            $item=new Item;
            $item->name=$name;
            $item->codeno=$codeno;
            $item->photo=$filepath;
            $item->price=$price;
            $item->discount=$discount;
            $item->description=$description;
            $item->subcategory_id=$subcategory_id;
            $item->brand_id=$brand_id;
            $item->save();

           

            return redirect()->route('item.index')->with("successMsg",'New Item is ADDED in your data');
        } else{
            return redirect::back()->withErrors($validator);
        }
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
    public function edit($id)
    {
        
         $subcategories = Subcategory::all();
        $brands = Brand::all();

        $item = Item::find($id);

        return view('item.edit',compact('subcategories','brands','item'));
    }

    // **
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
     
    public function update(Request $request, $id)
    {

                    $codeno=$request->codeno;
                    $name=$request->name;
                    $newphoto = $request->photo;
                    $oldphoto = $request->oldphoto;
                    $price=$request->price;
                    $discount=$request->discount;
                    $description=$request->description;
                    
                    $subcategory_id=$request->subcategory_id;
                    $brand_id=$request->brand_id;
          
        
        if ($request->hasFile('photo')) {
            # File Upload
            $imageName = time().'.'.$newphoto->extension();

            $newphoto->move(public_path('images/item'),$imageName);

            $filepath = 'images/item/'.$imageName;

            if (\File::exists(public_path($oldphoto))) {
                \File::delete(public_path($oldphoto));
            }
        }
        else{
            $filepath = $oldphoto;
        }

        // Data update
        $item = Item::find($id);
        $item->name = $name;
        $item->photo = $filepath;
        $item->save();

        return redirect()->route('item.index')->with('successMsg', 'Existing Item is UPDATED in your data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item = Item::find($id);
         $item->delete();
        

        return redirect()->route('item.index')->with('successMsg','Existing Item is DELETED in your data');
    }
}

    

