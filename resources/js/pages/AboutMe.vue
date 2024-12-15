<template>
    <div class="about-me-container w-100 h-100 px-0 d-flex container-fluid flex-column">
        <!-- <canvas class="planet-canvas w-100 h-100"></canvas> -->
        <div class="astro" v-if="isAstronautVisible">
            <AstronautComponent/>
        </div>
        <h1 class="text-dark" v-if="user">{{ user.name }} {{ user.surname }}</h1>
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
.about-me-container {
    height: 100%;
    position: relative;
    overflow-y: auto;

    .planet-canvas {
        width: 100%;
        height: 100%;
    }

    .astro {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation: big 15s linear forwards, floating 4s ease-in-out 15s infinite; /* La animazione floating inizia dopo big */
    }

    @keyframes big {
        from {
            transform: translate(-50%, -50%) scale(0.001) translateZ(-500px); /* Comincia lontano e piccolo */
        }

        to {
            transform: translate(-50%, -50%) scale(1) translateZ(0); /* Arriva vicino, con dimensione normale */
        }
    }

    @keyframes floating {
        0% {
            transform: translate(-50%, -50%) scale(1) translateY(0); /* Inizia alla posizione originale */
        }
        50% {
            transform: translate(-50%, -50%) scale(1) translateY(-20px); /* Muove verso l'alto */
        }
        100% {
            transform: translate(-50%, -50%) scale(1) translateY(0); /* Torna alla posizione originale */
        }
    }

    h1 {
        color: #ffffff;
        font-size: 48px;
    }
}
</style>
