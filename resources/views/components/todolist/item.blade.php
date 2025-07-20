@props([
    "id",
    "title",
    "detail",
    "status",
]) 

<li class="grid px-2 py-4 border-b border-gray-200 gap-4">
    <p class="text-xl">{{ $title }}</p>
    <p class="text-md">{{ $detail }}</p>
    <article class="flex justify-between">
        <select name="status" class="h-10 text-md js-todolist-selecter" data-id="{{ $id }}" >
            @foreach($statuses as $status)
                <option 
                    value="{{ $status->value}}"
                    @selected($status->value == $status)
                >
                    {{ $status->label()}}
                </option>
            @endforeach
        </select>
        <li class="flex gap-4">
            <a href="">編集する</a>
            <a href="">削除する</a>
        </li>
    </article>
</li>
