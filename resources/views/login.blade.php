<x-layout>
    <div class="flex w-full flex-grow items-center">
        <div class="container mx-auto flex items-center justify-center flex-col">
            <h1 class="text-3xl">LOGIN</h1>
    <form class="flex items-center justify-center flex-col " action="/api/auth" method="post">
        @csrf
        <input class="border-gray-500 border-solid border rounded my-1" name="email" placeholder="email" value="{{old('email')}}"/>
        @error('email')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <input class="border-gray-500 border-solid border rounded my-1" name="password" type="password" placeholder="password"/>
        @error('password')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <button class="py-1 px-3 my-1 rounded bg-gray-500 text-white hover:text-gray-300">sign in</button>   
    </form>
    <form action="{{route('password.request')}}">
        @csrf
        <button>Forgot password?</button>
    </form>
        </div>        
    </div>
    
</x-layout>
