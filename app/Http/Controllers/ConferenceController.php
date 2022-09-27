<?php

namespace App\Http\Controllers;
use App\Models\Conference;

class ConferenceController extends Controller
{
    public function getConferences()
    {
        $conferences = Conference::all();
        return view('conferences.index', compact('conferences'));
    }

    public function createConference()
    {
          return view('conferences.create');
    }
    public function storeConference()
    {
        $data = request()->validate([
            'title' => 'string',
            'dateconf' => 'string',
            'latitude' => 'integer',
            'longitude' => 'integer',
            'country' => 'string'
        ]);
        Conference::create($data);
        return redirect()->route('conferences.index');
    }
    public function showConference(Conference $conference)
    {
        return view('conferences.show', compact('conference'));
    }
    public function editConference(Conference $conference)
    {
        return view('conferences.edit', compact('conference'));
    }
    public function update(Conference $conference)
    {
        $data = request()->validate([
            'title' => 'string',
            'dateconf' => 'string',
            'latitude' => 'integer',
            'longitude' => 'integer',
            'country' => 'string'
        ]);
        $conference->update($data);
        return redirect()->route('conferences.show', $conference->$id);
    }
}
