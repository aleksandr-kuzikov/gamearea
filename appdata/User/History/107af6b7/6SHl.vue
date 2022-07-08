<template>
    <div class="animal" v-bind:style="{width: maxAnimalSize + 'px'}">
        <span class="animal__title">{{ animal.name }}</span>
        <img ref="animated" :src="kind.icon" alt="icon">
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
            this.$refs.animated.width = this.animalSize
            
            if (this.animalSize < this.maxAnimalSize) {
                console.log(this.maxAnimalSize, this.growUpInFrame, this.animalSize)
                this.growUpInterval = setInterval(() => {
                    console.log(this.$refs.animated.width)
                    if (this.$refs.animated.width >= this.maxAnimalSize) {
                        this.$refs.animated.width = this.maxAnimalSize
                        clearInterval(this.growUpInterval)
                    }
                    this.$refs.animated.width += this.growUpInFrame
                }, 100)
            }
        }
    },

    computed: {
        animalSize() {
            return this.sizeDelta * this.animal.size
        },
        maxAnimalSize() {
            return this.sizeDelta * this.kind.max_size
        },
        ageTimeInMs() {
            return 1000 * this.ageTime
        },
        growUpInFrame() {
            return (this.sizeDelta * this.kind.growth_factor)/this.ageTime/10
        }
    },

    mounted() {
        if (this.animal.age < this.kind.max_age) {
            this.ageEvent()
        }
        this.growUp()
    },
    
    updated() {
        if (this.animal.age == this.kind.max_age) {
            clearInterval(this.interval)
        }
    },


    beforedestroyed() {
        clearInterval(this.interval)
        clearInterval(this.growUpInterval)
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