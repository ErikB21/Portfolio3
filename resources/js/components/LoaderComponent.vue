<template>
    <div class="loader rounded-4 d-flex flex-column justify-content-center align-items-center h-100">
        <br /><br />
        <h3 class="h3 text-center">“{{ randomQuote.text }}”</h3>
        <span class="author">{{ randomQuote.author }}</span>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="loader16"></div>
            </div>
        </div>
        <br /><br />
    </div>
</template>

<script>
import quotes from '../quotes.js';

export default {
    name: 'LoaderComponent',
    data() {
        return {
            randomQuote: this.getRandomQuote(),
        };
    },
    methods: {
        getRandomQuote() {
            const randomIndex = Math.floor(Math.random() * quotes.length);
            return quotes[randomIndex];
        },
    },
};
</script>

<style lang="scss" scoped>
    $back_loader: rgba(255, 255, 255, 0.8);
    $back_before: #000;
    $back_after: #7f5af0;
    $font_family: "Dancing Script", cursive;

    .loader {
        background-color: $back_loader;
        h3{
            font-family: $font_family;
            font-weight: 400;
        }
        .loader16 {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            position: relative;
        }

        .loader16:after,
        .loader16:before {
            content: "";
            width: 70px;
            height: 70px;
            border-radius: 50%;
            position: absolute;
            left: 0;
        }

        .loader16:before {
            height: 7px;
            border-radius: 50%;
            background: $back_before;
            opacity: .1;
            top: 80px;
            animation: shadow .5s linear infinite;
        }

        .loader16:after {
            height: 70px;
            width: 70px;
            border-radius: 50%;
            background: $back_after;
            top: 0;
            animation: loading .5s linear infinite;
        }

        @keyframes loading {
            25% {
                transform: translateY(9px) rotate(22.5deg);
            }
            50% {
                transform: translateY(18px) scale(1, .9) rotate(45deg);
            }
            75% {
                transform: translateY(9px) rotate(67.5deg);
            }
            100% {
                transform: translateY(0) rotate(90deg);
            }
        }

        @keyframes shadow {
            0%, 100% {
                transform: scale(1, 1);
            }
            50% {
                transform: scale(1.2, 1);
            }
        }
    }

</style>
