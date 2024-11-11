let csfr = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

const AppRandomNews = {

  data() {
    return {
        news: [],
        randomNumber: 0,
        isLoading: true,
        token: csfr
    }
  },
  async mounted(){
    if (this.news.length === 0) {
      let response = await fetch('/api/news')
      this.news = await response.json()
    }
    console.log(this.news)
    this.randomNumber = this.getRandomInt(0,this.news.length) 
    this.isLoading = false
  },
  methods:{
    async getRandomNews() {
      this.randomNumber = this.getRandomInt(0,this.news.length) 

    },
    getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
  },
  delimiters: ["[[", "]]"]
  
}
 
Vue.createApp(AppRandomNews).mount('#appRandomNews')