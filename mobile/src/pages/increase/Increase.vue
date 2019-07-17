<template>
    <div>
        <common-header></common-header>
        <Increase-content></Increase-content>
        <common-footer></common-footer>
    </div> 
</template>

<script>
import CommonHeader     from '@/common/components/Header'
import CommonFooter     from '@/common/components/Footer'
import IncreaseContent    from './components/Content'

export default {
    name:'Course',
    components: {
        CommonHeader,
        CommonFooter,
        IncreaseContent
    }
}
</script>

<style scoped>

</style>




