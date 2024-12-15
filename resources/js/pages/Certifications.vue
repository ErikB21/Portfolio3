<template>
    <div class="container p-4">
        <h1 class="text-center fw-bold my-5">Certifications</h1>
        <div class="row justify-content-evenly">
            <div v-for="(certification, index) in certifications" :key="certification.index" class="box col-8 col-sm-5 my-2 d-flex flex-column justify-content-between rounded-2"  :style="{ '--bg-image': `url(${certification.image_certifications ? '/storage/certification/' + certification.image_certifications : '/images/code/code.gif'})`, '--bg-color': getColor(index)}">
                <h5 class="py-3 m-0">{{ certification.title_certifications }}</h5>
                <div class="d-flex justify-content-between">
                    <p class="py-3 m-0">{{ formatDate(certification.date_relase_certifications) }}</p>
                    <a v-if="certification.url_certifications" :href="certification.url_certifications" class="py-3 m-0 text-secondary text-decoration-none">Scopri</a>
                    <a v-if="certification.id_certifications && !certification.url_certifications" href="" class="py-3 m-0 text-secondary text-decoration-none" download="">Scarica</a>
                </div>
            </div>
        </div>
        <div v-if="error">{{ error }}</div>
    </div>
</template>


<script>
import axios from 'axios';
import dayjs from 'dayjs';
export default {
    name: 'Certifications',
    data() {
        return {
            certifications: [],
            error: null,
            colors: [
                '#2ecc71', // Verde
                '#9b59b6', // Viola
                '#1abc9c', // Turchese
                '#3498db', // Blu
            ]
        };
    },
    mounted() {
        this.getCertifications();
    },
    methods: {
        async getCertifications() {
            try {
                const response = await axios.get('/api/certification');
                console.log('Response:', response.data);
                this.certifications = response.data.certifications;
                console.log(this.certifications);
            } catch (error) {
                console.error('Error fetching certifications:', error);
                this.error = 'Impossibile caricare le certificazioni. Riprova più tardi.';
            }
        },
        formatDate(date) {
            return dayjs(date).format('MMM YYYY');
        },
        getColor(index) {
            return this.colors[index % this.colors.length];
        },
    }
}
</script>

<style lang="scss" scoped>
    $h1_color: #7f5af0;
    $font_family: 'Nanum Pen Script', cursive;
    $border: 4px solid #656565;
    $border_2 : 1px solid #656565;
    $font_family_h1: 'Press Start 2P', cursive;

    h1{
        font-size: 4.5rem;
        font-family: $font_family_h1;
        color: $h1_color;
        font-weight: 400;
        font-style: normal;
    }
    .box{
        position: relative;
        isolation: isolate;
        overflow: hidden;
        border-bottom: $border;
        border-left: $border;
        border-top: $border_2;
        border-right: $border_2;
        h5{
            font-family: $font_family;
            font-weight: 400;
            font-size: 1.5rem;
        }

        &::after{
            content: '';
            background-image: var(--bg-image)!important;
            background-color: var(--bg-color);
            background-size: 200px;
            background-repeat: no-repeat;
            background-position: center;
            width: 100%;
            height: 100%;
            position: absolute;
            inset: 0 0 auto auto;
            clip-path: circle(15% at 100% 0);
            transition: clip-path 0.3s;
            z-index: -1;
        }

            &:hover::after{
            clip-path: circle(100% at 50% 50%);
        }

        &:hover{
            h5, p{
                opacity: 0;
                transition: opacity 0.3s;
            }
        }

        p{
            font-size: 12px;
        }
    }

    @media screen and (max-width:550px) {
        h1 {
            font-size: 3.5rem;
        }
    }

    @media screen and (max-width:400px) {
        h1 {
            font-size: 2.5rem;
        }
    }



</style>

