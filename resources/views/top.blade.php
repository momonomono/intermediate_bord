<x-app title="トップページ">
    <div class="w-1/2 mx-auto px-4 py-8">
        <h1 class="text-4xl">TodoList</h1>
        <button 
            id="js-button__show-form"
            class="text-center px-10 py-4 bg-blue-400 text-white rounded-sm mt-4"
        >入力する</button>
        <ul class="mt-4">
            <li class="grid px-2 py-4 border-b border-gray-200 gap-4">
                <p class="text-xl">タイトル</p>
                <p class="text-md">内容</p>
                <article class="flex justify-between">
                    <select name="status" class="h-10 text-md">
                        <option value="1">未着手</option>
                        <option value="2">進行中</option>
                        <option value="3">完了</option>
                    </select>
                    <li class="flex gap-4">
                        <a href="">編集する</a>
                        <a href="">削除する</a>
                    </li>
                </article>
            </li>
        </ul> 
        <section class="absolute w-screen h-screen top-0 left-0 px-4 py-8 bg-gray-500 bg-opacity-50 flex justify-center items-center js-hidden" id="js-form__bg">
            <article class="grid gap-4 w-1/2 h-fit bg-gray-100 px-10 py-8 opacity-100 relative">
                <form action="" method="POST">
                    @csrf
                    <div class="grid gap-4">
                        <label class="grid gap-4">
                            <p class="text-xl">タイトル</p>
                            <input type="text" name="title" class="w-full">
                        </label>
                        <label class="grid gap-4">
                            <p class="text-xl">内容</p>
                            <input type="text" name="title" class="w-full">
                        </label>
                        <button class="bg-blue-400 max-w-fit px-10 py-4 text-white rounded-xl text-xl block mx-auto">入力する</button>
                    </div>
                </form>
                <p class="text-4xl absolute top-2 right-2 hover:text-gray-300" id="js-close-button">✖︎</p>
            </article>
        </section>
    </div>
</x-app>