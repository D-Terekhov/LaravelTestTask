<x-layout>
    <div id="appEloquent" v-cloak>
        <div class="flex w-full flex-grow">
            <div class="container mx-auto flex items-center  flex-col">
                <h3 class="font-bold my-3 text-xl">Add word in database</h3>
                <form @submit.prevent="addWord">
                    <input ref="word" class="border-gray-500 border-solid border rounded my-1" name="word" type="text" placeholder="input word" v-model="word" required autofocus/>
                    <button class="px-3 ml-1 my-1 rounded bg-gray-500 text-white border-gray-500 border-solid border rounded hover:text-gray-300">Add word</button>
                </form>
                <div class="flex flex-col justify-center">
                    <h2 class="font-bold my-3 text-xl text-center">The list of the most popular words in the database in descending order of their frequency of use</h2>
                    {{-- <div class="flex justify-center">
                        <button class="px-3 my-3 rounded bg-gray-500 text-white hover:text-gray-300" v-on:click="getFrequentWords">Get data</button>
                    </div> --}}
                    <div class="flex flex-col items-center">
                        <table>
                            <tr><th>Word</th><th>Count</th></tr>
                            <tr class="text-center" v-for="word in frequentWords"><td>[[word.word]]</td><td>[[word.total]]</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script type="text/javascript" src="/js/appEloquent.js"></script> 