<template>
    <button type="button" class="p_form-keep-btn" :class="{ 'keep': keepFlg }" @click="keepToggle">
        <i class="fa-solid fa-thumbtack"></i>
        <input name="keep" class="p_form-keep-input" type="checkbox" :checked="keepFlg">
    </button>
</template>

<script>
    export default {
        data: function(){
            return{
                keepFlg : false,
            }
        },
        methods: {
            keepToggle: function(){
                this.keepFlg = !this.keepFlg;
            }
        }
    }
</script>
