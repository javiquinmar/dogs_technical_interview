<template>
  <div>
    <form class="space-y-6" action="#">
      <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
        <input type="text" v-model="dog.name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Escribe el nombre del perro..." required>
      </div>
      <div>
        <label for="breed" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raza</label>
        <select v-model="dog.breed_id" id="breed" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option v-for="breed in breeds" :key="breed.id" :value="breed.id">{{ breed.name }}</option>
        </select>
      </div>
      <div>
        <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
        <select v-model="dog.color_id" id="color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option v-for="color in colors" :key="color.id" :value="color.id">{{ color.name }}</option>
        </select>
      </div>
      <div>
        <label for="size" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tamaño</label>
        <select v-model="dog.size_id" id="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option v-for="size in sizes" :key="size.id" :value="size.id">{{ size.name }}</option>
        </select>
      </div>
      <div>
        <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edad</label>
        <input type="number" v-model="dog.age" name="age" id="age" min="0" max="30" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Años del perro...">
      </div>
      <div>
        <label for="weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peso</label>
        <input type="number" v-model="dog.weight" name="weight" id="weight" min="0" max="100" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Peso apróximado del perro...">
      </div>
      <div>
        <div v-if="dog.image && typeof(dog.image) === 'string'" class="my-4">
          <img :src="dog.image" :alt="dog.name">
        </div>
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
        <input type="file" name="image" class="form-control" @change="onImageChange">
      </div>

      <button type="submit" @click.prevent="saveDog()" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
    </form>
  </div>
</template>

<script>
  import axios from "axios";
  export default {
    props: {
      currentDog: {
        type: Object,
        required: true,
      }
    },
    data(){
      return {
        loading: false,
        dog: {
          id: null,
          name: '',
          breed_id: null,
          color_id: null,
          size_id: null,
          age: null,
          weight: null,
          image: null,
        },
        breeds: [],
        colors: [],
        sizes: [],
      }
    },
    watch: {
      currentDog(newValue, oldValue) {
        this.dog = {...newValue};
      }
    },
    mounted() {
      this.dog = this.currentDog;
      this.fetchBreeds();
      this.fetchColors();
      this.fetchSizes();
    },
    methods: {
      saveDog() {
        const config = {
          headers: {
            'content-type': 'multipart/form-data'
          }
        }

        let data = new FormData();
        if (this.dog.id) {
          data.append('_method', 'put');
        }
        data.append('id', this.dog.id);
        data.append('name', this.dog.name);
        data.append('breed_id', this.dog.breed_id);
        data.append('color_id', this.dog.color_id);
        data.append('size_id', this.dog.size_id);

        if (this.dog.age) data.append('age', this.dog.age);
        if (this.dog.weight) data.append('weight', this.dog.weight);
        if (this.dog.image && typeof(this.dog.image) === 'object' ) data.append('image', this.dog.image);

        if (this.dog.id) {
          axios.post(`api/dogs/${this.dog.id}`, data, config)
              .then((result) => {
                this.$emit('updateDogs');
                this.$emit('closeModal');
                this.$toast.success("Perro actualizado con éxito");
              })
              .catch(err => {
                if (err.response.status === 422){
                  Object.values(err.response.data).forEach(e => {
                    this.$toast.error(e[0]);
                  })
                } else {
                  this.$toast.error('Ocurrió un error inesperdo');
                }
              })
              .finally(() => {
                this.dog.image = null;
                this.loading = false
              })
          ;
        } else {
          axios.post("api/dogs", data, config)
              .then((result) => {
                this.$emit('updateDogs');
                this.$emit('closeModal');
                this.$toast.success("Perro creado con éxito");
              })
              .catch(err => {
                if (err.response.status === 422){
                  Object.values(err.response.data).forEach(e => {
                    this.$toast.error(e[0]);
                  })
                } else {
                  this.$toast.error('Ocurrió un error inesperdo');
                }
              })
              .finally(() => {
                this.dog.image = null;
                this.loading = false
              })
          ;
        }

      },

      fetchBreeds() {
        this.loading = true;
        axios.get("api/breeds")
            .then((result) => {
              this.breeds = result.data;
            })
            .catch(err => this.$toast.error('Ocurrió un error inesperdo al obtener las razas'))
            .finally(() => this.loading = false)
        ;
      },

      fetchColors() {
        this.loading = true;
        axios.get("api/colors")
            .then((result) => {
              this.colors = result.data;
            })
            .catch(err => this.$toast.error('Ocurrió un error inesperdo al obtener los colores'))
            .finally(() => this.loading = false)
        ;
      },

      fetchSizes() {
        this.loading = true;
        axios.get("api/sizes")
            .then((result) => {
              this.sizes = result.data;
            })
            .catch(err => this.$toast.error('Ocurrió un error inesperdo al obtener las tallas'))
            .finally(() => this.loading = false)
        ;
      },

      onImageChange(e) {
        this.dog.image = e.target.files[0];
      }
    },

}
</script>
