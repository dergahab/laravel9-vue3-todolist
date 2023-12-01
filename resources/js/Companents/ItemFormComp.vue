<template>
  <div class="input-group mb-3">
  <input type="text" v-model="name" class="form-control" >
  <button class="btn btn-success " :class="[name  ? '' : '']" @click="addItem()" type="button" >+</button>
</div>

</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            name: ''
        }
    },
    emits: ['itemchanged'],
    methods: {
        addItem() {
            if( this.name == '') {
                return ;
            }

            axios.post('api/items',{
                name: this.name
            })
            .then(response => {
                if(response){
                    console.log(response.status == 201);
                    this.name = ''
                    this.$emit('reloadlist')
                }
            })
            .catch(e => {
                console.log(e)
            })
        }
    }
}
</script>

<style>

</style>