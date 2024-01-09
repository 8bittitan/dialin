<?php

namespace App\Http\Controllers;

use App\Http\Requests\Family\CreateFamilyRequest;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class FamilyController extends Controller
{
    public function index()
    {
        return Inertia::render('Family/Index');
    }

    public function create()
    {
        return Inertia::render('Family/Create');
    }

    public function store(CreateFamilyRequest $request): RedirectResponse
    {
        $this->authorize('create');

        $params = $request->validated();

        $request->user()->families()->create($params);

        return redirect()->back();
    }
}
