<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function show(Category $category)
    {
        //获取分类ID 关联话题 分页显示20条
        $topics = Topic::where(['category_id' => $category->id])->paginate(12);
        //  传参变量话题和分类到模板中
        return view('topics.index',compact('topics','category'));
    }
}
