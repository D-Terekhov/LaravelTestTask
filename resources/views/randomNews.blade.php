<x-layout>
    <div id="appRandomNews" v-cloak >
        <div v-if="isLoading" class="flex justify-center w-full flex-grow items-center mt-20">
            <div class="loader"></div>
        </div>
        <div v-else class="flex w-full flex-grow">
            <div class="container mx-auto flex items-center flex-col"> 
                <div class="flex items-center flex-col">
                    <button  class="py-1 px-3 my-5 rounded bg-gray-500 text-white hover:text-gray-300" v-on:click="getRandomNews">Next news</button> 
                    <div v-if="news.length > 0">
                        <div class="my-2"><h2 class="font-bold text-2xl text-center">[[news[randomNumber].title]]</h2></div>
                        <div class="my-2"><p>[[news[randomNumber].description]]</p></div>
                        <div class="my-2 flex justify-center"><img :src="[[news[randomNumber].urlToImage]]" alt="No image"/></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script type="text/javascript" src="/js/appRandomNews.js"></script> 