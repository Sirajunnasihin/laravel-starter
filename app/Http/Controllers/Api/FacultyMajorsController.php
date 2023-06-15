<?php

namespace App\Http\Controllers\Api;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MajorResource;
use App\Http\Resources\MajorCollection;

class FacultyMajorsController extends Controller
{
    public function index(Request $request, Faculty $faculty): MajorCollection
    {
        $this->authorize('view', $faculty);

        $search = $request->get('search', '');

        $majors = $faculty
            ->majors()
            ->search($search)
            ->latest()
            ->paginate();

        return new MajorCollection($majors);
    }

    public function store(Request $request, Faculty $faculty): MajorResource
    {
        $this->authorize('create', Major::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'desc' => ['required', 'max:255', 'string'],
        ]);

        $major = $faculty->majors()->create($validated);

        return new MajorResource($major);
    }
}
