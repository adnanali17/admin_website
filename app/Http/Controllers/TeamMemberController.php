<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::all();
        return view('team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'field' => 'required|string',
            'description' => 'required|string',
            'work_history_feedback' => 'required|string',
            'projects_done' => 'required|integer',
            'success_rate' => 'required|integer',
            'experience_years' => 'required|integer',
            'location' => 'required|string',
            'linkedin' => 'nullable|string',
            'twitter' => 'nullable|string',
            'facebook' => 'nullable|string',
            'contact_number' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);

        TeamMember::create($request->all());

        return redirect()->route('team.index')->with('status', 'Team member added successfully!');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('team.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'field' => 'required|string',
            'description' => 'required|string',
            'work_history_feedback' => 'required|string',
            'projects_done' => 'required|integer',
            'success_rate' => 'required|integer',
            'experience_years' => 'required|integer',
            'location' => 'required|string',
            'linkedin' => 'nullable|string',
            'twitter' => 'nullable|string',
            'facebook' => 'nullable|string',
            'contact_number' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);

        $teamMember->update($request->all());

        return redirect()->route('team.index')->with('status', 'Team member updated successfully!');
    }

    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();

        return redirect()->route('team.index')->with('status', 'Team member deleted successfully!');
    }
}
