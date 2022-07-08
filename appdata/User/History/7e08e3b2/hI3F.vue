<template>
    <div class="animals-grid">
        <div class="animals-grid__viewport">
            <div ref="scrollArea" class="animals-grid__scroll-area">
                <div ref="grid" class="animals-grid__grid">
                    <div class="animals-grid__item"
                        v-for="animal in animals" :key="animal.name"
                    >
                        <Animal :animal="animal" :size="animal.size" :ageTime="5" :sizeDelta="50" @age="ageAnimal" />
                    </div>
                </div>
            </div>
        </div>
        <div v-if="scrollable" class="animal-grid__alert">&#8594; Scrollable area &#8592;</div>
    </div>
</template>

<script>
import Animal from './Animal.vue'

export default {
  components: { Animal },
    props: {
        animals: Array
    },

    data: () => ({
        mounted: false,
        scrollable: false,

    }),

    methods: {
        ageAnimal(name) {
            this.$emit('age', name)
        },

        onScroll(e) {
            if (e.wheelDelta < 0) 
                this.$refs.scrollArea.scrollLeft += 20
            else
                this.$refs.scrollArea.scrollLeft -= 20
        }
    },

    computed: {
        isScrollable() {
            return this.mounted && this.$refs.scrollArea.clientWidth < this.$refs.grid.clientWidth 
        }
    },

    mounted() {
        this.mounted = true
        this.scrollable = this.$refs.scrollArea.clientWidth < this.$refs.grid.clientWidth
        this.$refs.scrollArea.addEventListener('wheel', this.onScroll)
    },

    destroyed() {
        this.$refs.scrollArea.removeEventListener('wheel', this.onScroll)
    },

    updated() {
        this.scrollable = this.$refs.scrollArea.clientWidth < this.$refs.grid.clientWidth
    }
}
</script>

<style lang="scss" scoped>
    .animals-grid {
        height: 100%;
    }

    .animals-grid__viewport {
        overflow: hidden;
        height: calc(100% - 20px);
    }

    .animals-grid__scroll-area {
        overflow-y: auto;
        overflow-x: scroll;
        height: calc(100% + 20px);
        display: flex;
        align-items: flex-end;
    }

    .animals-grid__grid {
        display: flex;
        justify-content: center;
        align-items: flex-end;
        gap: 50px;
        padding-bottom: 100px;
    }

    .animal-grid__alert {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        background-color: rgb(250, 250, 250, .8);
        padding: 5px 10px;
        border-radius: 16px;
        font-size: 24px;
        animation: 2s linear 1s infinite alternate blink;
        cursor: default;
    }

    @keyframes blink {
        from {
            opacity: 1;
        }
        to {
            opacity: .5;
        }
    }
</style>