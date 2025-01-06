<template>
    <div class="about-me-container w-100 h-100 d-flex flex-column position-relative">
        <div class="hello">
            <p class="hello_text">Hello!</p>
        </div>
        <div class="eb">
            <p class="user_text">
                I Am
                <ul class="d-block content__container__list">
                    <li class="content__container__list__item" v-for="(item, index) in animatedList" :key="index" v-show="index === currentIndex">
                        {{ item }}
                    </li>
                </ul>
            </p>
        </div>
        <div class="left-section"></div>
        <div class="right-section"></div>
    </div>
</template>


<script>
import axios from 'axios';

export default {
    name: "AboutMe",
    data() {
        return {
            user: null, // Dati utente
            animatedList: ["Erik","developer", "designer", "problem solver", "team player"], // Parole animate
            currentIndex: 0,
        };
    },
    mounted() {
        this.getAdmin();
        this.animateList();
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
        animateList() {
            setInterval(() => {
                this.currentIndex = (this.currentIndex + 1) % this.animatedList.length;
            }, 3000); // Cambia ogni 2 secondi
        },
    },
};
</script>



<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Stalinist+One&display=swap');
$left-color: #ffffff;
$right-color: #333;
$hello-color: rgb(128, 128, 128);

.about-me-container {
    width: 100%;
    height: 100%;
    overflow: hidden;
    position: relative;

    .left-section {
        background-color: #ffffff;
        width: 50%;
        height: 100%;
        clip-path: polygon(0 0, 100% 0, 85% 100%, 0 100%);
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
    }

    .right-section {
        background-color: #333;
        width: 70%;
        height: 100%;
        clip-path: polygon(45% 0, 100% 0, 100% 100%, 0 100%);
        position: absolute;
        top: 0;
        right: 0;
        z-index: 1;
    }

    .hello {
        position: absolute;
        top: 35%;
        left: 50%;
        transform: translate(-50%, -65%);
        z-index: 3;

        .hello_text {
            font-size: 150px;
            font-family: "Stalinist One", serif;
            font-weight: bold;
            color: rgba(128, 128, 128, 0.1);
            text-align: center;
        }
    }

    .eb {
        position: absolute;
        width: 100%;
        top: 60%;
        left: 50%;
        transform: translate(-50%, -40%);
        z-index: 2;

        .user_text {
            font-size: 140px;
            line-height: 130px;
            font-family: 'Stalinist One', sans-serif;
            font-weight: 800;
            margin: 0;
            position: relative;
            margin-top: -105px;
            letter-spacing: 3px;
            text-align: center;

            ul {
                list-style: none;
                font-size: 150px;
                padding: 0;
                padding-top: 50px;
                // animation: change 10s infinite;

                li {
                    font-size: 50px;
                    line-height: 1.2;
                    color: #7f5af0;
                }
            }
        }
    }
}

@keyframes change {
    0%, 12.66%, 100% { transform: translate3d(0, 0, 0); }
    16.66%, 29.32% { transform: translate3d(0, -50%, 0); }
    49.98%, 62.64% { transform: translate3d(0, -75%, 0); }
    66.64%, 79.3% { transform: translate3d(0, -50%, 0); }
    83.3%, 95.96% { transform: translate3d(0, 0, 0); }
}


</style>
