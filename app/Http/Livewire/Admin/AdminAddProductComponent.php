<?php
namespace App\Http\Livewire\Admin;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
//use Livewire\Product;
use Illuminate\Support\Str;
use Livewire\WithfileUploads;

class AdminAddProductComponent extends Component
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
    public $imeges;

    public function mount()
    {
        $this->stock_status='instock';
        $this->featured=0;
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
       'image'=>'required|mimes:jpg,png',
       'category_id'=>'required'

        ]);

    }

    public function addProduct()
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
       'image'=>'required|mimes:jpg,png',
       'category_id'=>'required'

        ]);

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
        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image=$imageName;

        if($this->imeges)
        {
            $imagesname= '';
            foreach($this->imeges as $key=>$image)
            {
              $imgName=Carbon::now()->timestamp.$key. '.' .$image->extension(); 
              $image->storeAs('products',$imgName);
              $imagesname= $imagesname. ',' .$imgName;   
            }
            $product->images=$imagesname;
        }

        $product->category_id=$this->category_id;
        $product->save();
        session()->flash('message','Product has been created successfully!');
    }


    public function render()
    {
       $categories = Category::all();

        return view('livewire.admin.admin-add-product-component',compact('categories'))->layout('layouts.base');
    }
}
