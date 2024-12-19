@extends('layouts.app')

@section('content')
    <div class="container py-3">
        @if($project->name)
            <h1>{{ __('Modifica') }} {{ $project->name }}</h1>
            <form action="{{ route('admin.project.update', $project) }}" method="POST" class="row" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
        @else
            <h1>{{ __('Nuovo Progetto') }}</h1>
            <form action="{{ route('admin.project.store') }}" method="POST" class="row" id="manageCategoryForm" enctype="multipart/form-data">
                @csrf
        @endif
                <div class="form-group mt-3">
                    <input type="text" required minlength="3" value="{{ old('name', $project->name) }}" placeholder="Nome Progetto" class="form-control" name="name" id="name">
                </div>
                <div class="form-group mt-3">
                    <input type="file" class="form-control" name="path_image" id="path_image">
                    @if($project->path_image)
                        <small class="text-muted">{{ $project->path_image }}</small>
                    @endif
                </div>
                <div class="form-group mt-3">
                    <label for="skills">{{ __('Skill Utilizzate') }}</label>
                    <div>
                        @foreach($skills as $skill)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="skills[]" id="skill-{{ $skill->id }}"
                                       value="{{ $skill->id }}"
                                       {{ in_array($skill->id, old('skills', $selectedSkills ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="skill-{{ $skill->id }}">
                                    {{ $skill->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="url" required value="{{ old('url', $project->url) }}" placeholder="Url Github" class="form-control" name="url" id="url">
                </div>
                <div class="form-group mt-3">
                    <input type="file" value="{{ old('url_video', $project->url_video) }}" placeholder="Url Video" class="form-control" name="url_video" id="url_video">
                    @if($project->url_video)
                        <small class="text-muted">{{ $project->url_video }}</small>
                    @endif
                </div>
                <div class="form-group mt-3">
                    <input required type="text" value="{{ old('user_id', $skill->user_id) }}" placeholder="Utente" class="form-control" name="user_id" id="user_id">
                </div>
                <div class="form-group mt-3">
                    <label class="labels text-secondary">{{ __('Descrizione Progetto') }}</label>
                    <textarea class="form-control" rows="3" name="text" required minlength="100" maxlength="2000">{{ old('text', $project->text) }}</textarea>
                </div>
                <div class="form-group mt-3 d-flex justify-content-center">
                    @if($project->name)
                        <button class="btn btn-warning mt-2"><i class="fa-solid fa-pen px-1"></i>{{ __('Salva Modifiche') }}</button>
                    @else
                        <button class="btn btn-primary mt-2"><i class="fa-solid fa-save px-1"></i>{{ __('Salva') }}</button>
                    @endif
                </div>
            </form>

        @if($project->name)
            <form action="{{ route('admin.project.destroy', $project) }}" class="row" onsubmit="return confirm('Sei sicuro di voler cancellare questo progetto?')">
                @method("DELETE")
                @csrf
                <div class="form-group mt-3 d-flex justify-content-center">
                    <button class="btn btn-danger mt-2" id="{{ $project}}"><i class="fa-solid fa-trash px-1"></i>{{ __('Elimina') }}</button>
                </div>
            </form>
        @endif
    </div>
@endsection
