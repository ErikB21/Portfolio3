<template>
    <div class="w-100 h-auto">
        <h1 class="text-center fw-bold my-5">Work Timeline</h1>
        <section id="timeline">
            <div v-if="error">{{ error }}</div>
            <div class="container-fluid">
                <div class="row align-items-center" v-for="(work, index) in works" :key="work.id" :class="{'justify-content-end': index % 2 !== 0, 'justify-content-start': index % 2 === 0}">
                    <div :class="{'order-1': index % 2 !== 0, 'order-3': index % 2 === 0}" :style="{ backgroundColor: getColor(index) }" class="col-1 my-3 date_timeline fw-bold text-light rounded-circle d-sm-flex flex-column align-items-center justify-content-center">
                        <span>{{ formatDate(work.work_start) }}</span>
                        <span>~</span>
                        <span v-if="work.work_end">{{ formatDate(work.work_end) }}</span>
                        <span v-if="work.work_present">Present</span>
                    </div>
                    <div class="col-1 d-sm-inline-block order-2 line_horizontal"></div>
                    <div class="col-10 col-sm-8 d-flex my-3 px-0" :class="{'order-3': index % 2 !== 0, 'order-1': index % 2 === 0}">
                        <article class="d-flex">
                            <div class="inner d-flex flex-column" :style="{ backgroundColor: getColor(index) }">
                                <div class="d-flex justify-content-start align-items-center px-2">
                                    <img class="object-fit-contain d-none d-sm-inline-flex" v-if="work.work_logo" :src="work.work_logo ? 'storage/work/' +  work.work_logo : '/images/code/code.gif'" width="100px" height="70px" :alt="work.work_city">
                                    <h2>{{ work.work_title }}</h2>
                                </div>

                                <ul v-if="work.work_explained" class="px-4">
                                    <li v-for="point in splitPoints(work.work_explained)" :key="point">
                                        {{ point }}
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios';
import dayjs from 'dayjs';

export default {
    name: 'Timeline',
    data() {
        return {
            works: [],
            error: null,
            colors: [
                '#e74c3c', // Rosso
                '#2ecc71', // Verde
                '#e67e22', // Arancione
                '#1abc9c', // Turchese
                '#f39c12', // Giallo
                '#3498db', // Blu
                '#9b59b6', // Viola
            ]
        };
    },
    mounted() {
        this.getWorks();
    },
    methods: {
        async getWorks() {
            try {
                const response = await axios.get('/api/work-timeline');
                console.log('Response:', response.data);
                this.works = response.data.works;
                console.log(this.works);
            } catch (error) {
                console.error('Error fetching works:', error);
                this.error = 'Impossibile caricare i lavori. Riprova più tardi.';
            }
        },
        formatDate(date) {
            return dayjs(date).format('MMM YYYY');
        },
        getColor(index) {
            return this.colors[index % this.colors.length];
        },
        splitPoints(text) {
            // Dividi il testo in un array utilizzando '•' come delimitatore
            return text.split('•').map(point => point.trim()).filter(point => point);
        }
    }
}
</script>

<style lang="scss" scoped>
$h1_color: #7f5af0;
$font_family_h1: 'Press Start 2P', cursive;
$font_family_l: 'Nanum Pen Script', cursive;
$border: 4px solid #16161a;
$line_color: #656565;
$white: #fff;

h1{
    font-size: 4.5rem;
    font-family: $font_family_h1;
    color: $h1_color;
}

#timeline {
    width: 90%;
    margin: 40px auto;
    position: relative;

    .date_timeline{
        border: $border;
        width: 120px;
        height: 120px;
    }

    .line_horizontal{
        height: 4px;
        background-color: $line_color;
    }

    // Linea verticale centrale
    &::before {
        content: "";
        position: absolute;
        top: 30px;
        left: 50%;
        width: 4px;
        height: 96%;
        background-color: $line_color;
        transform: translateX(-50%);
        z-index: 1;
    }

    .row {
        position: relative;
    }

    article {
        width: 100%;
        position: relative;
        z-index: 2;

        .inner {
            width: 100%;
            position: relative;

            h2 {
                padding: 10px;
                margin: 0;
                color: $white;
                font-size: 24px;
                text-transform: uppercase;
                letter-spacing: -1px;
                border-radius: 6px 6px 0 0;
                font-family: $font_family_l;
            }

            ul {
                padding: 15px;
                margin: 0;
                font-size: 14px;
                background: $white;
                color: $line_color;
                border-radius: 0 0 6px 6px;
                border-bottom: $border;
                border-left: $border;
                border-right: $border;
            }
        }
    }

    // Linea di connessione dei punti
    .col-1 {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;

        // Pseudo-elemento per la linea tra i punti
        &::before {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            width: 4px;
            height: 100%;
            background-color: $line_color;
            transform: translateX(-50%);
            z-index: -1; // Assicura che la linea sia sotto i punti
        }

        // Rimuovi la linea sull'ultimo punto
        &:last-of-type::before {
            display: none;
        }
    }
}

    @media screen and (max-width: 680px) {
        h1{
            font-size: 3.5rem;
        }
        .row{
            justify-content: center!important;
        }
        .date_timeline, .line_horizontal {
            display: none!important;
        }
    }

    // @media screen and (max-width: 900px) {
    //     .date_timeline, .line_horizontal {
    //         display: none!important;
    //     }
    // }
</style>
