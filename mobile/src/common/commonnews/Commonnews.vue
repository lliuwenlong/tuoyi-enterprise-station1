<template>
    <div>
        <common-header></common-header>
        <commonnews-content></commonnews-content>
        <common-footer></common-footer>
    </div> 
</template>

<script>
import CommonHeader       from '@/common/components/Header'
import CommonFooter       from '@/common/components/Footer'
import CommonnewsContent  from './components/Content'

export default {
    name:'Course',
    components: {
        CommonHeader,
        CommonFooter,
        CommonnewsContent
    }
}
</script>

<style scoped>

</style>
