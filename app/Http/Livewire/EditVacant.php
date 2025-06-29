<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class EditVacant extends Component
{

    public $vacantId;
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;
    public $newImage;

    use \Livewire\WithFileUploads;


    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required|date',
        'description' => 'required',
        'newImage' => 'nullable|image|max:1024', 
    ];

    public function mount(Vacant $vacant)
    {
        $this->vacantId = $vacant->id;
        $this->title = $vacant->title;
        $this->salary = $vacant->salary_id;
        $this->category = $vacant->category_id;
        $this->company = $vacant->company;
        $this->last_day = Carbon::parse( $vacant->last_day )->format('Y-m-d');
        $this->description = $vacant->description;
        $this->image = $vacant->image;
    }

    public function updateVacant()
    {
        $data = $this->validate();

        $vacant = Vacant::findOrFail($this->vacantId);

        $vacant->title = $data['title'];
        $vacant->salary_id = $data['salary'];
        $vacant->category_id = $data['category'];
        $vacant->company = $data['company'];
        $vacant->last_day = Carbon::parse($data['last_day']);
        $vacant->description = $data['description'];

        if ($this->newImage) {
            $imagePath = $this->newImage->store('images/vacancies', 'public');

            File::delete(public_path('storage/' . $vacant->image)); // Delete old image if exists
            
            $vacant->image = $imagePath;

        }

        $vacant->save();

        // Create a message
        session()->flash('success', 'Vacant updated successfully!');

        // Return to view
        return redirect()->route('vacancies.index');
    }


    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.edit-vacant', compact('salaries', 'categories'));
    }
}
