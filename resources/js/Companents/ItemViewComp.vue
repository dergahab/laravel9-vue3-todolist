<template>
   <div class="d-flex align-items-center ml-2">
                <input class="form-check-input me-2 "
                  type="checkbox" 
                  @change="updateCange()"
                  v-on:change="$emit('itemchanged')"
                  v-model="item.completed" 
                   />
                <span :class="item.completed ? 'overline': ''">{{ item.name }}</span>
            </div>
            <div>
                <span v-if="item.completed">
                    {{ item.completed_at }}
                </span>
                <button v-if="!item.completed" @click="removeItem()" class="btn btn-outline ml-1" data-mdb-toggle="tooltip" title="Remove item">
                    <i class="fas fa-times text-primary"></i>
                </button>

                <span class="ml-4" v-if="item.completed">
                    <i class="fa-solid fa-check"></i>
                </span>
            </div>
</template>

<script>
import axios from 'axios'
export default {
emits: ['itemchanged'],
props: ['item'],
methods: {
    updateCange() {
        axios.put('api/items/' + this.item.id, {
            completed: this.item.completed
        })
        .then(response => {
            console.log(response)
            this.$emit('itemchanged')
        })
        .catch(error => {
            console.log(error);
        })
    },
    removeItem() {
        axios.delete('api/items/' + this.item.id)
        .then(response => {
            console.log(response)
            this.$emit('itemchanged')
        })
        .catch(error => {
            console.log(error);
        })
    }

    
}
}
</script>

<style>
.overline {
    text-decoration:line-through;
    opacity: .5 ;
}
</style>