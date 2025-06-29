<?php

namespace App\Http\Controllers;

use App\Models\Vacant;
use Illuminate\Http\Request;

class VacantController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Vacant::class);
        return view('vacancies.index');
    }

    public function create()
    {
        $this->authorize('create', Vacant::class);
        return view('vacancies.create');
    }

   
    public function show(Vacant $vacant)
    {
        return view('vacancies.show', compact('vacant'));
    }
    
    public function edit(Vacant $vacant)
    {
        $this->authorize('update', $vacant);

        return view('vacancies.edit', compact('vacant'));
    }

}
