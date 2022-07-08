<template>
    <div>
        <button class="btn">
            <img :src="icon" alt="icon" />
        </button>
        <CreateAnimalForm :kind="kind" />
    </div>
</template>

<script>
import CreateAnimalForm from './CreateAnimalForm.vue'
export default {
  components: { CreateAnimalForm },
    props: {
        kind: Object,
        icon: String
    },

    data: () => ({
        showForm: false,
    })
}
</script>

<style lang="scss" scoped>
    .btn {
        width: 40px;
        height: 40px;
        padding: 2px;
        margin: 0;

        background: transparent;
        border: none;

        border-radius: 50%;
        border: 2px solid #3E2723;

        cursor: pointer;

        &Toggle {
            width: 48px;
            height: 48px;
            padding: 0;
            border: none;

            background-color: #3E2723;
        }

        > img {
            width: 24px;
            height: 24px;
            object-fit: contain;
            object-position: center;
        }
    }
</style>