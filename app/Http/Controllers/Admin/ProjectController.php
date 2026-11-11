<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'technologies' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Published,Draft',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

   
public function update(Request $request, Project $project)
{
    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'technologies' => 'nullable|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status' => 'required|in:Published,Draft',
    ]);

    // Membuat slug dari judul
    $slug = Str::slug($validated['title']);

    $originalSlug = $slug;
    $count = 2;

    // Mengecek slug agar tidak sama dengan project lain
    while (
        Project::where('slug', $slug)
            ->where('id', '!=', $project->id)
            ->exists()
    ) {
        $slug = $originalSlug . '-' . $count;
        $count++;
    }

    $validated['slug'] = $slug;

    // Upload gambar baru jika dipilih
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')
            ->store('projects', 'public');
    }

    // Memperbarui data project
    $project->update($validated);

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project berhasil diperbarui!');
}


    
public function destroy(Project $project)
{
    // Hapus gambar dari penyimpanan jika tersedia
    if ($project->image) {
        Storage::disk('public')->delete($project->image);
    }

    // Hapus data project dari database
    $project->delete();

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project berhasil dihapus!');
}

}
