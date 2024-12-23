<template>
    <div class="project h-100 d-flex justify-content-center align-items-center position-relative">
        <!-- Libro del progetto -->
        <p class="d-flex flex-column justify-content-center align-items-center h-100 w-100 p_allText">
            <span class="span_title text-uppercase text-light">{{ project.name }}</span>
            <router-link
                v-if="project"
                :to="{ name: 'watchProject', params: { id: project.id } }"
                :title="project.name || 'Project Details'"
                class="btn card-text d-none text-uppercase">
                Watch
            </router-link>
            <span class="span_id text-uppercase text-light">{{ project.id }}</span>
        </p>
    </div>
</template>

<script>
export default {
    name: 'CardProject',
    props: {
        project: {
            type: Object,
            required: true
        }
    }
}
</script>

<style lang="scss" scoped>

$back_book: rgba(30, 31, 38, 0.85);
$out_book: #7f5af0;
$col_btn: #ff5a91;
.project {
    width: 50px;
    cursor: pointer;
    border-radius: 2px;
    transition: all .5s;
    background-color: $back_book;
    outline: 4px solid $out_book; /* Bordo interno */
    outline-offset: -4px;
    &:hover {
        width: 150px;
    }
    &:hover .span_title{
        transform: rotate(0);
    }
    &:hover .span_id {
        padding-right: 0;
        transform: rotate(0);
    }
    &:hover .btn {
        opacity: 1;
        transform: translateY(0);
        display: inline !important;
    }

    .span_title, .span_id {
        transform: rotate(-90deg);
        transition: all .5s;
        letter-spacing: .1em;
    }

    .span_id{
        padding-right: 125px;
    }

    .p_allText{
        gap: 10px;
        &:hover {
            flex-grow: 1;
            justify-content: space-around !important;
            margin: 0;
            transition: all .5s;
        }
    }

    .btn {
        opacity: 0; /* Nasconde il link inizialmente */
        transform: translateY(10px); /* Posizionamento iniziale verso il basso */
        transition: all 0.3s ease; /* Animazione per apparire */
        color: $col_btn;
        font-size: 0.9rem;
    }
}


</style>
