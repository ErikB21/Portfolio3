<template>
    <div class="project">
        <!-- Libro del progetto -->
        <p class="d-flex flex-column justify-content-between">
            <span>{{ project.name }}</span>
            <router-link
                v-if="project"
                :to="{ name: 'watchProject', params: { id: project.id } }"
                :title="project.name || 'Project Details'"
                class="btn card-text">
                Watch
            </router-link>
            <span class="p-0">{{ project.id }}</span>
        </p>
    </div>
</template>

<script>
export default {
    name: 'Project',
    props: {
        project: {
            type: Object,
            required: true
        }
    }
}
</script>

<style lang="scss" scoped>
.project {
    width: 50px;
    height: 100%;
    cursor: pointer;
    border-radius: 2px;
    transition: all .5s;
    outline: 4px solid #7f5af0; /* Bordo interno */
    outline-offset: -4px; /* Sposta l'outline all'interno */
    background-color: rgba(30, 31, 38, 0.85);
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative; /* Per posizionare il router-link */
}
.project:hover {
    width: 150px; /* Larghezza aumentata in hover */
    transition: all 0.5s ease;
}

.project p {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column; /* Dispone la scritta sopra e il link sotto */
    height: 100%;
    gap: 10px; /* Spazio tra scritta e link */
    position: relative;
}

.project p span {
    padding: 3.5em;
    transform: rotate(-90deg);
    transition: all .5s;
    text-transform: uppercase;
    color: #fff;
    letter-spacing: .1em;
}

.project:hover p span {
    transform: rotate(0);
}

.project p:hover {
    flex-grow: 1;
}

.project .btn {
    opacity: 0; /* Nasconde il link inizialmente */
    transform: translateY(10px); /* Posizionamento iniziale verso il basso */
    transition: all 0.3s ease; /* Animazione per apparire */
    color: #ff5a91;
    font-size: 0.9rem;
    text-transform: uppercase;
    display: none;
}

.project:hover .btn {
    opacity: 1; /* Rende visibile il link */
    transform: translateY(0); /* Riporta il link nella posizione corretta */
    display: inline;
}
</style>
