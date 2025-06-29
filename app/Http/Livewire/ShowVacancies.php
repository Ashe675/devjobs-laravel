<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ShowVacancies extends Component
{

    protected $listeners = ['deleteVacant'];

    public function deleteVacant(Vacant $vacant)
    {
        Gate::authorize('delete', $vacant);

        try {
            // Eliminar imagen si existe
            if ($vacant->image && Storage::disk('public')->exists($vacant->image)) {
                Storage::disk('public')->delete($vacant->image);
            }

            // Eliminar registro
            $vacant->delete();

            // Mostrar mensaje de éxito
            $this->dispatchBrowserEvent('show-success-alert', 'Vacant deleted successfully.');
        } catch (\Exception $e) {
            // Loggear el error
            Log::error("Error deleting vacancy: " . $e->getMessage());

            // Mostrar mensaje de error
            $this->dispatchBrowserEvent('show-error-alert',  'Error deleting vacanct. Please try again later.');
        }
    }

    public function render()
    {
        $vacancies = Vacant::where('user_id', auth()->user()->id)->paginate(10);
        // $vacancies = auth()->user()->vacancies()->paginate(1);

        return view('livewire.show-vacancies', ["vacancies" => $vacancies]);
    }
}
