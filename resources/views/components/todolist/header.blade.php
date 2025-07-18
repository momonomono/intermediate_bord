<header class="w-full h-20 bg-gray-200">
    <div class="container m-auto flex items-center justify-between h-full">
        <p class="text-3xl">
            <a href="{{ route('top') }}">Todolist</a>
        </p>
        <ul class="flex items-center gap-8">
            @auth
                <li class="text-2xl">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button>Logout</button>
                    </form>
                </li>
            @endauth

            @guest
                <li class="text-2xl">
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li class="text-2xl">
                    <a href="{{ route('register') }}">Signin</a>
                </li>
            @endguest
        </ul>    
    </div>
</header>