<template>
    <div class="header_component rounded-5 d-flex flex-md-column align-items-center">
        <ul class="px-0 mb-0 d-flex flex-md-column align-items-center justify-content-evenly w-100 h-100">
            <li v-for="(link, index) in links" :key="index" class="list-unstyled py-2">
                <router-link :to="{name: link.name}" :title="link.title" class="btn text-decoration-none eb_page_btn rounded-5">
                    <i :class="[link.icon, { 'fa-fade': isActive(link.name) }]" class="fa-solid fa-xl text-light"></i>
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'HeaderComponent',
    data(){
        return{
            links:[
                {
                    icon : 'fa-user-astronaut',
                    name : 'home',
                    title: 'About Me',
                },
                {
                    icon : 'fa-meteor',
                    name : 'skill',
                    title: 'Skills'
                },
                {
                    icon : 'fa-rocket',
                    name : 'project',
                    title: 'Projects'
                },
                {
                    icon : 'fa-satellite',
                    name : 'timeline',
                    title : 'Work Timeline'
                },
                {
                    icon : 'fa-globe',
                    name : 'certifications',
                    title : 'Certifications'
                },
                {
                    icon : 'fa-shuttle-space',
                    name : 'contactMe',
                    title : 'Contact Me'
                }
            ]
        }
    },
    methods: {
        isActive(routeName) {
            return this.$route.name === routeName;
        }
    }
}
</script>

<style lang="scss" scoped>
    $back_container: #7f5af0;
    $btn_back_hover : #a7a9be;
    .header_component {
        height: 65vh;
        width: 3vw;
        background-color: $back_container;

        .eb_page_btn:hover {
            background-color: $btn_back_hover;
            background-image: url("https://svgshare.com/i/QUK.svg");
            background-repeat: no-repeat;
            background-position: bottom;
            background-size: cover;
            transition: all 300ms linear;
            transform: translateY(-7px) scale(1.01);
        }
    }
    @media only screen and (max-width:766px){
        .header_component{
            height: 18vh;
            width: 98%;
        }

    }

    @media only screen and (min-width:767px){
        .header_component{
            height: 65vh;
            width: 8vw;
        }

    }

    @media only screen and (min-width:992px){
        .main_color{
            height: 65vh;
            width: 4vw;
        }
    }
</style>
