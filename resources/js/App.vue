<template>
  <div class="container mt-5 d-flex justify-content-center">
       
          <div class="card border-0 text-center w-50"  >
            <h4 class="card-title">Todo List</h4>
            <item-form-comp v-on:reloadlist="getList()" />

            <item-list-comp :items="items" 
            v-on:reloadlist="getList()"
            />
          </div>
       
          </div>
</template>

<script>
import ItemListComp from './Companents/ItemListComp.vue';
import ItemFormComp from './Companents/ItemFormComp.vue';

import axios from 'axios';
export default {
components: {
    ItemListComp ,ItemFormComp,
    ItemFormComp
},
data() {
    return {
        items: ''
    }
},
methods: {
    getList(){
        axios.get('api/items')
            .then(response => {
                this.items = response.data.data
                console.log(response.data)
            })
            .catch(error => {
                console.log(error)
            })
    }
},
created() {
    this.getList();
}
}
</script>

<style>

</style>