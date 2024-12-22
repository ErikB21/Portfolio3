
@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/messages.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container my-5">
    @include('components.message')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center text-light bg-dark py-4">
            <h3 class="mb-0 me-4">{{ __('Messaggi') }}</h3>

            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Cerca Messaggi" aria-label="Cerca Messaggi">
            </div>
        </div>
        <div class="card-body">
            <div class="row" id="searchMessages">
                <p id="noResultsMessage" style="display: none;" class="text-secondary text-center">
                    {{ __('Nessun messaggio trovato.') }}
                </p>
                @foreach ($messages as $message)
                    <section class="col-md-4 mb-4" id="searchCard">
                        <div class="card">
                            <div class="card-header text-light bg-dark py-3">
                                <h4 class="card-title">{{ $message->subject }}</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="card-subtitle pb-2 text-muted">{{ $message->name }} {{ $message->surname }}</h5>
                                <h6 class="card-subtitle pb-4 text-muted">({{ $message->email }})</h6>
                                <p class="card-text fs-5">
                                    {{ Str::length($message->message) <= 35 ? $message->message : Str::limit($message->message, 35, '...') }}
                                </p>
                                <p class="card-text pt-3"><small class="text-muted">{{ __('Ricevuto') }}: {{ $message->created_at->format('d/m/Y H:i') }}</small></p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-evenly text-light bg-dark py-3">
                                <a href="{{ route('admin.messages.show', $message->id) }}" title="Visualizza" class="btn btn-primary mx-1"><i class="fa-regular fa-eye fa-xl"></i></a>
                                <a href="mailto:{{ $message->email }}" title="Rispondi" class="btn btn-light"><i class="fa-regular fa-envelope fa-xl"></i></a>
                                <form action="{{ route('admin.message.destroy', $message->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Elimina" class="btn btn-danger mx-1" onclick="return confirm('Sei sicuro di voler eliminare questo messaggio?');"><i class="fa-regular fa-trash-can fa-xl"></i></button>
                                </form>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('searchInput');
        const searchMessages = document.getElementById('searchMessages');
        const noResultsMessage = document.getElementById('noResultsMessage');

        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase().trim();
            const rows = searchMessages.querySelectorAll('section');
            let hasVisible = false;

            rows.forEach((row) => {
                const cardContent = row.querySelector('.card').textContent.toLowerCase();

                if (cardContent.includes(filter)) {
                    row.style.display = ""; // Mostra la sezione
                    hasVisible = true; // Imposta a true se troviamo almeno un risultato
                } else {
                    row.style.display = "none"; // Nascondi la sezione
                }
            });

            // Mostra il messaggio "Nessun risultato trovato" solo se nessuna sezione è visibile
            noResultsMessage.style.display = hasVisible ? "none" : "block";
        });
    });
</script>

@endsection


@endsection

