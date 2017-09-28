<template>
  <div id="app">
    <div class="ui two column centered grid">
      <div class="column">
        <h1>Raccourcissez votre URL !</h1>
        <createLink></createLink>
      </div>
    </div>
  </div>
</template>

<script>
  import CreateLink from './components/CreateLink'

  export default {
    name: 'app',
    components: {
      CreateLink
    }
  }
</script>

<style>
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }
</style>
