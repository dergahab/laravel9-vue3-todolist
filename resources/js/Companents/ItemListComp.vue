<template>

    <ul class="list-group">
        <li v-for="item in items" :key="item.id"
            class="list-group-item d-flex justify-content-between align-items-center">
            <ItemViewComp :item="item" 
            v-on:itemchanged="$emit('reloadlist')"
            />
        </li>

    </ul>
</template>

<script>
    import ItemViewComp from './ItemViewComp.vue';
    export default {
        props: ['items'],
        emits: ['itemchanged'],
        components: {
            ItemViewComp
        }

    }
</script>

<style>

</style>