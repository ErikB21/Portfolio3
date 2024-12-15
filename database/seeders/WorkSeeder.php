<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->insert([
            [
                'user_id' => 1,
                'work_title' => 'Operatore di Linea e Macchinista – Camere Bianche',
                'work_company' => 'Giovanni Rana',
                'work_city' => 'Moretta',
                'work_start' => '2024-03-05',
                'work_end' => null,
                'work_present' => 1,
                'is_work' => 1,
                'is_study' => 0,
                'work_explained' => '• Operazioni in camere bianche con stretta osservanza delle norme igieniche e di sicurezza, mantenendo un ambiente sterile per la produzione alimentare.
                    • Cambio e gestione delle bobine per il confezionamento, assicurando la continuità del processo produttivo.
                    • Controlli di qualità a campione su prodotti finiti e semilavorati per verificare la conformità agli standard aziendali e di legge.
                    • Uso di macchinari specifici per l\'imballaggio e la confezione di prodotti alimentari, con particolare attenzione alla regolazione e alla manutenzione base.',
                'work_logo' => ''
            ],
            [
                'user_id' => 1,
                'work_title' => 'It Consultant - Sviluppatore Salesforce',
                'work_company' => 'Lobra S.r.l.',
                'work_city' => 'Milano',
                'work_start' => '2023-07-01',
                'work_end' => '2024-01-15',
                'work_present' => 0,
                'is_work' => 1,
                'is_study' => 0,
                'work_explained' => '• Sviluppo integrazioni API con Marketing Cloud.
                    • Sviluppo trigger, flow e batch.
                    • Sviluppo di classi Apex, di Visualforce, di Lightning Component, Sync/Async.
                    • Redazione di documentazione tecnica.
                    • Supporto al Configuration Management e alla gestione dei deploy.
                    • Supporto all\'application maintenance e gestione bug-fixing.',
                'work_logo' => ''
            ],
            [
                'user_id' => 1,
                'work_title' => 'CRM & Digital Project Specialist',
                'work_company' => 'Experis Italia',
                'work_city' => 'Remoto',
                'work_start' => '2023-05-05',
                'work_end' => '2023-06-28',
                'work_present' => 0,
                'is_work' => 0,
                'is_study' => 1,
                'work_explained' => '• Capacità di lavorare con strumenti CRM avanzati per ottimizzare le interazioni con i clienti.
                    • Conoscenza delle basi di programmazione Java applicata in contesti CRM e gestionali.
                    • Familiarità con Salesforce e SAP, con una particolare attenzione all\'integrazione dei dati e alla personalizzazione delle interfacce per migliorare l\'efficienza aziendale.',
                'work_logo' => ''
            ],
            [
                'user_id' => 1,
                'work_title' => 'Formazione in Sviluppo Web',
                'work_company' => 'Boolean Careers',
                'work_city' => 'Remoto',
                'work_start' => '2022-05-01',
                'work_end' => '2022-11-30',
                'work_present' => 0,
                'is_work' => 0,
                'is_study' => 1,
                'work_explained' => '• Sviluppo di una replica di Netflix (Boolflix) utilizzando HTML, CSS, JavaScript e JQuery, con integrazione di API per la gestione dei contenuti.
                    • Riproduzione di layout complessi di piattaforme popolari come Spotify Web, Discord, WhatsApp Web e WordPress, sfruttando framework e linguaggi avanzati come PHP, Laravel e Vue.js.
                    • Solida base tecnica, potenziando le mie capacità di sviluppo e gestione di progetti web end-to-end.',
                'work_logo' => ''
            ],
            [
                'user_id' => 1,
                'work_title' => 'Operaio di linea e macchinista - Colata',
                'work_company' => 'Teksid Aluminum',
                'work_city' => 'Carmagnola',
                'work_start' => '2018-07-01',
                'work_end' => '2021-10-31',
                'work_present' => 0,
                'is_work' => 1,
                'is_study' => 0,
                'work_explained' => '• Controllo qualità durante tutte le fasi di produzione per garantire la conformità agli standard aziendali.
                    • Operazioni di controllo numerico per garantire la precisione e la consistenza dei componenti.
                    • Pulizia e ordine.
                    • Utilizzo di robot industriali, attrezzature particolari per la fusione dell\'alluminio.',
                'work_logo' => ''
            ],
            [
                'user_id' => 1,
                'work_title' => 'Addetto alle vendite - Ortofrutta',
                'work_company' => 'Mercatò - Dimar',
                'work_city' => 'Savigliano',
                'work_start' => '2017-12-01',
                'work_end' => '2018-06-30',
                'work_present' => 0,
                'is_work' => 1,
                'is_study' => 0,
                'work_explained' => '• Mantenere l\'ordine e la pulizia del reparto, garantendo un ambiente di lavoro igienico e accogliente.
                    • Collaborazione con il team per ottimizzare le operazioni quotidiane, sia in termini di efficienza che di servizio al cliente.
                    • Assistenza e consulenza ai clienti, promuovendo una relazione positiva e rispondendo tempestivamente alle loro esigenze.',
                'work_logo' => ''
            ],
            [
                'user_id' => 1,
                'work_title' => 'Instituto Superiore per i servizi Enogastronomici',
                'work_company' => 'Ipsar - Velso Mucci',
                'work_city' => 'Bra',
                'work_start' => '2011-09-10',
                'work_end' => '2017-07-10',
                'work_present' => 0,
                'is_work' => 0,
                'is_study' => 1,
                'work_explained' => '• Settore: Sala Bar
                    • Diploma: 67/100',
                'work_logo' => ''
            ],
        ]);
    }
}
