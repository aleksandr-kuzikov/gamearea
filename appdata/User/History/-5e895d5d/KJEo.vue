<template>
    <button class="btn" 
        v-for="kind in kinds"
        @click="showForm=true" 
        :key="kind.kind">
        <img :src="animals.find(a => a.kind == kind.kind).icon" alt="icon" />
    </button>
</template>

<script>
export default {
    data: () => ({
        showForm: false,
    })
}
</script>