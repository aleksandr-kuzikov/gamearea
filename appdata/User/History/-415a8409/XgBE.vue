<template>
    <form @submit.prevent="submitForm" class="form">
        <div class="form__main">
            <div class="form__icon">
                <img src="../../assets/images/cat.svg" alt="">
            </div>
            <input class="form__input"
                :placeholder="placeholder"  
                v-model="name"
                type="text"  
                ref="nameInput"
            >
        </div>
        <div class="form__footer">
            <button>Create</button>
            <button @click="$emit('close')">Cancel</button>
        </div>
    </form>
</template>
<script>
export default {
    props: {
        kind: String
    },

    data: () => ({
        name: ''
    }),

    computed: {
        placeholder() {
            return this.kind + " name"
        }
    },

    methods: {
        submitForm() {
            this.$emit('createanimal', {
                name: this.name,
                kind: this.kind
            })
        }
    },

    mounted() {
        this.$refs.nameInput.focus()
    }
}
</script>
<style lang="scss" scoped>
    @import url("https://fonts.googleapis.com/css?family=Fjalla+One&display=swap");

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

    button {
        display: block;
        font-family: "Fjalla One";
        margin: 0 auto;
        line-height: 32px;
        padding: 0 20px;
        background: #ffa580;
        letter-spacing: 2px;
        transition: 0.2s all ease-in-out;
        outline: none;
        border: 1px solid black;
        box-shadow: 3px 3px 1px 1px #95a4ff, 3px 3px 1px 2px black;
        cursor: pointer;

        &:hover {
            background: black;
            color: white;
            border: 1px solid black;
        }
    }
</style>