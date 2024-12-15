@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/admin_home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    @include('components.message')
    <div class="main-body pt-5">
        <div class="row gutters-sm">
            <div class="col-md-4">
                <div class="card bg-dark text-light mb-3">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="eb_image pt-2 rounded-circle overflow-hidden d-flex justify-content-center align-items-center">
                                <img src="{{ Auth::user()->profile_pic ? '/storage/profile_pic/'.Auth::user()->profile_pic : 'https://img.freepik.com/premium-vector/gamer-streamer-mascot-logo-vector-illustration_382438-609.jpg' }}" alt="Admin" class="rounded-circle w-100 h-auto object-fit-cover card-img-top">
                            </div>
                            <div class="mt-3">
                                <h4>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h4>
                                <p class="text-secondary mb-1">{{ Auth::user()->work }}</p>
                                <p class="text-muted font-size-sm">{{ Auth::user()->age }} {{ __('anni') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-dark text-light mb-3">
                    <ul class="list-group list-group-flush">
                    @foreach (config('social_Btn') as $btn)
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap bg-dark text-light">
                            <div>
                                <a data-mdb-ripple-init class="mb-0 h6 btn px-2 me-2 {{ $btn['btn'] }}">
                                    <i class="{{ $btn['icon'] }} text-light"></i>
                                </a>
                                <span>{{ $btn['title'] }}</span>
                            </div>
                            <span class="text-secondary">{{ $btn['name'] }}</span>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card bg-dark text-light mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{ __('Nome e Cognome') }}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ Auth::user()->name }} {{ Auth::user()->surname }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{ __('Email') }}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{ __('Anni') }}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ Auth::user()->age }} {{ __('anni') }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{ __('Lavoro') }}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ Auth::user()->work }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{ __('Curriculum') }}</h6>
                            </div>
                            @if(Auth::user()->cv)
                                <div  class="col-sm-9 text-secondary">
                                    {{ __('Eccolo! - ') }}{{ Auth::user()->cv }}
                                </div>
                            @else
                                <div  class="col-sm-9 text-secondary">
                                    {{ __('Non ce sta!') }}
                                </div>
                            @endif
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info " href="{{ route('admin.profile') }}">{{ __('Modifica') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-dark text-light mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 hr_eb text-center">
                                <h6 class="pb-1">
                                    {{ __('Hai ricevuto') }}
                                    {{ Auth::user()->unreadMessages() ? Auth::user()->unreadMessages()->count() : 0 }}
                                    {{ Auth::user()->unreadMessages() && Auth::user()->unreadMessages()->count() == 1 ? 'nuovo messaggio' : 'nuovi messaggi' }}
                                </h6>
                                <a href="{{route('admin.messages')}}" class="btn btn-info">{{ __('Vedi') }}</a>
                            </div>
                            <div class="col-6 text-center">
                                <h6 class="pb-1">
                                    {{ __('Aggiungi nuova skill') }}
                                </h6>
                                <a href="{{ route('admin.skill.create') }}" class="btn btn-info">{{ __('Nuovo') }}</a>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6 hr_eb d-flex flex-column justify-content-center align-items-center">
                                <h6 class="pb-1">
                                    {{ __('Aggiungi nuovo studio/lavoro') }}
                                </h6>
                                <a href="{{ route('admin.work.create') }}" class="btn btn-info">{{ __('Nuovo') }}</a>
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-center">
                                <h6 class="pb-1">
                                    {{ __('Aggiungi nuova certificazione') }}
                                </h6>
                                <a href="{{ route('admin.certification.create') }}" class="btn btn-info">{{ __('Nuovo') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
