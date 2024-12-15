<template>
    <div class="penguin position-absolute">
        <div class="penguin-head">
            <div class="face left position-absolute"></div>
            <div class="face right position-absolute"></div>
            <div class="chin position-absolute"></div>
            <div class="eye left position-absolute">
                <div class="eye-lid"></div>
            </div>
            <div class="eye right position-absolute">
                <div class="eye-lid position-absolute"></div>
            </div>
            <div class="beak top"></div>
            <div class="beak bottom"></div>
        </div>
        <div class="penguin-body">
            <div class="arm left"></div>
            <div class="arm right"></div>
            <div class="foot left position-absolute"></div>
            <div class="foot right position-absolute"></div>
        </div>
    </div>
</template>

<script>
export default{
    name: 'AstronauComponent'
}
</script>

<style lang="scss" scoped>
    $penguin-face: rgb(194, 247, 247);
    $penguin-picorna: orange;
    $penguin-skin: gray;

    .penguin {
        width: 200px;
        height: 200px;
        top: -10%;
        left: 25%;
        z-index: 4;
        transition: 1s ease-in-out 0ms;

        &-head {
            width: 50%;
            height: 45%;
            background: linear-gradient(45deg, #{$penguin-skin}, rgb(239, 240, 228));
            border-radius: 70% 70% 65% 65%;
            top: 10%;
            left: 25%;
            z-index: 1;
        }

        &-body {
            width: 53%;
            height: 45%;
            background: linear-gradient(45deg, #{$penguin-skin}, rgb(239, 240, 228));
            border-radius: 80% 80% 100% 100%;
            top: 40%;
            left: 23.5%;

            &::before {
                content: '';
                position: absolute;
                width: 50%;
                height: 45%;
                background-color: #{$penguin-skin};
                top: 10%;
                left: 25%;
                border-radius: 0% 0% 100% 100%;
                opacity: 70%;
            }
        }

        * {
            position: absolute;
        }

        .face {
            width: 60%;
            background-color: #{$penguin-face};
            border-radius: 70% 70% 60% 60%;
            top: 15%;

            &.left {
                left: 5%;
            }

            &.right {
                right: 5%;
            }
        }

        .chin {
            width: 95%;
            height: 60%;
            background-color: #{$penguin-face};
            top: 25%;
            left: 2.5%;
            border-radius: 70% 70% 100% 100%;
        }

        .eye {
            width: 15%;
            height: 17%;
            background-color: black;
            opacity: 0.3;
            top: 45%;
            border-radius: 50%;

            &.left {
                left: 25%;
            }

            &.right {
                right: 25%;
            }

            .eye-lid {
                width: 150%;
                height: 100%;
                background-color: #{$penguin-face};
                top: 25%;
                left: -23%;
                border-radius: 50%;
            }
        }

        .beak {
            height: 10%;
            background-color: #{$penguin-picorna};
            opacity: 0.3;
            border-radius: 50%;

            &.top {
                width: 20%;
                position: absolute;
                top: 60%;
                left: 40%;
            }

            &.bottom {
                width: 16%;
                position: absolute;
                top: 65%;
                left: 42%;
            }
        }

        .foot {
            width: 15%;
            height: 30%;
            background-color: #{$penguin-picorna};
            top: 85%;
            border-radius: 50%;
            z-index: -1;

            &.left {
                left: 25%;
                transform: rotate(80deg);
            }

            &.right {
                right: 25%;
                transform: rotate(-80deg);
            }
        }

        .arm {
            width: 30%;
            height: 60%;
            background: linear-gradient(90deg, #{$penguin-skin}, rgb(209, 210, 199));
            border-radius: 30% 30% 30% 120%;
            z-index: -1;

            &.left {
                top: 35%;
                left: 5%;
                transform-origin: 0% 0%;
                transform: rotate(130deg) scaleX(-1);
                animation: wave 3s infinite linear;
            }

            &.right {
                top: 0%;
                right: -5%;
                transform: rotate(-45deg);
                position: absolute;
            }
        }

    @keyframes wave {
        10% {
            transform: rotate(110deg) scaleX(-1);
        }
        20% {
            transform: rotate(130deg) scaleX(-1);
        }
        30% {
            transform: rotate(110deg) scaleX(-1);
        }
        40% {
            transform: rotate(130deg) scaleX(-1);
        }
    }

    @keyframes waveFlag {
        0% {
            transform: rotate(0deg);
            top: 0px;
        }
        100% {
            transform: rotate(360deg);
            top: 50px;
        }
    }
}

</style>
