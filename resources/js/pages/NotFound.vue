<template>
    <div class="container-fluid bg_custom d-flex justify-content-center align-items-center rounded-2" style="height: 100%;">
        <div class="text-center">
            <h1 class="display-1">4<span><i class="fa-solid fa-meteor"></i></span>4</h1>
            <h2 class="">Error: 404 page not found</h2>
            <p class="text-muted mt-0">Sorry, the page you're looking for cannot be accessed</p>
            <router-link to="/" class="btn btn-light btn-md mt-3">Go to Home</router-link>
        </div>
    </div>
</template>


<script>
export default {
    name: 'NotFound'
}
</script>

<style lang="scss" scoped>
    $bg: #0f0e17;
    $ghost: #7f5af0;
    $heading: #e7ebf2;
    $h1_shadow: .05em .05em 0 rgba(254, 252, 252, .05);

    .bg_custom {
        background-color: $bg;
        border: 1px solid $ghost;
    }

    h1 {
        font-size: 12.5rem;
        letter-spacing: .10em;
        margin: .025em 0;
        text-shadow: $h1_shadow;
        white-space: nowrap;
        color: $heading;

        @media(max-width: 30rem) {
            font-size: 8.5rem;
        }

        & > span {
            animation: spooky 2s alternate infinite linear;
            color: $ghost;
            display: inline-block;
        }
    }

    h2 {
        color: $heading;
        margin-bottom: .40em;
        font-size: 2rem;
    }

    p {
        color: $heading;
    }

    @keyframes spooky {
        from {
            transform: translatey(.15em) scaley(.95);
        }

        to {
            transform: translatey(-.15em);
        }
    }
</style>

