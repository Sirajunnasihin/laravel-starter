<?php

namespace App\Http\Controllers\Api;

use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\MajorResource;
use App\Http\Resources\MajorCollection;
use App\Http\Requests\MajorStoreRequest;
use App\Http\Requests\MajorUpdateRequest;

class MajorController extends Controller
{
    public function index(Request $request): MajorCollection
    {
        $this->authorize('view-any', Major::class);

        $search = $request->get('search', '');

        $majors = Major::search($search)
            ->latest()
            ->paginate();

        return new MajorCollection($majors);
    }

    public function store(MajorStoreRequest $request): MajorResource
    {
        $this->authorize('create', Major::class);

        $validated = $request->validated();

        $major = Major::create($validated);

        return new MajorResource($major);
    }

    public function show(Request $request, Major $major): MajorResource
    {
        $this->authorize('view', $major);

        return new MajorResource($major);
    }

    public function update(
        MajorUpdateRequest $request,
        Major $major
    ): MajorResource {
        $this->authorize('update', $major);

        $validated = $request->validated();

        $major->update($validated);

        return new MajorResource($major);
    }

    public function destroy(Request $request, Major $major): Response
    {
        $this->authorize('delete', $major);

        $major->delete();

        return response()->noContent();
    }
}
