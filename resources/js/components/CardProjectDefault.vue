<template>
    <div class="project h-100 d-flex justify-content-center align-items-center">
        <!-- Libro del progetto -->
        <p class="d-flex flex-column justify-content-center align-items-center h-100 w-100 p_allText">
            <span class="span_title text-uppercase">Cooming Soon</span>
            <span class="span_id text-uppercase"><i class="fa-solid fa-spinner fa-spin-pulse fa-lg" style="color: #7f5af0;"></i></span>
        </p>
    </div>
</template>

<script>
export default {
    name: 'CardProject',
}
</script>

<style lang="scss" scoped>

$out_book: #7f5af0;

.project {
    width: 50px;
    cursor: pointer;
    border-radius: 2px;
    transition: all .5s;
    outline: 4px dotted $out_book; /* Bordo interno */
    outline-offset: -4px;
    &:hover {
        width: 150px;
        transition: all 0.5s ease;
    }
    &:hover .span_title, .span_id {
        transform: rotate(0);
    }
    &:hover .span_id {
        padding-right: 0;
    }

    .span_title, .span_id {
        transform: rotate(-90deg);
        transition: all .5s;
        letter-spacing: .1em;
    }

    .span_id{
        padding-right: 115px;
    }

    .p_allText{
        &:hover {
            flex-grow: 1;
            justify-content: space-around !important;
            margin: 0;
            transition: all .5s;
        }
    }
}
</style>
