<template>
    <div class="controls">
        <button class="btn btnToggle"
            v-on:click="show = !show">
            <img src="../../assets/images/add.svg" alt="">
        </button>
        <div class="controls__switchable-area">
            <transition name="show">
                <div class="controls__switchable" v-show="show">
                    <button class="btn" 
                        v-for="kind in kinds"
                        @click="selectKind(kind.kind)" 
                        :key="kind.kind">
                        <img :src="kind.icon" alt="icon" />
                    </button>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        kinds: Array,
        onClickBtn: Function
    },

    data: () => ({
        show: false
    }),

    methods: {
        selectKind(kind_name) {
            this.show = false
            this.$emit('selectkind', kind_name)
        }
    }
}
</script>

<style lang="scss" scoped>
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
