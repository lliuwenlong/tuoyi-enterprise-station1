<template>
    <div>
        <common-header></common-header>      
        <timetable-content></timetable-content>
        <common-footer></common-footer>
    </div> 
</template>

<script>

import CommonHeader     from '@/common/components/Header'
import TimetableContent from './components/Content'
import CommonFooter     from '@/common/components/Footer'

export default {
    name:'Timetable',
    components: {
        CommonHeader,
        TimetableContent,
        CommonFooter
    }
}
</script>

<style scoped>

</style>