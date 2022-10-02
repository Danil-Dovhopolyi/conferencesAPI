<?php

namespace App\Http\Controllers;
use App\Models\Conference;
use App\Constants\RoleConstants;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function getConferences(User $user)
    {
        $myConferences = [];

        if (Auth::user() != null) {
            $myConferences = $this->getMyConferences();
        }

        $conferences = Conference::all();
        return view('conferences.index', compact('conferences', 'myConferences'));
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

        $this->createConferenceByUser($data);

        return redirect()->route('conferences.index');
    }
    public function showConference(Conference $conference)
    {
        $user = Auth::user();

        if($user === null){
            return view('auth.login');
        }

        return view('conferences.show', compact('conference'));
    }
    public function editConference(Conference $conference)
    {
        if ($this->isAdmin()) {
            return view('conferences.edit', compact('conference'));
        }

        $roles = $this->getUserRolesById();

        if ($this->isListener()) {
            return abort(403);
        }

        $editable = $this->getMyConferences()->contains(function ($value, $key) use (&$conference) {
            return $value->id == $conference->id;
        });

        if ($this->isConferee() && $editable) {
            return view('conferences.edit', compact('conference'));
        }
        
        return abort(403);         
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

    private function getUserRolesById() {
        $user = Auth::user();

        $roles = DB::table('users')
        ->leftjoin('user_roles', 'users.id', '=', 'user_roles.user_id')
        ->leftjoin('roles', 'roles.role_id', '=', 'user_roles.role_id')
        ->where('id', '=', $user->id)
        ->select('roles.name')
        ->get();

        return $roles;
    }

    private function createConferenceByUser($conference) {
        $conference['creator_id'] = Auth::user()->id;
        Conference::create($conference);
    }

    private function getMyConferences() {
        $user = Auth::user();

        return DB::table('conferences')
        ->leftjoin('users', 'users.id', '=', 'conferences.creator_id')
        ->where('users.id', '=', $user->id)
        ->select('*')
        ->get();
    }

    private function isAdmin() {
        return $this->inRole(RoleConstants::$Admin);
    }

    private function isListener() {
        return $this->inRole(RoleConstants::$Listener);
    }

    private function isConferee() {
        return $this->inRole(RoleConstants::$Conferee);
    }

    private function inRole($roleName) {
        $roles = $this->getUserRolesById();

        return $roles->contains(function ($value, $key) {
            return $value->name == $roleName;
        });
    }
}
