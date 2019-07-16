<template>
    <div>
        <common-header></common-header>
        <course-content></course-content>
        <common-footer></common-footer>
    </div> 
</template>

<script>
import CommonHeader     from '@/common/components/Header'
import CommonFooter     from '@/common/components/Footer'
import CourseContent    from './components/Content'

export default {
    name:'Course',
    components: {
        CommonHeader,
        CommonFooter,
        CourseContent
    }
}
</script>

<style scoped>

</style>


