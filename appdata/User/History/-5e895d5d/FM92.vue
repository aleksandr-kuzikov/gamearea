<template>
    <button class="btn" 
        v-for="kind in kinds"
        @click="showForm=true" 
        :key="kind.kind">
        <img :src="icon" alt="icon" />
    </button>
</template>

<script>
export default {
    props: {
        kind: Object,
        icon: String
    },

    data: () => ({
        showForm: false,
    })
}
</script>