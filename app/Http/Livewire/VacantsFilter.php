<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Category;
use App\Models\Salary;

class VacantsFilter extends Component
{
    public $term;
    public $category;
    public $salary;

    public function filter()
    {
        $this->emit(
            'searchVacants',
            $this->term,
            $this->category,
            $this->salary,
        );
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.vacants-filter', [
            'salaries' => $salaries,
            'categories' => $categories,
        ]);
    }
}
