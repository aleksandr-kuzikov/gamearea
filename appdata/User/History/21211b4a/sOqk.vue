<template>
    <div>
        <div class="controls">
            <button class="btn btnToggle"
                v-on:click="show = !show">
                <img src="../../assets/images/add.svg" alt="">
            </button>
            <div v-if="kinds.length > 0" class="controls__switchable-area">
                <transition name="show">
                    <div class="controls__switchable" v-if="kinds.length > 0 && show">
                        <button class="btn" 
                            v-for="kind in kinds"
                            v-on:click="$emit('create:kind', kind.kind)" 
                            :key="kind.kind">
                            <img :src="animals.find(a => a.kind == kind.kind).icon" alt="icon" />
                        </button>
                    </div>
                </transition>
            </div>
        </div>
        <div class="create_form">
            <div>
                <div>
                    <h4>Как назовем вашего питомца?</h4>
                    <input type="text">
                </div>
                <img src="../../assets/images/cat.svg" alt="">
            </div>
            <div>
                <button>Создать</button>
                <button>Отмена</button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>

    .create_form {
        background-color: #bbd9ec;
        padding: 16px;
        border-radius: 5px;

        position: absolute;
        top: 50%;
        left: 50%;

        transform: translateX(-50%) translateY(-50%);
    }

    .controls {
        display: flex;

        height: 48px;

        position: absolute;
        top: 100px;
        left: 100px;

        z-index: 99;
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
    props: {
        kinds: Array
    },
    components: {
        
    },

    data: () => ({
        show: false,
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
    }
}
</script>