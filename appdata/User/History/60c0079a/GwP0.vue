<template>
    <button v-show="hasAnimals" @click="removeAll">Remove All</button>
</template>
<script>
export default {
    methods: {
        removeAll() {
            axios
                .delete('/api/animals/all')
                .then(response => {
                    this.showed = false
                    this.$emit('removeAnimals')
                })
        }
    }
}
</script>

<style lang="scss" scoped>
    button {
        
    }
</style>