<template>
    <div class="container-fluid bg_dark mx-0 px-2 my-5 rounded shadow">
        <div class="mb-5">
            <h2 class="text-light border-bottom pb-2">Introduzione personale</h2>
            <p>
            Ciao! Mi chiamo <strong>[Tuo Nome]</strong> e sono uno sviluppatore web con una forte passione per la tecnologia e la programmazione.
            Attualmente lavoro come operaio, ma dedico il mio tempo libero a perfezionare le mie competenze nello sviluppo software.
            La mia determinazione mi ha portato a intraprendere un percorso formativo che mi ha dato le basi per lavorare con tecnologie moderne e creare soluzioni innovative.
            </p>
        </div>

        <div class="mb-5">
            <h2 class="text-light border-bottom pb-2">Esperienza e competenze</h2>
            <ul class="list-group list-group-flush">
            <li class="list-group-item">
                Corso intensivo di programmazione di sei mesi, acquisendo competenze in <strong>Laravel</strong>, <strong>PHP</strong>, <strong>Vue.js</strong>, e <strong>JavaScript</strong>.
            </li>
            <li class="list-group-item">
                Sei mesi di esperienza come sviluppatore <strong>Salesforce</strong>, lavorando su progetti reali.
            </li>
            <li class="list-group-item">
                Capacità di creare applicazioni web robuste e intuitive, combinando <strong>back-end</strong> e <strong>front-end</strong>.
            </li>
            </ul>
        </div>

        <div class="mb-5">
            <h2 class="text-light border-bottom pb-2">Obiettivi e valori</h2>
            <p>
            Il mio obiettivo principale è continuare a crescere come sviluppatore e consolidare la mia carriera nel mondo IT.
            Credo nell'importanza di essere sempre curioso e di aggiornarsi continuamente, specialmente in un settore in continua evoluzione come quello tecnologico.
            </p>
            <p>
            Cerco sempre di approcciarmi ai progetti con una mentalità orientata alla soluzione, puntando su codice pulito, funzionalità scalabili e un design orientato all'utente.
            </p>
        </div>

        <div>
            <h2 class="text-light border-bottom pb-2">Qualcosa di personale</h2>
            <p>
            Fuori dall'ambito lavorativo, mi piace <strong>giocare ai videogiochi</strong>, <strong>leggere</strong>, <strong>camminare nella natura</strong> e
            <strong>ascoltare la musica</strong>. Queste attività mi aiutano a rilassarmi e a trovare ispirazione, alimentando sia la mia creatività che la mia determinazione.
            </p>
        </div>
        </div>

</template>


<script>

export default{
    name: 'AboutMeTextComponent'
}
</script>


<style lang="scss" scoped>
    .bg_dark{
        background-color: black;
    }
</style>
