<template>
    <div>
        <common-header></common-header>
        <class-content></class-content>
        <common-footer></common-footer>
    </div> 
</template>

<script>
import CommonHeader     from '@/common/components/Header'
import CommonFooter     from '@/common/components/Footer'
import ClassContent     from './components/Content'

export default {
    name:'Course',
    components: {
        CommonHeader,
        CommonFooter,
        ClassContent
    }
}
</script>

<style scoped>

</style>

