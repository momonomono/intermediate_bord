<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TodoList extends Model
{
    use HasFactory;

    protected $fillable = [
        "title", "detail"
    ];

    public static function createTodolist(array $data)
    {
        return self::create([
            "title" => $data["title"],
            "detail" => $data["detail"],
            // マイグレーションで$table->timestamps();を使用しているため、
            // created_atとupdated_atは記載しなくてもよい。
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }

    // このメソッド使用していない？
    public static function updateStatus(array $data)
    {
        // idで検索するなら、findのほうが簡単になる。
        return self::find($data["id"])
            ->update(["status", $data["status"]]);
    }
}
