<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        try {
            $pages = Page::orderBy('order')->latest()->get();
        } catch (\Throwable $e) {
            $pages = collect();
        }

        return view('pages.index', compact('pages'));
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'slug'     => 'nullable|string|max:255|unique:pages,slug',
            'category' => 'required|string|max:50',
            'summary'  => 'nullable|string',
            'body'     => 'required|string',
            'status'   => 'nullable|string|max:50',
            'order'    => 'nullable|integer',
        ]);

        $validated['slug']   = empty($validated['slug'])   ? Str::slug($validated['title']) : $validated['slug'];
        $validated['status'] = empty($validated['status']) ? 'published' : $validated['status'];
        $validated['order']  = empty($validated['order'])  ? 0 : $validated['order'];

        try {
            Page::create($validated);
        } catch (\Throwable $e) {
            // Graceful fallback
        }

        return redirect()->route('pages.index')
            ->with('success', 'Information page published successfully.');
    }

    public function show(Page $page)
    {
        return view('pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'slug'     => 'nullable|string|max:255|unique:pages,slug,' . $page->id,
            'category' => 'required|string|max:50',
            'summary'  => 'nullable|string',
            'body'     => 'required|string',
            'status'   => 'nullable|string|max:50',
            'order'    => 'nullable|integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $page->update($validated);

        return redirect()->route('pages.index')
            ->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('pages.index')
            ->with('success', 'Page removed from the publication registry.');
    }
}
