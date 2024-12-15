@extends('layouts.app')

@section('css')
    {{-- <link href="{{ asset('css/messages.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')

<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
            <h3>{{ $message->subject }}</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <p><strong>Nome:</strong> {{ $message->name }}</p>
            </div>
            <div class="mb-3">
                <p><strong>Email:</strong> {{ $message->email }}</p>
            </div>
            <div class="mb-3">
                <p><strong>Messaggio:</strong></p>
                <p>{{ $message->message }}</p>
            </div>
            <div class="mb-3">
                <p><strong>Data:</strong> {{ $message->created_at->format('d-m-Y H:i') }}</p>
            </div>
        </div>
        <div class="card-footer bg-dark text-secondary">
            <p class="mb-0">Visualizzato il {{ $message->updated_at->format('d-m-Y H:i') }}</p>
        </div>
    </div>
</div>

@endsection
