<template>
    <button v-show="hasAnimals" @click="removeAll">Remove All</button>
</template>
<script>
export default {
    props: {
        hasAnimals: {
            type: Boolean,
            default() {
                return false
            }
        }
    },

    data: () => {
        showed: false
    },

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