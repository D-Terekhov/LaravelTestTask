let csfr = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

const App = {

  data() {
    return {
        news: [],
        randomNumber: 0,
        word: '',
        frequentWords: [],
        token: csfr
    }
  },
  methods:{
    async addWord() {
      console.log(this.word)
      await fetch('/api/addword', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify({word: this.word,
                            _token: this.token
        })
      });
      this.word=''
    },
    mounetd(){
      console.log('asdasd')
    },
    async getNewsArr() {
        if (this.news.length === 0) {
            let response = await fetch('/api/news')
            this.news = await response.json()
        }
        this.randomNumber = this.getRandomInt(0,this.news.length) 

    },
    getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    },
    async getFrequentWords () {
      let response = await fetch('/api/frequent')
      this.frequentWords = await response.json()

    }
  },
  delimiters: ["[[", "]]"],
}
 
Vue.createApp(App).mount('#app')