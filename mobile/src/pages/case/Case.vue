<template>
    <div>
        <common-header></common-header>      
        <case-content></case-content>
        <common-footer></common-footer>
    </div> 
</template>

<script>

import CommonHeader     from '@/common/components/Header'
import CaseContent      from './components/Content'
import CommonFooter     from '@/common/components/Footer'

export default {
    name:'Case',
    components: {
        CommonHeader,
        CaseContent,
        CommonFooter
    }
}
</script>

<style scoped>

</style>