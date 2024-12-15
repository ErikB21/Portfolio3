<template>
    <div class="container-fluid px-0 mx-0 px-lg-2 eb_over rounded-2">
        <h1 class="text-center fw-bold my-5">Skills</h1>
        <div v-if="error">{{ error }}</div>
        <div v-else v-for="type in skillTypes" :key="type">
            <SkillsComponent :type="type" :skills="filteredSkills(type)" />
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import SkillsComponent from '../components/SkillsComponent.vue'; // Assicurati che il percorso sia corretto
export default {
    name: 'Skills',
    components: { SkillsComponent },
    data() {
        return {
            skills: [],
            error: null,
            skillTypes: ['Front-end', 'Back-end'] // Tipi di skill da mostrare
        };
    },
    mounted() {
        this.getSkills();
    },
    methods: {
        async getSkills() {
            try {
                const response = await axios.get('/api/skill');
                this.skills = response.data.skills;
                console.log(this.skills);
            } catch (error) {
                console.error('Error fetching skills:', error);
                this.error = 'Impossibile caricare le abilità. Riprova più tardi.'; // Messaggio di errore
            }
        },
        filteredSkills(type) {
            return this.skills.filter(skill => skill.type.trim().toLowerCase() === type.toLowerCase());
        }
    }
}
</script>

<style lang="scss" scoped>

    $bg_color: #0f0e17;
    $bg_color_hover: lightgray;
    $color_text: #fffffe;
    $h1_color: #7f5af0;
    $font_family_h1: 'Press Start 2P', cursive;
    $font_family_h2: 'Nanum Pen Script', cursive;

    .eb_over {
        height: 100%;

        h1 {
            font-size: 4.5rem;
            font-family: $font_family_h1;
            color: $h1_color;
        }

        h2 {
            font-size: 2.5rem;
            font-family: $font_family_h2;
        }
    }

    // Responsive
    @media screen and (max-width: 575.98px) {
        .eb_over {
            h1 {
                font-size: 2.5rem;
            }

            h2 {
                font-size: 2rem;
            }
        }
    }

    @media screen and (max-width: 900px) {
        .eb_over {
            height: auto;
        }
    }
</style>
