<template>
    <div class="animal" v-bind:style="{width: maxAnimalSizeCss + 'px'}">
        <span class="animal__title">{{ animal.name }}</span>
        <img ref="animated" :src="kind.icon" alt="icon" :width="animalSize">
    </div>
</template>
<script>

export default {
    props: {
        animal: Object,
        size: Number,
        sizeDelta: Number,
        ageTime: Number,
        kind: Object
    },

    data: () => ({
        interval: null,
        growUpInterval: null
    }),

    methods: {
        ageEvent() {
            this.interval = setInterval(() => {
                this.$emit('age', this.animal.name)
            }, this.ageTimeInMs)
        },
        growUp() {
            this.growUpInterval = setInterval(() => {
                if (this.$refs.animated.clientWidth >= maxAnimalSize) {
                    this.$refs.animated.clientWidth = maxAnimalSize
                    clearInterval(this.growUpInterval)
                }
                this.$refs.animated.clientWidth += growUpInSec
            }, 1000)
            let timer = setTimeout(() => {
                clearInterval(inter)
            }, this.ageTimeInMs)
        }
    },

    computed: {
        animalSize() {
            return this.sizeDelta * this.animal.size
        },
        nextAnimalSize() {
            let nextSize = this.animal.size + this.kind.growth_factor
            return this.sizeDelta * (nextSize > this.kind.max_size ? this.kind.max_size : nextSize)
        },
        maxAnimalSize() {
            return this.sizeDelta * this.kind.max_size
        },
        ageTimeInMs() {
            return 1000 * this.ageTime
        },
        growUpInSec() {
            return (this.sizeDelta * this.kind.growth_factor)/this.ageTime
        }
    },

    mounted() {
        if (this.animal.age < this.kind.max_age) {
            this.ageEvent()
        }
    },
    
    updated() {
        if (this.animal.age == this.kind.max_age) {
            clearInterval(this.interval)
        }

        clearInterval(this.growUpInterval)
    },


    beforedestroyed() {
        clearInterval(this.interval)
    }
}
</script>
<style lang="scss" scoped>
    .animal {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .animal__title {
        box-sizing: border-box;
        display: flex;
        align-items: center;
        height: 32px;

        padding: 0 12px;

        border-radius: 8px;
        background-color: rgb(250, 250, 250, .8);

        font-size: 16px;
        text-transform: uppercase;
        margin-bottom: 24px;
    }
</style>