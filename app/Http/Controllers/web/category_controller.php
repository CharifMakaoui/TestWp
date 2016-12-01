<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class category_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $categories = Category::all();

        $data = array(
            'categories' => $categories
        );

        return response()->view('elements.category.list', $data);
    }

    public function add_category_view(){
        return response()->view('elements.category.add_new');
    }

    public function add_category(Request $request){

        $this->validate($request, [
            'category_name' => 'required|unique:categories'
        ]);

        $save = Category::create([
            'category_name' => $request->input('category_name')
        ]);

        if($save)
            return response()->redirectTo(\URL::previous())->with('message', 'new category has been added');
        else
            return response()->redirectTo(\URL::previous())->with('message', 'Error Create Category');

    }
}
