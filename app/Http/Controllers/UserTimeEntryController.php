<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimeEntryRequest;
use App\Http\Requests\UpdateTimeEntryRequest;
use App\Http\Resources\TimeEntryResource;
use App\Models\TimeEntry;
use App\Models\User;
use Illuminate\Http\Request;

class UserTimeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        abort_unless($request->user()->id === $user->id, 404);

        return TimeEntryResource::collection(
            $user->timeEntries->load([
                'type',
                'category',
                'tags',
            ])
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTimeEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimeEntryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function show(TimeEntry $timeEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeEntry $timeEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTimeEntryRequest  $request
     * @param  \App\Models\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimeEntryRequest $request, TimeEntry $timeEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeEntry $timeEntry)
    {
        //
    }
}
