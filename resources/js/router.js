import Vue from 'vue';
import VueRouter from 'vue-router';
import ContactMe from './pages/ContactMe.vue';
import AboutMe from './pages/AboutMe.vue';
import Projects from './pages/Projects.vue';
import WatchProject from './pages/WatchProject.vue';
import Skills from './pages/Skills.vue';
import NotFound from './pages/NotFound.vue';
import Timeline from './pages/Timeline.vue';
import Certifications from './pages/Certifications.vue';
Vue.use(VueRouter);




const router = new VueRouter({
		mode: 'history',//modalità history(consigliata)
		routes:[
			{
				path: '/contactMe',
				name:'contactMe',
				component: ContactMe
			},
			{
				path: '/',
				name:'home',
				component: AboutMe
			},
			{
				path: '/project',
				name:'project',
				component: Projects
			},
            {
				path: '/watch-project/:id',
				name:'watchProject',
				component: WatchProject
			},
            {
				path: '/skill',
				name:'skill',
				component: Skills
			},
            {
				path: '/work-timeline',
				name:'timeline',
				component: Timeline
			},
            {
				path: '/certifications',
				name:'certifications',
				component: Certifications
			},
            {
                path: '/notFound',
                name: 'notFound',
                component: NotFound
            },
            {
                path: '/:catchAll(.*)',
                redirect: '/notFound'
            }
		]
})

export default router;//diamo la possibilità di esportare router
