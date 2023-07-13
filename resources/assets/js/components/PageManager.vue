<template>
  <div>
    <nav-menu :pages="pages" @changePage="changePage"></nav-menu>

    <div class="container mx-auto my-8">
      <component v-bind:is="currentPage"></component>
    </div>
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
            { name: 'dogs-index', label: 'Perros'},
            { name: 'breeds', label: 'Razas'},
            { name: 'sizes', label: 'Tamaños'},
            { name: 'colors', label: 'Colores'},
          ],
          currentPage: 'dogs-index',
        }
      },
      methods: {
        changePage: function (page) {
          this.currentPage = page;
        }
      }
    }
</script>
