<template>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li v-for="page in pages" v-bind:class="{active: currentPage === page.name}">
            <a href="#" @click="changePage(page.name)">
              {{ page.label }}
            </a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</template>

<script>
    export default {
      mounted() {
          console.log('Component mounted.')
      },
      props: {
        pages: {
          type: Array,
          required: true
        },
      },
      data() {
        return {
          currentPage: 'dogs'
        }
      },
      methods: {
        changePage: function (page) {
          this.currentPage = page;
          this.$emit('changePage', page);
        }
      }
    }
</script>
