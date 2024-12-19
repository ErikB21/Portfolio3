<template>
    <div class="card rounded-5 px-4 pt-2 pb-3 d-flex flex-row flex-lg-column justify-content-evenly justify-content-lg-center align-items-center eb_width text-light">
        <div class="col-5 col-lg-12 d-flex flex-column justify-content-center align-items-center">
            <div class="eb_image pt-2 d-flex justify-content-center align-items-center overflow-hidden rounded-circle">
                <img loading="lazy" class="card-img-top object-fit-cover h-auto rounded-circle w-100" :src="user.profile_pic ? '/storage/profile_pic/' + user.profile_pic : 'https://img.freepik.com/premium-vector/gamer-streamer-mascot-logo-vector-illustration_382438-609.jpg'" alt="Profile Picture">
            </div>
        </div>
        <div class="col-5 col-lg-12 d-flex flex-column justify-content-center align-items-center">
            <h2 class="pt-2">{{ user ? user.name : 'Erik' }} {{ user ? user.surname : 'Borgogno' }}</h2>
            <p class="pt-1">{{ user ? user.work : 'Full Stack Web Developer' }}</p>
            <div class="d-flex py-2 flex-column-reverse justify-content-center align-items-center flex-md-row justify-content-md-around">
                <div class="d-flex">
                    <div v-for="(link, index) in links" :key="index" class="d-flex justify-content-center align-items-center social-btn px-lg-2 px-md-3 btn-dark">
                        <a data-mdb-ripple-init class="btn" :class="link.btn_color" :style="link.btn_color" role="button" :href="link.link"><i :class="link.path"></i></a>
                    </div>
                </div>
            </div>
            <a class="btn btn_cust py-2 mt-4" :href="user.cv ? '/storage/cvs/' + user.cv : ''" title="Download CV" download>Download CV</a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AboutComponent',
    data() {
        return {
            links: [
                { link: 'https://www.linkedin.com/in/erik-borgogno', name: 'in/Erik-Borgogno', path: 'fab fa-linkedin-in', btn_color: 'btn-primary' },
                { link: 'https://github.com/ErikB21', name: 'ErikB21', path: 'fab fa-github', btn_color: 'btn-dark' },
                { link: 'mailto:erik.borgogno.dev@gmail.com', name: 'erik.borgogno.dev@gmail.com', path: 'fab fa-google', btn_color: 'btn-danger' }
            ],
            user: {
                cv: null
            }
        };
    },
    mounted() {
        this.getAdmin();
    },
    methods: {
        async getAdmin() {
            try {
                const response = await axios.get('/api/admin');
                this.user = response.data.data || null;
            } catch (error) {
                console.error('Error fetching user:', error);
                this.user = null;
            }
        }
    }
}
</script>

<style lang="scss" scoped>
    $back_container: #7f5af0;
    $color_btn : #16161a;
    $col_text_btn: #bc8af9;
    $font_family: 'Nanum Pen Script', cursive;

    .eb_width {
        width: 20vw;
        height: 85vh;
        background-color: $back_container;

        h2{
            font-size: 2.3rem;
            font-weight: bold;
            font-family: $font_family;
        }
        p{
            font-size: 1.4rem;
            font-family: $font_family;
        }
        .btn_cust{
            background-color: $color_btn;
            font-weight: bold;
            color: #fffffe;
            border-color: $back_container;
            &:hover{
                background-color: #fffffe;
                color: $back_container;
            }
        }
    }

    @media screen and (max-width:991px){
        .eb_width{
            height: 50vh;
            width: 100%;
            border-radius: 0!important;
            .eb_image{
                width: 270px;
                height: 270px;
            }
            h2{
                font-size: 2.5rem;
            }
            p{
                font-size: 1.7rem;
            }
        }
    }

    @media screen and (max-width:1200px){
        .eb_image{
            width: 150px;
            height: 150px;
        }
    }

    @media screen and (min-width:1201px){
        .eb_image{
            width: 200px;
            height: 200px;
        }
    }
</style>
