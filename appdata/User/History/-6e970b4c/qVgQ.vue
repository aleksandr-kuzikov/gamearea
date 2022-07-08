<template>
    <div class="main">
        <CreateAnimalBtn v-if="hasKinds" :kinds="kinds" @selectkind="showCreateAnimalDialog" />
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

    import catSvg from '../../assets/images/cat.svg'    

    export default {
        components: {
            CreateAnimalBtn,
            AnimalsGrid,
            CreateAnimalForm
        },

        data: () => ({
            showForm: false,
            selectedKind: null,
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
                .then(response => (this.animals = response.data.map(a => ({...a, icon: catSvg}))))
        },

        methods: {
            showCreateAnimalDialog(kind_name) {
                this.showForm = true
                this.selectedKind = kind_name
            },
            closeCreateAnimalDialog() {
                this.showForm = false
                this.selectedKind = null
            },
            createAnimal(animalData) {
                this.showForm = false
                axios
                    .post('/api/animals', animalData)
                    .then(response => this.animals.push({...response.data, icon: catSvg}))
                    .catch(error => console.log(error))
            },
            ageAnimalRequest(name) {
                axios
                    .post('/api/animals/age', {name})
                        .then(response => this.animals.splice(this.animals.findIndex(a => a.name == name), 1, {...response.data, icon: catSvg}))
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
        background-size: cover;
        background-repeat: no-repeat;

        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
</style>