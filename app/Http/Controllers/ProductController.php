<?php
         
namespace App\Http\Controllers;
          
use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;
use Alert;
        
class ProductController extends Controller
{
    public function index(Request $request)
    {
         $product = Product::all();
        return view('home',compact('product'));
    }
    public function store(Request $request)
    {
         $input = $request->all();
         $namabarang=$request->namabarang;
         if(!$namabarang){
            return redirect()->back()->with('alert','hello');
         }
        if ($image = $request->file('foto')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }
            Product::create($input);
            // $dataproduct = Product::all();
            return redirect("/")
                    ->with('success','Product created successfully.');

    }
     public function update(Request $request,Product $product)
    {
           $input = $request->all();
        if ($image = $request->file('foto')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }else{
            unset($input['foto']);
        }
         $product->update($input);
            // $dataproduct = Product::all();
            return redirect("/");

    }
     public function destroy(Product $product)
    {
       $product->delete();
        return redirect("/");
    }
    public function edit(Product $product)
    {
        return view('edit',compact('product'));
    }
}