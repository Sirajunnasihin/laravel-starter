<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Faculty;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MajorStoreRequest;
use App\Http\Requests\MajorUpdateRequest;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Major::class);

        $search = $request->get('search', '');

        $majors = Major::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.majors.index', compact('majors', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Major::class);

        $faculties = Faculty::pluck('name', 'id');

        return view('app.majors.create', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MajorStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Major::class);

        $validated = $request->validated();

        $major = Major::create($validated);

        return redirect()
            ->route('majors.edit', $major)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Major $major): View
    {
        $this->authorize('view', $major);

        return view('app.majors.show', compact('major'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Major $major): View
    {
        $this->authorize('update', $major);

        $faculties = Faculty::pluck('name', 'id');

        return view('app.majors.edit', compact('major', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        MajorUpdateRequest $request,
        Major $major
    ): RedirectResponse {
        $this->authorize('update', $major);

        $validated = $request->validated();

        $major->update($validated);

        return redirect()
            ->route('majors.edit', $major)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Major $major): RedirectResponse
    {
        $this->authorize('delete', $major);

        $major->delete();

        return redirect()
            ->route('majors.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
