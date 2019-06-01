<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return array
     */
    private function validate_data()
    {
        return [
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'pid' => 'required|numeric|min:1',
            'status' => 'nullable|numeric|max:1',

            'meta_title' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(config('services.pagination'));
        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        $categories = Category::all();
        return view('admin.categories.create', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validate_data());

        $category = new Category;
        $category->name = $request->get('name');
        $category->desc = $request->get('desc');
        $category->pid = $request->get('pid');
        $category->status = $request->get('status') ? 1 : 0;
        $category->inc_menu = $request->get('inc_menu') ? 1 : 0;

        $category->meta_title = $request->get('meta_title');
        $category->meta_desc = $request->get('meta_desc');
        $category->meta_keywords = $request->get('meta_keywords');

//        if ($request->file('images')->isValid()) {
//        dd($request->get('images'));
//        }
//            $category->img = $request->img->path();
        $category->save();

        if ($request->get('save-2double')) {
            $categories = Category::all();
            return view('admin.categories.create', compact('category', 'categories', 'sex'));
        } elseif ($request->get('save-2new')) {
            return redirect()->route('admin.categories.create')->with('success', 'Запись успешно добавлена');
        } else {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно добавлена');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('admin.categories.show', compact('category', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('admin.categories.create', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validate_data());

        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->desc = $request->get('desc');
        $category->pid = $request->get('pid');
        $category->status = $request->get('status') ? 1 : 0;
        $category->inc_menu = $request->get('inc_menu') ? 1 : 0;

        $category->meta_title = $request->get('meta_title');
        $category->meta_desc = $request->get('meta_desc');
        $category->meta_keywords = $request->get('meta_keywords');
        $category->save();

        if ($request->has('save-2double')) {
            $categories = Category::all();
            $category->id = null;
            return view('admin.categories.create', compact('category', 'categories'));
        } elseif ($request->has('save-2new')) {
            return redirect()->route('admin.categories.create')->with('success', 'Запись успешно изменена');
        } else {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно изменена');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect() . route('admin.categories.index')->with('success', 'Запись удалена');
    }
}
