<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::paginate(4);
        return view('admin.pages.team', compact('teams'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'post' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);
        if ($request->file('image')->isValid()) {
            $team = new Team;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('public/team'), $imageName);
                $team->image = $imageName;
                $team->name = $request->input('name');
                $team->post = $request->input('post');
                $team->save();
        }
    }
        else {
            // Handle error, e.g., log or return a message
            return redirect()->route('admin.team')->with('error', 'Invalid image file.');
        }

        return redirect()->route('admin.team')->with('success', 'Added Successfully');
    }
    public function update(Request $request, $id)
    {
        $team = Team::findorfail($id);
        $request->validate([
            'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($team->image && file_exists(public_path('public/team/' . $team->image))) {
                unlink(public_path('public/team/' . $team->image)); // Delete the old image
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('public/team'), $imageName);
            $team->image = $imageName;
        }
        $team->name = $request->input('name');
        $team->post = $request->input('post');
        $team->save();
        return redirect()->route('admin.team')->with('success', 'Updated Successfully');
    }
    public function delete($id)
    {
        $team = Team::findorfail($id);
        if ($team->image && file_exists(public_path('public/team/' . $team->image))) {
            unlink(public_path('public/team/' . $team->image)); // Delete the image
        }
        $team->delete();
        return redirect()->route('admin.team')->with('success', 'Deleted Successfully');
    }
}
