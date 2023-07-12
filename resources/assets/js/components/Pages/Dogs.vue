<template>
  <div>
    <h1 class="active">Perros</h1>
    <table class="table table-responsive">
      <thead>
        <tr>
          <th></th>
          <th>Nombre</th>
          <th>Raza</th>
          <th>Color</th>
          <th>Tamaño</th>
          <th>Edad</th>
          <th>Peso</th>
        </tr>
      </thead>
      <tbody>

<!--        <tr>-->
<!--          <td class="active">Imagen</td>-->
<!--          <td class="success">Nombre</td>-->
<!--          <td class="warning">Raza</td>-->
<!--          <td class="danger">Color</td>-->
<!--          <td class="info">Tamaño</td>-->
<!--          <td class="info">Edad</td>-->
<!--          <td class="info">Peso</td>-->
<!--        </tr>-->
      </tbody>
    </table>
  </div>
</template>

<script>
    export default {
      mounted() {
        console.log('Component mounted.')
      },
      data(){
        return {

        }
      },
      methods: {

      }
    }
</script>
