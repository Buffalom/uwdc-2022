<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimeEntryRequest;
use App\Http\Requests\UpdateTimeEntryRequest;
use App\Http\Resources\TimeEntryResource;
use App\Models\Category;
use App\Models\Tag;
use App\Models\TimeEntry;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserTimeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        abort_unless($request->user()->id === $user->id, 403);

        return TimeEntryResource::collection(
            $user->timeEntries->load([
                'type',
                'category',
                'tags',
            ])
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTimeEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimeEntryRequest $request, User $user)
    {
        abort_unless($request->user()->id === $user->id, 403);

        $data = $request->validated();

        $type = Type::find(Arr::get($data, 'type.id'));
        if (!$type) {
            $type = Type::firstOrCreate([
                'name' => Arr::get($data, 'type.name'),
            ]);
        }

        $category = Category::find(Arr::get($data, 'category.id'));
        if (!$category) {
            $category = Category::firstOrCreate([
                'name' => Arr::get($data, 'category.name'),
            ]);
        }

        $tags = collect(Arr::get($data, 'tags'))->map(function ($tagData) {
            $tag = Tag::find(Arr::get($tagData, 'id'));
            if (!$tag) {
                $tag = Tag::firstOrCreate([
                    'name' => Arr::get($tagData, 'name'),
                ]);
            }

            return $tag;
        });

        $timeEntry = TimeEntry::create([
            'user_id' => $user->id,
            'type_id' => $type->id,
            'category_id' => $category->id,
            
            'date' => Arr::get($data, 'date'),

            'date' => Arr::get($data, 'date'),
            'spent_time' => Arr::get($data, 'spent_time'),
            'notes' => Arr::get($data, 'notes'),
        ]);

        $timeEntry->tags()->sync($tags->map->id);

        return TimeEntryResource::make(
            $timeEntry->load([
                'type',
                'category',
                'tags',
            ])
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTimeEntryRequest  $request
     * @param  \App\Models\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimeEntryRequest $request, User $user, TimeEntry $timeEntry)
    {
        abort_unless($request->user()->id === $user->id, 403);
        abort_unless($request->user()->id === $timeEntry->user->id, 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user, TimeEntry $timeEntry)
    {
        abort_unless($request->user()->id === $user->id, 403);
        abort_unless($request->user()->id === $timeEntry->user->id, 403);
    }
}
