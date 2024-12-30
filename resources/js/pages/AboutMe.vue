<template>
    <div class="about-me-container w-100 h-100 px-0 d-flex container-fluid">
        <!-- <canvas class="planet-canvas w-100 h-100"></canvas> -->
        <!-- <div class="astro" v-if="isAstronautVisible">
            <AstronautComponent/>
        </div> -->
        <h1 class="text-light px-2 fw-bold text-pop-up-top" v-if="user">{{ user.name }} {{ user.surname }}</h1>
    </div>
</template>

<script>
import axios from 'axios';
import AboutMeTextComponent from '../components/AboutMeTextComponent.vue';
import AstronautComponent from '../components/AstronautComponent.vue';

export default {
    name: "AboutMe",
    components: { AboutMeTextComponent, AstronautComponent },
    data() {
        return {
            user: null,
            isAstronautVisible: false, // Stato per caricare l'astronauta solo dopo il rendering iniziale
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

                setTimeout(() => {
                    this.isAstronautVisible = true;
                }, 8000);
            } catch (error) {
                console.error('Error fetching user:', error);
                this.user = null;
            }
        },
    },
};
</script>

<style lang="scss" scoped>
    $font_family: 'Press Start 2P', cursive;

    .about-me-container {
        height: 100%;
        overflow-y: auto;
        background-image:
            url('/images/me.png'),
            linear-gradient(to bottom right,  rgba(127, 90, 240, 0.8) 50%, rgba(255, 255, 255, 1) 50%);
        background-size: 300px, cover; /* Dimensione immagine e gradiente */
        background-repeat: no-repeat;
        background-position: right bottom, center center; /* Posizione immagine e gradiente */

        h1 {
            font-family: $font_family;
            font-size: 5rem !important;
            color: #ffffff; /* Colore del testo */
            padding-top: 5rem;
        }

        .text-pop-up-top {
            -webkit-animation: text-pop-up-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
                    animation: text-pop-up-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        @-webkit-keyframes text-pop-up-top {
            0% {
                -webkit-transform: translateY(0);
                        transform: translateY(0);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                text-shadow: none;
            }
            100% {
                -webkit-transform: translateY(-50px);
                        transform: translateY(-50px);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
            }
        }
        @keyframes text-pop-up-top {
            0% {
                -webkit-transform: translateY(0);
                        transform: translateY(0);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                text-shadow: none;
            }
            100% {
                -webkit-transform: translateY(-50px);
                        transform: translateY(-50px);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
            }
        }
}
</style>
