<template>
    <div>
        <common-header></common-header>      
        <introduce-content></introduce-content>
        <common-footer></common-footer>
    </div> 
</template>

<script>

import CommonHeader     from '@/common/components/Header'
import IntroduceContent from './components/Content'
import CommonFooter     from '@/common/components/Footer'

export default {
    name:'Introduce',
    components: {
        CommonHeader,
        IntroduceContent,
        CommonFooter
    }
}
</script>

<style scoped>

</style>

