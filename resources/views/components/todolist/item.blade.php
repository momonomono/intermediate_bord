@props([
    "id",
    "title",
    "detail",
    "status",
]) 

<li class="grid px-2 py-4 border-b border-gray-200 gap-4">
    <p class="text-xl js-title-{{$id}}" >{{ $title }}</p>
    <p class="text-md js-detail-{{$id}}">{{ $detail }}</p>
    <article class="flex justify-between">
        <select name="status" class="h-10 text-md js-todolist-selecter" data-id="{{ $id }}" >
            @foreach($statuses as $val)
                <option 
                    value="{{ $val->value}}"
                    @selected($val->value == $status)
                >
                    {{ $val->label()}}
                </option>
            @endforeach
        </select>
        <li class="flex gap-4">
            <a class="js-button-edit" data-id="{{ $id }}">編集する</a>
            <a href="route('delete')">削除する</a>
        </li>
    </article>
</li>
