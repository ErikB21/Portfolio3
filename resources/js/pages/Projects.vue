<template>
    <div class="container-fluid eb_bg">
        <h1 class="text-center fw-bold my-5">Projects</h1>
        <div class="row justify-content-center">
            <!-- Aggiungi i CardProject all'interno di una colonna -->
            <div class="books-container d-flex flex-column justify-content-center">
                <div class="books d-flex">
                    <CardProject v-for="(project, index) in projects" :key="index" :project="project"/>
                </div>

                <!-- Mensola sotto i progetti -->
                <div class="shelf"></div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import CardProject from '../components/CardProject.vue';

export default {
    name: 'Projects',
    components: { CardProject },
    data() {
        return {
            projects: [],
            error: null,
        };
    },
    mounted() {
        this.getProjects();
    },
    methods: {
        async getProjects() {
            try {
                const response = await axios.get('/api/project');
                this.projects = response.data.projects;
            } catch (error) {
                this.error = 'Impossibile caricare i progetti. Riprova più tardi!';
            }
        },
    },
};
</script>

<style scoped lang="scss">
.eb_bg {
    h1 {
        font-size: 4.5rem;
        color: #7f5af0;
    }
    .btn {
        background-color: #3b576b;
        color: whitesmoke;
        &:hover {
            background-color: black;
        }
    }
}

/* Wrapper che contiene tutti i libri (CardProject) */
.books-container {
    display: flex;
    flex-direction: column; /* Layout verticale per i libri */
    width: 100%;
}

/* Contenitore dei libri */
.books {
    display: flex;
    flex-direction: row; /* Disporre i libri in verticale */
    gap: 10px;
    width: 100%;
    height: 200px;
}

/* Mensola */
.shelf {
    width: 100%;
    height: 30px;
    background-image: url('/images/wood.png');
    background-size: cover;
    background-repeat: no-repeat;
    border-radius: 0 0 8px 8px;
    position: relative;
}
</style>
