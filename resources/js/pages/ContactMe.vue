<template>
    <div class="container-fluid px-0 eb_bg">
        <div class="title text-center">
            <span>C</span><span>O</span><span>N</span><span></span><span>T</span><span>A</span><span>C</span><span>T</span><span>&nbsp;</span><span>M</span><span>E</span>
        </div>
        <div class="row p-0 m-0 justify-content-evenly mt-2 ">
            <div class="col-8 col-md-5 col-lg-5 position-relative">
                <img class="w-100" src="/images/astro.png" alt="">
            </div>
            <div class="col-8 col-md-6 col-lg-6 mt-4">
                <form ref="contactForm" @submit.prevent="sendEmail">
                    <div v-if="successMessage" class="alert alert-success">{{ successMessage }}</div>
                    <div v-if="errorMessage" class="alert alert-danger">{{ errorMessage }}</div>
                    <div class="form-group mb-3">
                        <label class="control-label pb-3" for="name">Name</label>
                        <input v-model="form.name" id="name" name="name" class="form-control py-2" type="text" placeholder="Full Name" :class="{ 'border-danger': errors.name }"/>
                        <small v-if="errors.name">{{ errors.name }}</small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label pb-3" for="email">Email</label>
                        <input v-model="form.email" id="email" name="email" class="form-control py-2" type="email" placeholder="Email" :class="{ 'border-danger': errors.email }"/>
                        <small v-if="errors.email">{{ errors.email }}</small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label pb-3" for="subject">Subject</label>
                        <input v-model="form.subject" id="subject" name="subject" class="form-control py-2" type="text" placeholder="Subject" :class="{ 'border-danger': errors.subject }"/>
                        <small v-if="errors.subject">{{ errors.subject }}</small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label pb-3" for="message">Message</label>
                        <textarea v-model="form.message" id="message" name="message" class="form-control py-2" placeholder="Message" :class="{ 'border-danger': errors.message }"></textarea>
                        <small v-if="errors.message">{{ errors.message }}</small>
                    </div>
                    <div class="d-flex justify-content-evenly px-1 py-3">
                        <button class="btn px-4 py-2 fw-bold" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

  <script>
  import axios from 'axios';

  export default {
    name: 'ContactMe',
    data() {
      return {
        form: {
          name: '',
          email: '',
          subject: '',
          message: ''
        },
        successMessage: '',
        errorMessage: '',
        errors: {}
      };
    },
    methods: {
        async sendEmail() {
        if (!this.validateForm()) return;

        try {
            const response = await axios.post('/send-email', {
                name: this.form.name,
                email: this.form.email,
                subject: this.form.subject,
                message: this.form.message
            });

            if (response.data.status === "success") {
                this.successMessage = response.data.response;
                this.errorMessage = '';
                this.form.name = '';
                this.form.email = '';
                this.form.subject = '';
                this.form.message = '';

                this.$refs.contactForm.scrollIntoView({ behavior: 'smooth' });

                setTimeout(() => {
                    this.successMessage = '';
                }, 3000);
            } else {
                this.errorMessage = response.data.response;
                this.successMessage = '';
            }
        } catch (error) {
            console.error('Failed to send email:', error);
            this.errorMessage = "Error sending email. Please try again later.";
            this.successMessage = '';

            this.$refs.contactForm.scrollIntoView({ behavior: 'smooth' });

            setTimeout(() => {
                this.successMessage = '';
            }, 3000);
        }
        },
        validateForm() {
            return true;
        }
    }
  };
  </script>

  <style scoped lang="scss">

    $col_title: #7f5af0;
    $col_input: #16161a;
    $col_btn: #bc8af9;
    // $col_btn_hover: #994ff3;
    $col_text_btn: #fffffe;
    $font_family: 'Press Start 2P', cursive;
    $font_family_l: 'Nanum Pen Script', cursive;

    .eb_bg {
        height: 100%;

        .eb_fs{
            font-size: 7px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        span {
            font-family: $font_family;
            display: inline-block;
            font-size: 4rem;
            text-shadow: 0 0 0 $col_title;
            color: $col_title;
            animation: smoky 5s 3s linear;
            font-weight: bold;
        }

        span:nth-child(even) {
            animation-name: smoky-mirror;
        }

        @keyframes smoky {
            60% {
                text-shadow: 0 0 40px $col_title;
            }

            to {
                transform:
                    translate3d(15rem, -8rem, 0) rotate(-40deg) skewX(70deg) scale(1.5);
                text-shadow: 0 0 20px $col_title;
                opacity: 0;
            }
        }

        @keyframes smoky-mirror {
            60% {
                text-shadow: 0 0 40px $col_title;
            }

            to {
                transform:
                    translate3d(18rem, -8rem, 0) rotate(-40deg) skewX(-70deg) scale(2);
                text-shadow: 0 0 20px $col_title;
                opacity: 0;
            }
        }

        @for $item from 1 through 21 {
            span:nth-of-type(#{$item}) {
                animation-delay: #{(3 + ($item/10))}s;
            }
        }

        input, textarea{
            caret-color: $col_title;
            caret-shape: bar;
            border: none;
            border-bottom: 1px solid $col_input;
            background-color: transparent;
            &:focus{
                box-shadow: 0 0 0 0.10rem $col_btn;
                border-bottom: none;
            }
        }

        label {
            font-family: $font_family_l;
            font-size: 1.3rem;
            color: #994ff3;
        }

        .btn {
            background-color: $col_input;
            color: $col_btn;

            &:hover {
                background-color: $col_title;
                color: $col_text_btn;
                border: 1px solid $col_title;
            }
        }
    }

    @media screen and (max-width:575.98px) {
        .eb_bg {
            span {
                font-size: 1.7rem;
            }
        }
    }
  </style>

