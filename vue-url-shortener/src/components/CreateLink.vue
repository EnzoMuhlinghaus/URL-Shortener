<template>
  <div class="link-create ui form">
    <div class="ui red message" v-show="error">URL Invalide !</div>

    <div class="field" :class="error">
      <label for="url">Url à raccourcir</label>
      <input type="text" placeholder="http://..." id="url" v-model="url" @keyup="clear">
    </div>

    <button class="ui primary button" :class="loading" @click="submit">Générer URL</button>

    <div class="ui floating message" v-show="isDone">
      <div class="field">
        <label for="shortened_url">Et voilà !</label>
        <input type="text" id="shortened_url" :value="shortenedUrl">
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: 'CreateLink',
    data: () => {
      return {
        url: '',
        isDone: 0,
        shortenedUrl: '',
        loading: '',
        error: ''
      }
    },
    methods: {
      clear () {
        if (this.url === '') {
          this.error = ''
        }
      },
      submit () {
        if (this.url !== '') {
          this.error = ''
          this.loading = 'loading'
          let urlToSent = {'url': this.url}

          axios.post('http://url-shortener.dev/api/links', urlToSent).then((response) => {
            this.loading = ''
            this.shortenedUrl = response.data
            this.isDone = 1
          }).catch(() => {
            this.loading = ''
            this.error = 'error'
            this.isDone = 0
          })
        } else {
          this.error = 'error'
        }
      }
    }
  }
</script>