<template>
    <div class="main">
        <CreateAnimalBtn v-if="hasKinds" :kinds="kinds" @selectkind="showCreateAnimalDialog" />
        <RemoveAllBtn v-if="hasAnimals" @removeAnimals="removeAnimals" />
        <AnimalsGrid v-if="hasAnimals" :animals="animals" :kinds="kinds" @age="ageAnimalRequest" />
        <CreateAnimalForm v-if="showForm" 
            :kind="selectedKind" 
            @close="closeCreateAnimalDialog"
            @createanimal = "createAnimal"
        />
    </div>
</template>
<script>
    import CreateAnimalBtn from './CreateAnimalBtns.vue'
    import AnimalsGrid from './AnimalsGrid.vue'
    import CreateAnimalForm from './CreateAnimalForm.vue'
    import RemoveAllBtn from './RemoveAllBtn.vue'

    export default {
        components: {
            CreateAnimalBtn,
            AnimalsGrid,
            CreateAnimalForm,
            RemoveAllBtn
        },

        data: () => ({
            showForm: false,
            selectedKind: Object,
            kinds: [],
            animals: []
        }),

        computed: {
            hasKinds() {
                return this.kinds.length > 0
            },
            hasAnimals() {
                return this.animals.length > 0
            }
        },

        mounted() {
            axios
                .get('/api/animal_kinds')
                .then(response => (this.kinds = response.data))

            axios
                .get('/api/animals')
                .then(response => (this.animals = response.data))
        },

        methods: {
            showCreateAnimalDialog(kind_name) {
                this.showForm = true
                this.selectedKind = this.kinds.find(k => k.kind == kind_name)
            },
            closeCreateAnimalDialog() {
                this.showForm = false
                this.selectedKind = null
            },
            createAnimal(animalData) {
                this.showForm = false
                this.animals.push(animalData)
            },
            ageAnimalRequest(name) {
                axios
                    .post('/api/animals/age', {name})
                    .then(response => this.animals.splice(this.animals.findIndex(a => a.name == name), 1, response.data))
            },
            removeAnimals() {
                 this.animals = []
            }
        }
    }
</script>

<style lang="scss">
    @import url("https://fonts.googleapis.com/css?family=Fjalla+One&display=swap");

    * {
        font-family: "Fjalla One";
    }

    body {margin: 0;}
    
    .main {
        background-image: url(https://krot.info/uploads/posts/2020-10/1603666099_10-p-fon-polyanka-11.jpg);
        background-size: cover;
        background-position: bottom center;
        background-repeat: no-repeat;

        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
    
    .button {
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