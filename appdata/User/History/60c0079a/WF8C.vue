<template>
    <button @click="removeAll" class="button">Remove All</button>
</template>
<script>
export default {
    data: () => ({
        loading: false
    }),

    methods: {
        removeAll() {
            this.loading = true
            axios
                .delete('/api/animals/all')
                .then(response => {
                    this.loading = false
                    this.$emit('removeAnimals')
                })
        }
    }
}
</script>

<style lang="scss" scoped>
    button {
        position: absolute;
        right: 100px;
        top: 100px;
        z-index: 99;
    }
</style>