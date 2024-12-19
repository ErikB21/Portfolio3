<template>
    <div v-if="project && project.name" class="container-fluid watch-project d-flex justify-content-center flex-column py-2">
        <h1 class="text-center fw-bold my-5">{{ project.name }}</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <p v-for="point in splitPoints(project.text)" :key="point" class="text-center">{{ point }}</p>
                <div class="d-flex" style="justify-content: space-evenly;" v-if="project.skills && project.skills.length">
                    <span v-for="(skill, idx) in project.skills" :key="idx"
                        :class="['badge', 'my-1', 'mx-2', 'py-2', 'rounded-pill']"
                        :style="{ backgroundColor: skill.color }">
                        {{ skill.name || 'Skill non disponibile' }}
                    </span>
                </div>
                <div v-else>Nessuna skill disponibile</div>
                <div class="video-container my-4">
                    <video v-if="project.url_video" controls>
                        <source :src="'/storage/projectVideo/' + project.url_video" type="video/mp4" />
                    </video>
                    <p v-else>Nessun video disponibile per questo progetto.</p>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <router-link :to="{name: 'project'}" class="btn btn-primary mt-3 mx-1">Projects</router-link>
            <a :href="project.url" class="btn btn-primary mt-3 mx-1">Github</a>
        </div>

    </div>
    <p v-else>{{ error || "Caricamento in corso..." }}</p>
</template>

<script>
import axios from 'axios';

export default {
    name: 'WatchProject',
    data() {
        return {
        project: {}, // Conterrà i dettagli del progetto
        error: null,
        };
    },
    mounted() {
        this.getProjectDetails();
    },
    methods: {
        async getProjectDetails() {
            const projectId = this.$route.params.id; // Ottieni l'ID dal parametro della rotta
            try {
                const response = await axios.get(`/api/project/${projectId}`);
                if (response.data && response.data.project) {
                    this.project = response.data.project;
                    console.log(this.project);
                } else {
                    this.error = "Dettagli del progetto non trovati.";
                }
            } catch (error) {
                console.error("Errore nel caricamento dei dettagli del progetto:", error);
                this.error = "Errore nel caricamento dei dettagli del progetto.";
            }
        },
        splitPoints(text) {
            // Dividi il testo in un array utilizzando '•' come delimitatore
            return text.split('•').map(point => point.trim()).filter(point => point);
        }
    },

};
</script>

<style scoped lang="scss">
    $h1_color: #7f5af0;
    $font_family_h1: 'Press Start 2P', cursive;
    $col_bg_btn: #16161a;
    $col_btn: #bc8af9;
    $col_text_btn: #fffffe;
    .watch-project {
        h1 {
            font-size: 4.5rem;
            font-family: $font_family_h1;
            color: $h1_color;
        }

        .video-container {
            display: flex;
            justify-content: center;

            video {
            width: 100%;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            }
        }

        p {
            font-size: 1.2rem;
            color: #6c757d;
            text-align: center;
        }

        .btn {
            background-color: $col_bg_btn;
            color: $col_btn;

            &:hover {
                background-color: $h1_color;
                color: $col_text_btn;
                border: 1px solid $h1_color;
            }
        }
    }
</style>
