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
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }

    public static function updateStatus(array $data)
    {
        return self::where("id", $data["id"])
            ->update(["status", $data["status"]]);
    }
}
