<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use App\Notifications\NewCandidate;
use Livewire\Component;

class ApplyVacant extends Component
{
    public $vacant;
    public $cv;

    public $isApplied = false;

    use \Livewire\WithFileUploads;

    protected $rules = [
        'cv' => 'required|file|mimes:pdf|max:2048', // Max 2MB
    ];

    public function mount(Vacant $vacant)
    {
        $this->vacant = $vacant;
        $this->isApplied = $vacant->candidates()->where('user_id', auth()->id())->exists();
    }

    public function applyToVacant()
    {
        $this->validate();

        if ($this->isApplied) {
            $this->dispatchBrowserEvent('show-error-alert', [
                'message' => 'You have already applied for this vacancy.',
            ]);
            return;
        }

        $this->vacant->candidates()->create([
            'user_id' => auth()->id(),
            'cv' => $this->cv->store('cvs', 'public'),
        ]);

        $this->isApplied = true;

        $this->dispatchBrowserEvent('show-success-alert', [
            'message' => 'You have successfully applied for the vacancy.',
        ]);
        
        $this->vacant->recruiter->notify(new NewCandidate(
            $this->vacant->id,
            $this->vacant->title,
            auth()->id()
        ));
    }


    public function render()
    {
        return view('livewire.apply-vacant');
    }
}
