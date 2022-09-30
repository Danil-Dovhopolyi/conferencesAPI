<?php

namespace App\Http\Controllers;
use App\Models\Conference;
use App\Models\User;

class ConferenceController extends Controller
{
    public function getConferences(User $user)
    {
        // dd($user->id);
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
            'date' => 'string',
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
    public function updateConference(Conference $conference)
    {
        $data = request()->validate([
            'title' => 'string',
            'date' => 'string',
            'latitude' => 'integer',
            'longitude' => 'integer',
            'country' => 'string'
        ]);
        $conference->update($data);
        return redirect()->route('conferences.index');
    }
    public function destroyConference(Conference $conference)
    {
            $conference->delete();
            return redirect()->route('conferences.index');
    }
}
