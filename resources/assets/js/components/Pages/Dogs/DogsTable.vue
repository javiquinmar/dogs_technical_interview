<template>
  <div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <div class="p-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
          </div>
          <input type="text" v-model="search" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar">
        </div>
      </div>
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              Imagen
            </th>
            <th scope="col" class="p-4">
              <div @click.prevent="changeOrder('name')" class="flex items-center">
                Nombre
                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg></a>
              </div>
            </th>
            <th scope="col" class="px-6 py-3">
              <div @click.prevent="changeOrder('breed.name')" class="flex items-center">
                Raza
                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg></a>
              </div>
            </th>
            <th scope="col" class="px-6 py-3">
              <div @click.prevent="changeOrder('color.name')" class="flex items-center">
                Color
                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg></a>
              </div>
            </th>
            <th scope="col" class="px-6 py-3">
              <div @click.prevent="changeOrder('size.name')" class="flex items-center">
                Tamaño
                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg></a>
              </div>
            </th>
            <th scope="col" class="px-6 py-3">
              <div @click.prevent="changeOrder('age')" class="flex items-center">
                Edad
                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg></a>
              </div>
            </th>
            <th scope="col" class="px-6 py-3" @click.prevent="changeOrder('weight')">
              <div class="flex items-center">
                Peso
                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg></a>
              </div>
            </th>
            <th scope="col" class="px-6 py-3">
              Acciones
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="dog in itemsToShow" :key="dog.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">
              <img :src="dog.image" :alt="dog.name" class="h-12 mx-auto">
            </td>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ dog.name }}
            </th>
            <td class="px-6 py-4">{{ dog.breed.name }}</td>
            <td class="px-6 py-4">{{ dog.color.name }}</td>
            <td class="px-6 py-4">{{ dog.size.name }}</td>
            <td class="px-6 py-4">{{ dog.age }}</td>
            <td class="px-6 py-4">{{ dog.weight }}</td>
            <td class="px-6 py-4">
              <div class="flex justify-between items-center">
                <a href="#" @click="$emit('editDog', dog.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                </a>
                <a href="#" @click="removeDog(dog.id)" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
                </a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Mostrando <span
            class="font-semibold text-gray-900 dark:text-white">{{ firstOfRange }} - {{ lastOfRange }}</span> de <span
            class="font-semibold text-gray-900 dark:text-white">{{ totalItems }}</span></span>
        <ul class="inline-flex -space-x-px text-sm h-8">
          <li @click.prevent="currentPage = Math.max(currentPage-1, 1)">
            <a href="#"
               class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Anterior
            </a>
          </li>
          <li v-for="num in numPagesToShowInPagination" @click.prevent="currentPage = num">
            <a href="#"
              :class="currentPage == num ? 'bg-blue-50' : 'bg-white'"
              class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500  border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            {{ num }}</a>
          </li>
          <li @click.prevent="currentPage = Math.min(currentPage+1, totalPages)">
            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
              Siguiente
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>

import axios from "axios";

export default {
  props: {
    dogs: {
      type: Array,
      required: true
    },
  },
  data(){
    return {
      dogsData: this.dogs,
      currentPage: 1,
      itemsPage: 15,
      search: '',
      orderBy: {
        field: 'id',
        direction: 'desc'
      }
    }
  },
  computed: {
    totalItems() {
      return this.dogsData.length;
    },
    totalPages() {
      const totalPages = Math.ceil(this.totalItems / this.itemsPage);
      if (this.currentPage > totalPages) {
        this.currentPage = 1;
      }
      return totalPages;
    },
    firstOfRange() {
      return (this.currentPage - 1) * this.itemsPage + 1;
    },
    lastOfRange() {
      return Math.min((this.currentPage * this.itemsPage), this.totalItems);
    },
    numPagesToShowInPagination() {
      let numPagesToShow = [];
      if (this.totalPages > 5 && this.currentPage > 3) {
        numPagesToShow = [this.currentPage-2, this.currentPage-1, this.currentPage, this.currentPage+1, this.currentPage+2];
      } else {
        for (let i=1; i<=this.totalPages; i++) {
          numPagesToShow.push(i);
        }
      }

      return numPagesToShow;
    },
    itemsToShow() {
      this.dogsData = this.dogs.filter(dog => {
        return dog.name.toLowerCase().includes(this.search.toLowerCase())
          || dog.breed.name.toLowerCase().includes(this.search.toLowerCase())
          || dog.color.name.toLowerCase().includes(this.search.toLowerCase())
          || dog.size.name.toLowerCase().includes(this.search.toLowerCase())
      });

      return this.dogsData
        .sort(this.compare)
        .slice(this.firstOfRange-1, this.lastOfRange);
    }
  },
  methods: {
    changeOrder(field) {
      if (field !== this.orderBy.field) {
        this.orderBy.field     = field;
        this.orderBy.direction = 'asc';
        return;
      }

      if (this.orderBy.direction === 'desc') {
        this.orderBy.field     = 'id';
        this.orderBy.direction = 'desc';
        return;
      }

      if (this.orderBy.direction === 'asc') {
        this.orderBy.direction = 'desc';
      }
    },
    compare( a, b ) {
      const multiplyOrder = this.orderBy.direction === 'asc' ? 1 : -1;

      if (this.orderBy.field.includes('.')){
        const parts = this.orderBy.field.split('.')
        console.log(a[parts[0]][parts[1]], b[parts[0]][parts[1]])
        if (a[parts[0]][parts[1]] < b[parts[0]][parts[1]]) {
          return -1 * multiplyOrder;
        }
        if (a[parts[0]][parts[1]] > b[parts[0]][parts[1]]) {
          return 1 * multiplyOrder;
        }
        return 0;
      } else {
        if (a[this.orderBy.field] < b[this.orderBy.field]) {
          return -1 * multiplyOrder;
        }
        if (a[this.orderBy.field] > b[this.orderBy.field]) {
          return 1 * multiplyOrder;
        }
        return 0;
      }
    },
    removeDog(dogId) {
      const result = confirm('¿Está seguro que desea borrarlo?');

      if (!result) {
        return;
      }

      axios.delete(`api/dogs/${dogId}`)
          .then((result) => {
            this.$emit('updateDogs');
            this.$toast.success("Perro eliminado con éxito");
          })
          .catch(err => {
            this.$toast.error('Ocurrió un error inesperdo');
          })
          .finally(() => {
            this.loading = false;
          })
      ;
    }
  },
}
</script>
