let csfr = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

const AppPaginate = {

  data() {
    return {
        token: csfr
    }
  },
  methods:{
    change() {
      this.$refs.form.submit()
    }
  },
  delimiters: ["[[", "]]"],
}
 
Vue.createApp(AppPaginate).mount('#appPaginate')