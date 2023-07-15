<?php

namespace App\Http\Controllers;

use App\Exports\CategoriesExport;
use App\Http\Requests\CategoryRequest;
use App\Imports\CategoriesImport;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

use function Termwind\render;

class CategoryController extends Controller
{
    public function index()
    {
        if (request('search')) {
            $categories = Category::latest()->where('title', 'like','%'.request('search').'%')->paginate(5);
        }
        else{
            $categories = Category::latest()->paginate(5);
        }
        // $categories = Category::latest()->paginate(2);
        return view('backend.category.index', ['categories'=>$categories]);
    }

    public function create()
    {
        $this->authorize('create-category');
        return view('backend.category.create');
    }

    public function store(CategoryRequest $request)
    {
        try {
            // $request->validate([
            //     'title'=>['required', 'min:3', 'max:15', Rule::unique('categories', 'title')],
            //     'description'=>['required', 'min:8', 'max:150'],
            // ]);
            Category::create([
                'title'=>$request->title,
                'description'=>$request->description,
                // 'image'=>$request->image,
            ]);
            return redirect()->route('categories.list')->withMessage("Category Create Successfully!");
            }
            catch (QueryException $e)
            {
            Log::error($e->getMessage());
            // dd($th->getMessage());
            return redirect()->back()->withInput()->withErrors('Something Went Wrong Contact with Developer!');
            }
    }

    public function show(Category $category)
    {
        // $category = Category::findorFail($id);
        return view('backend.category.show', ['category'=>$category]);
    }

    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            // $request->validate([
            //     'title'=>['required', 'min:3', 'max:15', Rule::unique('categories', 'title')->ignore($category->id)],
            //     'description'=>['required', 'min:8', 'max:150'],
            // ]);
            $category->update([
                'title'=>$request->title,
                'description'=>$request->description,
                // 'image'=>$request->image,
            ]);
            return redirect()->route('categories.list')->withMessage("Category Update Successfully!");
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors('Something Went Wrong Contact with Developer!');
        }
    }
    public function destroy(Category $category)
    {
        try {

            $category->delete();
            return redirect()->route('categories.list')->withMessage("Category Delete Successfully!");
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            // dd($th->getMessage());
            return redirect()->back()->withInput()->withErrors('Something Went Wrong Contact with Developer!');
        }
    }


    //for pdf method
    public function categoryPdf()
    {
        try{
        $categories = Category::all();
        $fileName = 'categories.pdf';
        $pdfDownload = view('backend.category.pdf', compact('categories'))->render();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($pdfDownload);
        $mpdf->Output($fileName, 'I');
    }
    catch (\Throwable $th){
    }
    }


    //for export method
    public function export()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }


    //for import method
    public function import()
    {
        // Excel::import(new CategoriesImport, 'categories.xlsx');

        // return redirect('/backend/category/list')->with('success', 'All good!');
        Excel::import(new CategoriesImport,request()->file('file'));

        return back()->withMessage( 'Import successfully');;
    }
}
