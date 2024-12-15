<template>
    <div class="container-fluid d-flex justify-content-md-center align-items-md-center justify-content-lg-evenly bg_custom px-0 bg-dark">
        <div class="d-flex flex-column flex-md-wrap flex-md-row align-items-center justify-content-center justify-content-md-between justify-content-lg-evenly align-items-lg-center flex-lg-nowrap w-100">
            <AboutComponent class="d-none d-md-flex col-md-12 col-lg-3 order-md-1 mt-md-4 mt-lg-0" />
            <div class="col-12 d-md-none order-1 justify-content-between align-items-center d-flex px-2 py-2">
                <img src="/images/logo_white.png" alt="" />
                <i class="fa-solid fa-bars fa-lg text-white"></i>
            </div>
            <MainComponent class="col-12 col-sm-11 col-md-10 col-lg-7 order-3 order-md-2 ms-md-3 ms-lg-0 my-md-2 my-lg-0" />
            <HeaderComponent class="col-12 col-sm-11 col-md-1 col-lg-1 order-2 order-md-3 my-3 my-md-0 me-md-3 me-lg-0 my-md-2 my-lg-0" />
        </div>
    </div>
</template>

<script>
import HeaderComponent from '../components/HeaderComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import AboutComponent from '../components/AboutComponent.vue';

export default {
    name: 'App',
    components: { HeaderComponent, MainComponent, AboutComponent },
};
</script>

<style scoped lang="scss">
.bg_custom {
    width: 100vw;
    height: 100vh;  /* Impostato esplicitamente su 100vh */
    overflow: hidden;
}

@media screen and (max-width: 991px) {
    .bg_custom {
        height: 100% !important;  /* Modifica altezza per schermi più piccoli */
        width: 100%;
        overflow-y: auto;
    }
}
</style>
