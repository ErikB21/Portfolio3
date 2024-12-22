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
                <p><strong>{{ __('Nome:') }}</strong> {{ $message->name }}</p>
            </div>
            <div class="mb-3">
                <p><strong>{{ __('Cognome:') }}</strong> {{ $message->surname }}</p>
            </div>
            <div class="mb-3">
                <p><strong>{{ __('Email:') }}</strong> {{ $message->email }}</p>
            </div>
            <div class="mb-3">
                <p><strong>{{ __('Messaggio:') }}</strong></p>
                <p>{{ $message->message }}</p>
            </div>
            <div class="mb-3">
                <p><strong>{{ __('Data:') }}</strong> {{ $message->created_at->format('d-m-Y H:i') }}</p>
            </div>
            <div class="mb-3">
                <a href="mailto:{{ $message->email }}" class="btn btn-dark"><i class="fa-regular fa-envelope-open fa-xl"></i> {{ __('Rispondi') }}</a>
            </div>
        </div>
        <div class="card-footer bg-dark text-secondary">
            <p class="mb-0">{{ __('Visualizzato il ') }}{{ $message->updated_at->format('d-m-Y H:i') }}</p>
        </div>
    </div>
</div>

@endsection
