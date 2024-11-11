<x-layout>
    <div id="appPaginate" v-cloak>
        <div class="flex w-full flex-grow">
            <div class="container mx-auto flex items-center flex-col">
                <form ref="form" class="flex flex-col mt-10" action="/api/paginate" method="post">
                    @csrf
                    <label for="countItems">Count items on the page  <select v-on:change="change" class="border-gray-400 border-solid border rounded" id="countItems" name="countItems" value=<?php if (isset($count)) echo $count ?>>
                        <option v-for="n in 5">[[ n * 5 ]]</option>
                    </select></label>
                </form>
                @if (isset($words)) 
                <div class="my-5">
                    @foreach ($words as $word)
                        <span> {{ $word->word }} </span>
                    @endforeach
                </div>
                <p>{{ $words->links() }}</p>
                @endif
            </div>
        </div>
    </div>
</x-layout>

<script type="text/javascript" src="/js/appPaginate.js"></script> 