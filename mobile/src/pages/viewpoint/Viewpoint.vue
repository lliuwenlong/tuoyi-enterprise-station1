<template>
    <div>
        <common-header></common-header>      
        <viewpoint-content></viewpoint-content>
        <common-footer></common-footer>
    </div> 
</template>

<script>

import CommonHeader     from '@/common/components/Header'
import ViewpointContent from './components/Content'
import CommonFooter     from '@/common/components/Footer'

export default {
    name:'Viewpoint',
    components: {
        CommonHeader,
        ViewpointContent,
        CommonFooter
    }
}
</script>

<style scoped>

</style>