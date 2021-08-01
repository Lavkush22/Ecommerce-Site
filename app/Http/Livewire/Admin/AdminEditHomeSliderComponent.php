<?php

namespace App\Http\Livewire\Admin;
use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithfileUploads;
use Carbon\Carbon;
class AdminEditHomeSliderComponent extends Component
{
    use WithfileUploads;

    use WithfileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $newimage;
    public $slider_id;

    public function mount($slider_id)
    {
       $slider=HomeSlider::find($slider_id);
       $this->title=$slider->title;
       $this->subtitle=$slider->subtitle;
       $this->price=$slider->price;
       $this->link=$slider->link;
       $this->image=$slider->image;
       $this->status=$slider->status;
       $this->newimage=$slider->newimage;
       $this->slider_id=$slider->id;
    }

    public function updateSlider()
    {
        $slider=HomeSlider::find($this->slider_id);
        $slider->title=$this->title;
        $slider->subtitle=$this->subtitle;
        $slider->price=$this->price;
        $slider->link=$this->link;

        if($this->newimage)
        {
         $imagename=Carbon::now()->timestamp. '.'. $this->newimage->extension();
         $this->newimage->storeAs('sliders',$imagename);
         $slider->image=$imagename;
        }
        $slider->status=$this->status;
        $slider->save();
        session()->flash('message','Slider has been Upadted Successfully!');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
