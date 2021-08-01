<?php

namespace App\Http\Livewire\Admin;
use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{

    public function deleteSlider($slider_id)
    {
      $slider=HomeSlider::find($slider_id);
      $slider->delete();
      session()->flash('message','Slider has been Deleted Successfully!');
    }

    public function render()
    {
        $sliders=HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.base');
    }
}
