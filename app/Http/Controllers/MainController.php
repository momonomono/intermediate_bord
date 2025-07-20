<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListRequest;
use Illuminate\Http\Request;
use App\Models\Todolist;

class MainController extends Controller
{
    public function index()
    {
        $todolists = Todolist::all();
        return view("top", compact("todolists"));
    }

    public function store(TodoListRequest $request)
    {
        $todolist = $request->only("title", "detail");
        Todolist::createTodolist($todolist);
        
        return redirect()
            ->route("top");
    }

    public function selecter(Request $request)
    {
        $id = $request->input("post_id");
        $status = $request->input("post_status");

        Todolist::where("id", $id)
            ->update([
                "status" => $status
            ]);

        $list = Todolist::where("id", $id)->first();

        return response()->json([
            "list"  => $list
        ]);
    }
}
