<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;

class AdminCategoriesController extends Controller
{
    private $rules = [
        'name' => 'required|min:3|max:30',
        'slug' => 'required|unique:categories,slug'
    ];

    public function index()
    {
        return view('admin_dashboard.categories.index', [
            'categories' => Category::with('user')->orderBy('id', 'DESC')->paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin_dashboard.categories.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        Category::create($validated);

        return redirect()->route('admin.categories.create')->with('success', 'Category has been Created.');
    }

    public function show(Category $category)
    {
        return view('admin_dashboard.categories.show', [
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        return view('admin_dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $this->rules['slug'] = ['required', Rule::unique('categories')->ignore($category)];
        $validated = $request->validate($this->rules);
        
        $category->update($validated);

        return redirect()->route('admin.categories.edit', $category)->with('success', 'Category has been Updated.');
    }

    public function destroy(Category $category)
    {
        $default_category_id = Category::where('name', 'Uncategorized')->first()->id;
        
        if($category->name === 'Uncategorized')
            abort(404);
    
        $category->posts()->update(['category_id' => $default_category_id]);

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category has been Deleted.');
    }
}
