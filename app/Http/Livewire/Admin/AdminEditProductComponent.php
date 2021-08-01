<?php

namespace App\Http\Livewire\Admin;
use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithfileUploads;
class AdminEditProductComponent extends Component
{
    use WithfileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_pricee;
    public $sale_pricee;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $newimage;
    public $product_id;

    public function mount($product_slug)
    {
        $product=Product::where('slug',$product_slug)->first();

    $this->name=$product->name;
    $this->slug=$product->slug;
    $this->short_description=$product->short_description;
    $this->description=$product->description;
    $this->regular_pricee=$product->regular_pricee;
    $this->sale_pricee=$product->sale_pricee;
    $this->SKU=$product->SKU;
    $this->stock_status=$product->stock_status;
    $this->featured=$product->featured;
    $this->quantity=$product->quantity;
    $this->image=$product->image;
    $this->category_id=$product->category_id;
    $this->newimage=$product->newimage;
    $this->product_id=$product->product_id;
    }

    public function generateSlug()
    {

       $this->slug=Str::slug($this->name,'-'); 
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
       'name'=>'required',
       'slug'=>'required|unique:products',
       'short_description'=>'required',
       'description'=>'required',
       'regular_pricee'=>'required|numeric',
       'sale_pricee'=>'numeric',
       'SKU'=>'required',
       'stock_status'=>'required',
       'quantity'=>'required|numeric',
       'newimage'=>'required|mimes:jpg,png',
       'category_id'=>'required'

        ]);
    }

    public function updateProduct()
    {
         $this->validate([
       'name'=>'required',
       'slug'=>'required|unique:products',
       'short_description'=>'required',
       'description'=>'required',
       'regular_pricee'=>'required|numeric',
       'sale_pricee'=>'numeric',
       'SKU'=>'required',
       'stock_status'=>'required',
       'quantity'=>'required|numeric',
       'newimage'=>'required|mimes:jpg,png',
       'category_id'=>'required'

        ]);

        $product=Product::find($this->product_id);
        $product= new Product();
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->short_description=$this->short_description;
        $product->description=$this->description;
        $product->regular_pricee=$this->regular_pricee;
        $product->sale_pricee=$this->sale_pricee;
        $product->SKU=$this->SKU;
        $product->stock_status=$this->stock_status;
        $product->featured=$this->featured;
        $product->quantity=$this->quantity;

        if($this->newimage)
        {
         $imageName=Carbon::now()->timestamp.'.'.$this->newimage->extension();
        $this->newimage->storeAs('products',$imageName);
        $product->image=$imageName;
        }

        $product->category_id=$this->category_id;
        $product->save();
        session()->flash('message','Product has been updated successfully!');
    }

    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories])->layout('layouts.base');
    }
}
