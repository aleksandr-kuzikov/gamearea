<template>
    <div class="controls">
        <button class="btn btnToggle"
            v-on:click="onToggleShowBtn">
            <img src="../../assets/images/add.svg" alt="">
        </button>
        <div class="controls__switchable-area">
            <transition name="show">
                <div class="controls__switchable" v-if="show">
                    <button class="btn" 
                        v-for="animal in animals" 
                        :key="animal.kind">
                        <img :src="animal.icon" alt="icon" />
                    </button>
                </div>
            </transition>
        </div>
    </div>
</template>

<style lang="scss" scoped>

    .controls {
        display: flex;

        height: 48px;

        position: absolute;
        top: 100px;
        left: 100px;
    }

    .controls__switchable-area {
        overflow: hidden;

        position: absolute;
        left: 24px;
        top: 0;
        bottom: 0;

        z-index: -1;
    }

    .controls__switchable {
        display: flex;
        align-items: center;
        
        gap: 6px;

        height: 100%;

        position: relative;
        left: 0;

        background-color: #D7CCC8;

        border-radius: 0 8px 8px 0;
        
        padding: 0 12px 0 (18px + 24px);
    }

    
    .show-enter-active, .show-leave-active {
       transition: left .5s;
    }
    .show-enter, .show-leave-to {
        left: -100%;
    }

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

<script>
import catSvg from '../../assets/images/cat.svg'
import dogSvg from '../../assets/images/dog.svg'
import birdSvg from '../../assets/images/bird.svg'
import bearSvg from '../../assets/images/bear.svg'

export default {
    components: {
        
    },

    data: () => ({
        show: true,
        animals: [
            {
                kind: 'Cat',
                icon: catSvg
            },
            {
                kind: 'Dog',
                icon: dogSvg
            },
            {
                kind: 'Bird',
                icon: birdSvg
            },
            {
                kind: 'Bear',
                icon: bearSvg
            }
        ]
    }),

    mounted() {
        
    },

    methods: {
        onToggleShowBtn() {
            this.show = !this.show
        }
    }
}
</script>