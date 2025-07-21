<x-app title="トップページ">
    <div class="w-1/2 mx-auto px-4 py-8">
        <h1 class="text-4xl">TodoList</h1>
        <button 
            id="js-button__show-form"
            class="text-center px-10 py-4 bg-blue-400 text-white rounded-sm mt-4"
        >入力する</button>
        <ul class="mt-4">
            @foreach($todolists as $todolist)
                <x-todolist.item
                    id="{{ $todolist->id }}"
                    title="{{ $todolist->title }}"
                    detail="{{ $todolist->detail }}"
                    status="{{ $todolist->status }}"
                />
            @endforeach
        </ul> 
        <section class="absolute w-screen h-screen top-0 left-0 px-4 py-8 bg-gray-500 bg-opacity-50 flex justify-center items-center js-hidden" id="js-form__bg">
            <article class="grid gap-4 w-1/2 h-fit bg-gray-100 px-10 py-8 opacity-100 relative">
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="js-todo-method">
                    <input type="hidden" name="id" id="js-todo-id">
                    <div class="grid gap-4">
                        <x-label-form 
                            title="タイトル"
                            input_name="title"
                        />  
                        <x-label-form 
                            title="内容"
                            input_name="detail"
                        /> 
                        <button class="bg-blue-400 max-w-fit px-10 py-4 text-white rounded-xl text-xl block mx-auto">入力する</button>
                    </div>
                </form>

                
                <p class="text-4xl absolute top-2 right-2 hover:text-gray-300" id="js-close-button">✖︎</p>
            </article>
        </section>
    </div>
</x-app>