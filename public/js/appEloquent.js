let csfr = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

const AppEloquent = {

  data() {
    return {
        word: '',
        frequentWords: [],
        token: csfr
    }
  },
  mounted(){
    
    this.getFrequentWords ()
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
      this.$refs.word.focus()
      this.getFrequentWords ()
    },
    async getFrequentWords () {
      let response = await fetch('/api/frequent')
      this.frequentWords = await response.json()
      console.log(this.frequentWords)
    }
  },
  delimiters: ["[[", "]]"],
}
 
Vue.createApp(AppEloquent).mount('#appEloquent')