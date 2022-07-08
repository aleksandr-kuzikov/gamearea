<template>
    <form @submit.prevent="submitForm" class="form">
        <div class="form__loading" v-if="loading">
            <Loader />
        </div>
        <div class="form__main">
            <div class="form__icon">
                <img :src="kind.icon" alt="icon">
            </div>
            <input class="form__input"
                :placeholder="placeholder"  
                v-model="name"
                type="text"  
                ref="nameInput"
            >
        </div>
        <div class="form__footer">
            <button class="button">Create</button>
            <button class="button" @click="$emit('close')">Cancel</button>
        </div>
    </form>
</template>
<script>
import Loader from './Loader.vue'

export default {
    components: {
        Loader
    },

    props: {
        kind: Object
    },

    data: () => ({
        name: '',
        loading: false
    }),

    computed: {
        placeholder() {
            return this.kind.kind + " name"
        }
    },

    methods: {
        submitForm() {
            this.loading = true
            axios
                .post('/api/animals', {
                    name: this.name,
                    kind: this.kind.kind
                })
                .then(response => {
                    this.loading = false
                    this.$emit('createanimal', response.data)
                })
                .catch(error => {
                    this.loading = false
                    this.$emit('close')
                })
        }
    },

    mounted() {
        this.$refs.nameInput.focus()
    }
}
</script>
<style lang="scss" scoped>
    .form {
        background: #f8f4e5;
        padding: 40px;
        border: 2px solid black;
        box-shadow: 15px 15px 1px #ffa580, 15px 15px 1px 2px black;

        position: absolute;
        top: 50%;
        left: 50%;

        transform: translateX(-50%) translateY(-50%);
    }

    .form__loading {
        background: #f8f4e5;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
    }

    .form__main {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 32px;
        height: 64px;
    }

    .form__input {
        display: block;
        width: 100%;
        font-size: 18px;
        line-height: 28px;
        font-family: "Fjalla One";
        border: none;
        border-bottom: 5px solid black;
        background: #f8f4e5;
        outline: none;
        color: black;
        
        &:focus {
            border-bottom: 5px solid #ffa580;
        }
    }

    .form__icon {
        height: 100%;
        > img {
            height: 100%;
        }
    }

    .form__footer {
        display: flex;
    }
</style>