<?php
namespace App\Http\Controllers;
use App\Models\Ptoduct;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all(){
        $categories=Category::all();
        return view("Admin.allCategories",compact("categories"));

    }
    public function show($id){
        $category=Category::findOrFail($id);
        return view("Admin.showCategory",compact("category"));

    }
    public function create(){
        return view("Admin.createCategory");
    }
    public function insert(Request $request){
        $data=$request->validate([
            "name"=>"required|string|max:255",
            "desc"=>"required|string",
        ]);
       
        Category::create($data);
        return redirect(url("categories/create"))->with("success","Category inserted successfully");

    }
    public function edit($id){
        $category=Category::findOrFail($id);
        // $categories=Category::all();
        return view("Admin.editCategory",compact("category"));
    }
    public function updata(Request $request,$id){
        $data=$request->validate([
            "name"=>"required|string|max:255",
            "desc"=>"required|string",
            
        ]);
        Category::findOrFail($id)->update($data);
        return redirect(url("categories/showCategory/$id"))->with("success","Category updatated successfully");

    }
    public function delete($id){
        Category::findOrFail($id)->delete();
        $category=Category::all();
        return redirect(url('categories/all'))->with("success","Category deleted successfully");
    }

}
