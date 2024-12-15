<template>
    <div>
        <h2 class="text-center pb-3">{{ type }}</h2>
        <div class="row">
            <div v-for="(skill) in skills" :key="skill.id" class="d-flex justify-content-center flex-wrap col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="my_card shadow-drop-2-center d-flex flex-column align-items-center justify-content-center">
                    <a class="align-items-center justify-content-between d-flex flex-column text-decoration-none" :href="skill.url" target="_blank">
                        <div class="logos mb-4">
                            <img class="w-100" :src="skill.skill_image ? 'storage/skill/' + skill.skill_image : '/images/code/code.gif'" :alt="skill.name">
                        </div>
                        <h3 class="text-center">{{ skill.name }}</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SkillsComponent',
    props: {
        type: {
            type: String,
            required: true
        },
        skills: {
            type: Array,
            required: true
        }
    }
}
</script>

<style scoped lang="scss">

    $back_card: #16161a;
    $text_color_hover: #fffffe;
    $back_color_hover: lightgray;
    $h3_color_before_hover: #a7a9be;
    $h3_color_after_hover: black;
    $font_family: 'Nanum Pen Script', cursive;

    .my_card {
        width: 170px;
        height: 170px;
        margin: 10px;
        background-color: $back_card; // Sostituisci con la variabile se necessario
        border-radius: 20px;
        transition: all 300ms linear;

        &:hover {
            background-color: $back_color_hover; // Sostituisci con la variabile se necessario
            background-image: url('/images/svg/wave.svg');
            background-repeat: no-repeat;
            background-position: bottom;
            color: $text_color_hover; // Sostituisci con la variabile se necessario
            transform: translateY(-5px) scale(1.01);

            h3 {
                color: $h3_color_after_hover;
            }
        }

        h3 {
            font-family: $font_family;
            font-size: 1.6rem;
            color: $h3_color_before_hover;
        }

        .logos {
            width: 50px;
            height: 50px;
        }
    }

    .shadow-drop-2-center {
        -webkit-animation: shadow-drop-2-center 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }

    @-webkit-keyframes shadow-drop-2-center {
        0% {
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
            box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
        }

        100% {
            -webkit-transform: translateZ(50px);
            transform: translateZ(50px);
            -webkit-box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
            box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
        }
    }

    @keyframes shadow-drop-2-center {
        0% {
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
            box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
        }

        100% {
            -webkit-transform: translateZ(50px);
            transform: translateZ(50px);
            -webkit-box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
            box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
        }
    }

</style>
