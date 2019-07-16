import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/pages/home/Home'


import Introduce from '@/pages/introduce/Introduce'
import Course    from '@/pages/course/Course'
import Increase  from '@/pages/increase/Increase'
import Class     from '@/pages/class/Class'
import Teachers  from '@/pages/teachers/Teachers'
import Case      from '@/pages/case/Case'
import Viewpoint from '@/pages/viewpoint/Viewpoint'
import Timetable from '@/pages/timetable/Timetable'

import Commonnews from '@/common/commonnews/Commonnews'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },{
      path:'/Introduce',
      name:'Introduce',
      component:Introduce
    },{
      path:'/Course',
      name:'Course',
      component:Course
    },{
      path:'/Increase',
      name:'Increase',
      component:Increase
    },{
      path:'/Class',
      name:'Class',
      component:Class
    },{
      path:'/Teachers',
      name:'Teachers',
      component:Teachers
    },{
      path:'/Case',
      name:'Case',
      component:Case
    },{
      path:'/Viewpoint',
      name:'Viewpoint',
      component:Viewpoint
    },{
      path:'/Timetable',
      name:'Timetable',
      component:Timetable
    },{
      path:'/Commonnews',
      name:'Commonnews',
      component:Commonnews
    }]
})
