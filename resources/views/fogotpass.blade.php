<x-layout>
    <div class="flex w-full flex-grow items-center">
        <div class="container mx-auto flex items-center justify-center flex-col">
            @if (session('status'))
                <div class="text-green-600 my-3">We have emailed your password reset link</div>
            @endif
            <form class="flex flex-col justify-center" action="/forgot-password" method="post">
                @csrf
                <input class="border-gray-500 border-solid border rounded my-1" type="email" name="email" placeholder="Enter your email" value="{{old('email')}}" required/>
                @error('email')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <button class="px-3 my-1 rounded bg-gray-500 text-white border-gray-500 border-solid border hover:text-gray-300">reset</button>
            </form> 
        </div>
    </div>
</x-layout>