<template>
  <div>
    <nav-menu :pages="pages" @changePage="changePage"></nav-menu>

    <component v-bind:is="currentPage"></component>
  </div>
</template>

<script>
    export default {
      mounted() {
        console.log('Component mounted.')
      },
      data(){
        return {
          pages: [
            { name: 'dogs', label: 'Perros'},
            { name: 'breeds', label: 'Razas'},
            { name: 'sizes', label: 'Tamaños'},
            { name: 'colors', label: 'Colores'},
          ],
          currentPage: 'dogs',
        }
      },
      methods: {
        changePage: function (page) {
          this.currentPage = page;
        }
      }
    }
</script>
