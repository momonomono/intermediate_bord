<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListRequest;
use Illuminate\Http\Request;
use App\Models\Todolist;

class MainController extends Controller
{
    // 全体的にコメントを書く癖をつけること
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

    // スペルミス：selecter -> selector
    public function selecter(Request $request)
    {
        $id = $request->input("post_id");
        $status = $request->input("post_status");

        // テーブル操作はモデルに任せる
        // ここでは、モデルのメソッドを直接呼び出すだけが望ましい
        // Todolist::updateStatus($id, $status);
        Todolist::where("id", $id)
            ->update([
                "status" => $status
            ]);

        // 実質find($id)と同じ
        $list = Todolist::where("id", $id)->first();

        return response()->json([
            "list"  => $list
        ]);
    }

    // editもフォームリクエストを使用してほしい
    public function edit(Request $request)
    {
        $todolist = $request->only(["title", "detail"]);
        $id = $request -> input("id");

        // テーブル操作はモデルに任せる
        // ここでは、モデルのメソッドを直接呼び出すだけが望ましい
        // 引数にはバリデーション通過後のデータを渡す
        // Todolist::updateTodolist($request->validated());
        Todolist::where("id", $id)
            ->update($todolist);

        return redirect()
            ->route("top");
    }
}
