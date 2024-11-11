
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}"  rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>LaravelTestTask</title>
</head>
<body>
    <div>
        <div  class="flex flex-col min-h-screen">
            <nav class="w-full bg-gray-500 flex-shrink-0" >
                @auth
                <div class="container mx-auto flex justify-between py-4">
                    <ul class="flex text-white">
                        <li class="pl-5 hover:text-gray-300"><a href="/random-news">Random news</a></li>
                        <li class="pl-5 hover:text-gray-300"><a href="/eloquent">Word</a></li>
                        <li class="pl-5 hover:text-gray-300"><a href="/paginate">Paginate</a></li>
                    </ul>
                    <div  class="flex text-white">
                        <div class="pr-5">{{Auth::user() ->name}}</div>
                        <form action="/api/auth" method="post">
                            @method('delete')
                            @csrf
                            <button>Logout</button>
                        </form>
                    </div>
                </div>
                @else
                <div class="container mx-auto flex text-white justify-end py-4">
                    <a class="pr-5 hover:text-gray-300"  href="/api/user">register</a>
                    <a class="hover:text-gray-300" href="/api/auth">sign in</a>
                </div>
                @endauth
            </nav>
        {{$slot}}
        </div>  
    </div>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</body>
</html>