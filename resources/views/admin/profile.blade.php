@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/admin_profile.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container rounded bg-dark text-light mt-5 mb-5 shadow">
    <div class="row justify-content-center">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div class="eb_image rounded-circle overflow-hidden d-flex justify-content-center align-items-center">
                    <img class="rounded-circle w-100 h-auto object-fit-cover card-img-top" src={{ Auth::user()->profile_pic ? '/storage/profile_pic/'.Auth::user()->profile_pic : "https://img.freepik.com/premium-vector/gamer-streamer-mascot-logo-vector-illustration_382438-609.jpg"}} alt="Profile Picture">
                </div>
                <h3 class="font-weight-bold mt-3">{{ Auth::user()->name}} {{ Auth::user()->surname  }}</h3>
                <span class="text-secondary">{{ Auth::user()->email }}</span>
            </div>
        </div>
        <div class="col-md-7 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">{{ __('Impostazioni Profilo') }}</h4>
                </div>
                <form action="{{route('admin.update')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels text-secondary">{{ __('Nome') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="first name" value="{{old('name', $profileEdit['name'])}}">
                        </div>

                        @error('name')
                            <div class='invalid-feedback alert alert-danger p-1'>
                                {{$message}}
                            </div>
                        @enderror

                        <div class="col-md-6">
                            <label class="labels text-secondary">{{ __('Cognome') }}</label>
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" placeholder="first surname" value="{{old('surname', $profileEdit['surname'])}}">
                        </div>

                        @error('surname')
                            <div class='invalid-feedback alert alert-danger p-1'>
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels text-secondary">{{ __('Email') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="first email" value="{{old('email', $profileEdit['email'])}}">
                        </div>

                        @error('email')
                            <div class='invalid-feedback alert alert-danger p-1'>
                                {{$message}}
                            </div>
                        @enderror

                        <div class="col-md-12">
                            <label class="labels text-secondary">{{ __('Anni') }}</label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" placeholder="first age" value="{{old('age', $profileEdit['age'])}}">
                        </div>

                        @error('age')
                            <div class='invalid-feedback alert alert-danger p-1'>
                                {{$message}}
                            </div>
                        @enderror

                        <div class="col-md-12">
                            <label class="labels text-secondary">{{ __('Lavoro') }}</label>
                            <input type="text" class="form-control @error('work') is-invalid @enderror" id="work" name="work" placeholder="first work" value="{{old('work', $profileEdit['work'])}}">
                        </div>

                        @error('work')
                            <div class='invalid-feedback alert alert-danger p-1'>
                                {{$message}}
                            </div>
                        @enderror

                        <div class="col-md-12">
                            <label class="labels text-secondary">{{ __('CV') }}</label>
                            <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv" placeholder="insert cv" value="{{old('cv', $profileEdit['cv'])}}">
                        </div>

                        @error('cv')
                            <div class='invalid-feedback alert alert-danger p-1'>
                                {{$message}}
                            </div>
                        @enderror

                        <div class="col-md-12">
                            <label class="labels text-secondary">{{ __('Foto Profilo') }}</label>
                            <input type="file" class="form-control @error('profile_pic') is-invalid @enderror" id="profile_pic" name="profile_pic" placeholder="profile_pic" value="{{old('profile_pic', $profileEdit['profile_pic'])}}">
                        </div>

                        @error('profile_pic')
                            <div class='invalid-feedback alert alert-danger p-1'>
                                {{$message}}
                            </div>
                        @enderror

                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary" type="submit">{{ __('Salva Profilo') }}</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
