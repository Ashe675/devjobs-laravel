<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use Livewire\Component;

class HomeVacancies extends Component
{

    public $term;
    public $category;
    public $salary;

    protected $listeners = [
        'searchVacants' => 'searchVacants'
    ];

    public function searchVacants($term = null, $category = null, $salary = null)
    {
        $this->term = trim($term);
        $this->category = $category;
        $this->salary = $salary;
    }

    public function render()
    {
        // $vacancies = Vacant::latest()->paginate(10);

        $vacancies = Vacant::when($this->term, function ($query) {
            $query->where('title', 'like', '%' . $this->term . '%');
        })
            ->when($this->term, function ($query) {
                $query->orWhere('company', 'like', '%' . $this->term . '%');
            })
            ->when($this->category, function ($query) {
                $query->where('category_id', $this->category);
            })->when($this->salary, function ($query) {
                $query->where('salary_id', $this->salary);
            })->latest()->paginate(10);

        return view('livewire.home-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
