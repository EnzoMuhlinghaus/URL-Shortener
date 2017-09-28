<template>
  <div class="link-create ui form">
    <div class="field">
      <label for="url">Url à raccourcir</label>
      <input type="text" placeholder="http://..." id="url" v-model="url">
    </div>

    <button class="ui primary button" @click="submit">Générer URL</button>

    <div class="ui floating message" v-show="isDone">
      <div class="field">
        <label for="url_shortened">Et voilà !</label>
        <input type="text" id="url_shortened">
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
        isDone: 0
      }
    },
    methods: {
      submit () {
        let urlToSent = {'url': this.url}

        axios.post('http://url-shortener.dev/api/links', urlToSent).then((response) => {
          console.log(response.data)
        }).catch((error) => {
          console.log(error)
        })
      }
    }
  }
</script>