<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use App\Image as ImageModel;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * @return array
     */
    private function validate_data()
    {
        return [
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'status' => 'nullable|numeric|max:1',
            'ordr' => 'nullable|numeric|min:1',

            'meta_title' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',

            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::with('images')->orderBy('ordr');
        if (isset($_GET['q'])) {
            $brands = $brands->where('name', 'LIKE', '%' . e($_GET['q']) . '%')
                ->orWhere('desc', 'LIKE', '%' . e($_GET['q']) . '%');
        }
        $brands = $brands->get();
        return view('admin.brands.index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = new Brand();
        return view('admin.brands.create', ['brand' => $brand]);
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

        $brand = new Brand();
        $brand->name = $request->get('name');
        $brand->desc = $request->get('desc');
        $brand->status = $request->get('status') ? 1 : 0;
        $brand->ordr = 1;
        $brand->uid = auth()->id();
        $brand->meta_title = $request->get('meta_title');
        $brand->meta_desc = $request->get('meta_desc');
        $brand->meta_keywords = $request->get('meta_keywords');
        $brand->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    ImageModel::upload_image($image, $brand->id, __NAMESPACE__);
                }
            }
        }

        if ($request->get('save-2double')) {
            return view('admin.brands.create', compact('brand'));
        } elseif ($request->get('save-2new')) {
            return redirect()->route('admin.brands.create')->with('success', 'Запись успешно добавлена');
        } else {
            return redirect()->route('admin.brands.index')->with('success', 'Запись успешно добавлена');
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
        $brand = Brand::findOrFail($id);
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $brands = Brand::where('status', 1)->orderBy('ordr')->get();

        return view('admin.brands.create', [
            'brand' => $brand,
            'brands' => $brands
        ]);
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

        $brand = Brand::findOrFail($id);
        $brand->name = $request->get('name');
        $brand->desc = $request->get('desc');
        $brand->status = $request->get('status') ? 1 : 0;
        $brand->ordr = 1;
        $brand->uid = auth()->id();

        $brand->meta_title = $request->get('meta_title');
        $brand->meta_desc = $request->get('meta_desc');
        $brand->meta_keywords = $request->get('meta_keywords');
        $brand->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    ImageModel::upload_image($image, $brand->id, 'App\Brand');
                }
            }
        }
        if ($request->has('image-del')) {
            foreach ($request->get('image-del') as $id) {
                $image = ImageModel::findOrFail($id);
                ImageModel::delete_image($image);
                $image->delete();
            }
        }

        if ($request->has('save-2double')) {
            $brand->id = null;
            return view('admin.brands.create', [
                'brand' => $brand,
            ]);
        } elseif ($request->has('save-2new')) {
            return redirect()->route('admin.brands.create')->with('success', 'Запись успешно изменена');
        } else {
            return redirect()->route('admin.brands.index')->with('success', 'Запись успешно изменена');
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
        Brand::findOrFail($id)->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Запись удалена');
    }
}
