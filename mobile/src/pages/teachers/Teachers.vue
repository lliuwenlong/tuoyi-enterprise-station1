<template>
    <div>
        <common-header></common-header>      
        <teachers-content></teachers-content>
        <common-footer></common-footer>
    </div> 
</template>

<script>

import CommonHeader     from '@/common/components/Header'
import TeachersContent from './components/Content'
import CommonFooter     from '@/common/components/Footer'

export default {
    name:'Teachers',
    components: {
        CommonHeader,
        TeachersContent,
        CommonFooter
    }
}
</script>

<style scoped>

</style>