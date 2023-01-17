<?php

namespace App\Http\Controllers\Admin;

use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Translation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubSubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if($request->has('search'))
        {
            $key = explode(' ', $request['search']);
            $categories = Category::where(['position'=>2])->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('name', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        }else{
            $categories=Category::where(['position'=>2]);
        }
        $categories = $categories->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        return view('admin-views.category.sub-sub-category-view',compact('categories','search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'required'
        ], [
            'name.required' => 'Category name is required!',
            'parent_id.required' => 'Sub Category field is required!',
        ]);

        $category = new Category;
        $category->name = $request->name[array_search('en', $request->lang)];
        $category->slug = Str::slug($request->name[array_search('en', $request->lang)]);
        $category->icon = ImageManager::upload('category/', 'png', $request->file('image'));
        $category->parent_id = $request->parent_id;
        $category->position = 2;
        $category->priority = $request->priority;
        $category->save();
        foreach($request->lang as $index=>$key)
        {
            if($request->name[$index] && $key != 'en')
            {
                Translation::updateOrInsert(
                    ['translationable_type'  => 'App\Model\Category',
                        'translationable_id'    => $category->id,
                        'locale'                => $key,
                        'key'                   => 'name'],
                    ['value'                 => $request->name[$index]]
                );
            }
        }
        Toastr::success('Sub Sub Category Added successfully!');
        return back();
    }

    public function edit(Request $request, $id)
    {
        $category = category::withoutGlobalScopes()
                            ->select('categories.*','sc.name as sc_name','sc.id as sc_id','sc.priority as sc_priority','s_sc.name as s_sc_name','s_sc.id as s_sc_id','s_sc.priority as s_sc_priority')
                            ->join("categories as sc", "sc.id", "categories.parent_id")
                            ->join("categories as s_sc", "s_sc.id", "sc.parent_id")
                            ->where('categories.position',2)
                            ->find($id);
        $main_category = category::where('categories.position',0)->get();
        $sub_main_category = category::where('categories.position',1)->get();

            return view('admin-views.category.sub-sub-category-edit', compact('category','main_category','sub_main_category'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'required'
        ], [
            'name.required' => 'Category name is required!',
            'parent_id.required' => 'Sub Category field is required!',
        ]);
        

        $category = Category::find($request->id);
       $category->name = $request->name[array_search('en', $request->lang)];
       $category->slug = Str::slug($request->name[array_search('en', $request->lang)]);
       if ($request->image) {
           $category->icon = ImageManager::update('sub_sub_category/', $category->icon, 'png', $request->file('image'));
       }
       $category->parent_id    = $request->parent_id;
       $category->position     = 2;
       $category->priority = $request->priority;
       $category->save();

       foreach ($request->lang as $index => $key) {
           if ($request->name[$index] && $key != 'en') {
               Translation::updateOrInsert(
                   ['translationable_type' => 'App\Model\Category',
                       'translationable_id' => $category->id,
                       'locale' => $key,
                       'key' => 'name'],
                   ['value' => $request->name[$index]]
               );
           }
       }

       Toastr::success('Sub Category updated successfully!');
       return back();
    }
    public function delete(Request $request)
    {
        $translation = Translation::where('translationable_type','App\Model\Category')
                                    ->where('translationable_id',$request->id);
        $translation->delete();
        Category::destroy($request->id);
        return response()->json();
    }
    public function fetch(Request $request){
        if($request->ajax())
        {
            $data = Category::where('position',2)->orderBy('id','desc')->get();
            return response()->json($data);
        }
    }

    public function getSubCategory(Request $request)
    {
        $data = Category::where("parent_id",$request->id)->get();
        $output="";
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        echo $output;
    }

    public function getCategoryId(Request $request)
    {
        $data= Category::where('id',$request->id)->first();
        return response()->json($data);
    }
}
