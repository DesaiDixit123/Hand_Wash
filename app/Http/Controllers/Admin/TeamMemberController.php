<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('sort_order', 'asc')->get();
        return view('admin.team-members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team-members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'bio' => 'nullable|string',
            'linkedin_url' => 'nullable|url',
            'sort_order' => 'integer',
        ]);

        $member = new TeamMember($request->except('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '_team.' . $request->image->extension();
            $request->image->move(public_path('uploads/team'), $imageName);
            $member->image_path = '/uploads/team/' . $imageName;
        }

        $member->save();

        return redirect()->route('team-members.index')->with('success', 'Team member added.');
    }

    public function edit($id)
    {
        $member = TeamMember::findOrFail($id);
        return view('admin.team-members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'bio' => 'nullable|string',
            'linkedin_url' => 'nullable|url',
            'sort_order' => 'integer',
        ]);

        $member = TeamMember::findOrFail($id);
        $member->fill($request->except('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '_team.' . $request->image->extension();
            $request->image->move(public_path('uploads/team'), $imageName);
            $member->image_path = '/uploads/team/' . $imageName;
        }

        $member->save();

        return redirect()->route('team-members.index')->with('success', 'Team member updated.');
    }

    public function destroy($id)
    {
        $member = TeamMember::findOrFail($id);
        $member->delete();
        return redirect()->route('team-members.index')->with('success', 'Team member deleted.');
    }
}
