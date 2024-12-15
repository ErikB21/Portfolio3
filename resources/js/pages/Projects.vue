<template>
    <div class="container-fluid d-flex flex-column justify-content-between px-0 eb_bg">
        <h1 class="text-center text-warning pt-4">My Projects</h1>
        <div class="row justify-content-center">
            <div class="col-12-col-md-6 col-lg-4 mt-4" style="width:22rem;">
                <div class="card">
                    <img src="#" class="card-img-top" style="height:12rem" alt="#">
                    <div class="card-body">
                        <h5 class="card-title">Card.name</h5>
                        <p class="card-text">Card.text</p>
                        <hr>
                        <div class="d-flex flex-wrap">
                            <span class="badge my-1 mx-2 py-2 rounded-pill">tag.Lang</span>
                        </div>
                        <hr>
                        <a href="#" class="btn card-text">Watch</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'Projects',
    data(){
        return{
            projects: [],
            error: null,
            colors: [

            ]
        };
    },
    mounted(){
        this.getProjects();
    },
    methods: {
        async getProjects(){
            try{
                const response = await axios.get('/api/project');
                console.log('Response:', response.data);
                this.projects = response.data.projects;
                console.log(this.projects);
            } catch(error){
                console.error('Error fetching projects:', error);
                this.error = 'Impossibile caricare i progetti. Riprova più tardi!'
            }
        }
    }
}
</script>



<style scoped lang="scss">
.eb_bg{
    h1{
        font-family: 'Press Start 2P', cursive;
        font-size: 4rem;
    }

    h5{
        font-size: 2.5rem;
        font-family: 'Nanum Pen Script', cursive;
    }
    .btn{
        background-color: #3B576B;
        color: whitesmoke;
        &:hover{
            background-color: black;
        }
    }
    span{
        font-size: 0.8rem;
    }
    .bg-purple{
        background-color: #712cf9;
        color: white;
    }
    .bg-violet{
        background-color: violet;
        color: white;
    }
}

@media screen and (max-width:575.98px) {
    .eb_bg{
        background-image: none;
        h1{
            font-size: 2.5rem;
        }
    }
}
</style>
