<template>
    <div class="about-me-container w-100 h-100">
        <div class="general_container vh-100 w-100 d-flex flex-column position-relative">
            <div class="hello">
                <p class="hello_text">Hello!</p>
            </div>
            <div class="eb">
                <p class="user_text gradient-text">
                    <span class="span_black">I</span> <span class="span_white">Am</span>
                    <ul class="d-block content__container__list">
                        <li
                            class="content__container__list__item"
                            v-for="(item, index) in animatedList"
                            :key="index"
                            :class="{ active: currentIndex === index }"
                        >
                            {{ item }}
                        </li>
                    </ul>
                </p>
            </div>
            <div class="left-section"></div>
            <div class="right-section"></div>
        </div>
        <div class="vh-100 w-100 container-fluid">
            <div class="row justify-content-evenly align-items-center">
                <div class="image_about col-4">
                    <img class="h-100 w-100" src="https://img.freepik.com/premium-vector/gamer-streamer-mascot-logo-vector-illustration_382438-609.jpg" alt="">
                </div>
                <AboutMeTextComponent class="col-7"/>
            </div>

        </div>
    </div>
</template>

<script>
import axios from 'axios';
import AboutMeTextComponent from '../components/AboutMeTextComponent.vue';

export default {
    name: "AboutMe",
    components:{ AboutMeTextComponent },
    data() {
        return {
            user: null, // Dati utente
            animatedList: ["Erik Borgogno", "Web Developer", "Designer"], // Parole animate
            currentIndex: 0,
        };
    },
    mounted() {
        this.getAdmin();
        this.startAnimation();
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
        },
        startAnimation() {
            setInterval(() => {
                this.currentIndex = (this.currentIndex + 1) % this.animatedList.length;
            }, 5000); // Cambia ogni 3 secondi
        },
    },
};
</script>




<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Stalinist+One&display=swap');
$left-color: #ffffff;
$right-color: #333;
$hello-color: #7f5af0;

.about-me-container {
    // overflow: hidden;

    .left-section {
        background-color: #ffffff;
        width: 50%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
    }

    .right-section {
        background-color: #333;
        width: 70%;
        height: 100%;
        clip-path: polygon(25% 0%, 100% 0, 100% 100%, 25% 100%, 0 50%);
        position: absolute;
        top: 0;
        right: 0;
        z-index: 1;
    }

    .hello {
        position: absolute;
        top: 32%;
        left: 50%;
        transform: translate(-50%, -68%);
        z-index: 3;

        .hello_text {
            font-size: 150px;
            font-family: "Stalinist One", serif;
            font-weight: bold;
            color: $hello-color;
            opacity: 0.1;
            text-align: center;
        }
    }

    .eb {
        position: absolute;
        width: 100%;
        top: 57%;
        left: 50%;
        transform: translate(-50%, -43%);
        z-index: 4;

        .user_text {
            font-size: 140px;
            line-height: 130px;
            font-family: 'Stalinist One', sans-serif;
            font-weight: bold;
            margin: 0;
            position: relative;
            margin-top: -105px;
            letter-spacing: 3px;
            text-align: center;
            .span_black{
                color: $right-color;
            }
            .span_white{
                color: $left-color;
            }

            ul {
                margin-top: 40px;
                list-style: none;
                padding: 0;
                margin: 0;
                height: 100px; /* Mostra solo un elemento */
                overflow: hidden; /* Nasconde gli elementi fuori dal contenitore */
                position: relative;

                .content__container__list__item {
                    font-size: 50px;
                    line-height: 70px;
                    color: #7f5af0;
                    position: absolute;
                    width: 100%;
                    top: 100%; /* Posizione iniziale fuori dallo schermo */
                    left: 0;
                    opacity: 0;
                    animation: scroll-in-out 4s ease-in-out infinite;
                }

                .content__container__list__item.active {
                    animation: scroll-in 5s ease-in-out forwards;
                    opacity: 1;
                    top: 0;
                }
            }
        }
    }

    /* Definisci i keyframes per l'animazione */
    @keyframes scroll-in {
        0% {
            transform: translateY(100%);
            opacity: 0;
        }
        50% {
            transform: translateY(0%);
            opacity: 1;
        }
        100% {
            transform: translateY(-100%);
            opacity: 0;
        }
    }

    .image_about{
        clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
        height: 200px;
        width: 200px;
    }

}

@media screen and (min-width:300px) and (max-width:575.98px){
    .general_container{
        height: 100%!important;
    }

    .hello{
        top: 25%!important;
        .hello_text{
            font-size: 65px!important;
            padding: 0 10px!important;
        }
    }

    .eb{
        top: 50%!important;
        .user_text{
            font-size: 70px!important;
            margin-top: 0!important;
        }

        .content__container__list{
            margin-top: 40px!important;
        }
        .content__container__list__item{
            font-size: 35px!important;
            line-height: 30px!important;
        }
    }
}


@media screen and (min-width:426px) and (max-width:575.98px){
    .hello_text{
        font-size: 100px !important;
    }

}

@media screen and (min-width:575.99px) and (max-width: 766.98px){
    .content__container__list{
        margin-top: 40px!important;
    }
}

</style>
