<template>
    <div class="main_color container-fluid container-md px-0 mx-0">
        <LoaderComponent v-if="loading"/>
        <router-view v-else></router-view>
    </div>
</template>

<script>
    import LoaderComponent from './LoaderComponent.vue';

    export default {
        name: 'MainComponent',
        components: { LoaderComponent},
        data() {
            return {
                loading: true
            };
        },
        watch: {
            // Watch per il caricamento delle rotte
            '$route': {
                immediate: true,
                handler(to) {
                    // Se l'URL è valido, mostra il loader, altrimenti impostalo a false per NotFound
                    if (to.name === 'notFound') {
                        this.loading = false; // Disattiva il caricamento per NotFound
                    } else {
                        this.loading = true; // Attiva il caricamento per le altre rotte
                        // Simula un caricamento (puoi rimuoverlo o regolarlo)
                        setTimeout(() => {
                            this.loading = false; // Nascondi il loader dopo 1 secondo
                        }, 3000); // Cambia questo valore per testare
                    }
                }
            }
        }
    }
</script>

<style scoped lang="scss">

    $back_main: #fffffe;
    $back_scrollbar: #7f5af0;

    .main_color{
        background: $back_main;
        height: 85vh;
        width: 65vw;
        overflow-y: auto;
        overflow-x: hidden;
        // Webkit personalizzata per AboutMe
        &::-webkit-scrollbar {
            width: 12px !important;
        }

        &::-webkit-scrollbar-track {
            background: #16161a !important;
        }

        &::-webkit-scrollbar-thumb {
            background: transparent !important;
            border-radius: 10px !important;
        }
    }
    @media screen and (max-width:766px){
        .main_color{
            height: 82vh;
            width: 100vw;
        }

    }

    @media screen and (min-width:767px){
        .main_color{
            height: 85vh;
            width: 80vw;
            border-top-left-radius: 2rem;
            border-bottom-left-radius: 2rem;
        }
    }

    @media screen and (min-width:992px){
        .main_color{
            height: 85vh;
            width: 65vw;
        }
    }
</style>
