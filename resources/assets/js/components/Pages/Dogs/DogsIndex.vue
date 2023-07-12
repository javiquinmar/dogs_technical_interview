<template>
  <div>
    <div class="flex justify-between items-center my-">
      <h1 class="text-5xl font-extrabold">Perros</h1>
      <!-- Modal toggle -->
      <button @click="resetCurrentDog" ref="modal-open-button" data-modal-target="add-modal" data-modal-toggle="add-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Nuevo
      </button>
    </div>

    <!-- Main modal -->
    <div id="add-modal" tabindex="-1" aria-hidden="true" class="animate__fadeIn fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <button ref="closeModal" id="closeModal" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
          <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-2xl font-medium text-gray-900 dark:text-white">{{ title }}</h3>
            <dogs-form :currentDog="currentDog" @updateDogs="fetchDogs" @closeModal="closeModal"></dogs-form>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-8">
      <dogs-table :dogs="dogs" @editDog="editDog"></dogs-table>
    </div>

  </div>
</template>

<script>
  import axios from "axios";
  export default {
    data(){
      return {
        loading: false,
        dogs: [],
        initialDog: {
          id: null,
          name: '',
          breed_id: null,
          color_id: null,
          size_id: null,
          age: null,
          weight: null,
          image: null,
        },
        currentDog: {
          id: null,
          name: '',
          breed_id: null,
          color_id: null,
          size_id: null,
          age: null,
          weight: null,
          image: null,
        },
      }
    },
    computed: {
      title() {
        return this.currentDog.id ? 'Editar perro' : 'Crear perro';
      },
    },
    mounted() {
      this.fetchDogs();
    },
    methods: {
      fetchDogs() {
        this.loading = true;
        axios.get("api/dogs")
          .then((result) => {
            this.dogs = result.data.data;
          })
            .catch(err => this.$toast.error('Ocurrió un error inesperdo al obtener los perros'))
          .finally(() => this.loading = false)
        ;
      },
      editDog(dogId) {
        this.$refs['modal-open-button'].click();
        const dogTemp = this.dogs.find(dog => dog.id === dogId);

        this.currentDog = {
          id: dogTemp.id,
          name: dogTemp.name,
          breed_id: dogTemp.breed.id,
          color_id: dogTemp.color.id,
          size_id: dogTemp.size.id,
          age: dogTemp.age,
          weight: dogTemp.weight,
          image: dogTemp.image,
        };

      },
      resetCurrentDog() {
        this.currentDog = {...this.initialDog};
      },
      closeModal() {
        this.$refs['closeModal'].click();
      },
    }
}
</script>
