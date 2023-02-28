
<form id="{{$idForm}}" action="{{route($route, $project->id)}}" method="POST" class="mb-3" name={{$idForm}} enctype="multipart/form-data">
@csrf
@method($method)

{{-- @if ($errors->any())
        
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
        </ul>
    </div>
    @endif --}}
    
    <div class="d-flex gap-2 w-100">
        <div class="mb-4 w-50">
            <label for="name" class="form-label">Name*</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $project->name) }}">
            @error('name')<small class="text-danger">{{$message}}</small>@enderror
        </div>

        <div class="mb-4 w-50">
            <label for="authors" class="form-label">Authors*</label>
            <input name="authors" type="text" class="form-control @error('authors') is-invalid @enderror" id="authors" value="{{ old('title', $project->authors) }}">
            @error('authors')<small class="text-danger">{{$message}}</small>@enderror
        </div>
    </div>

    <div id="stack-license" class="d-flex gap-2 w-100">
        <div class="mb-4 col">
            <label for="program_lang" class="form-label">Languages</label>
            <input name="program_lang" type="text" class="form-control @error('program_lang') is-invalid @enderror" id="program_lang" value="{{ old('program_lang', $project->program_lang) }}">
            @error('program_lang')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="mb-4 col">
            <label for="frameworks" class="form-label">Frameworks</label>
            <input name="frameworks" type="text" class="form-control @error('type') is-invalid @enderror" id="type" value="{{ old('frameworks', $project->frameworks) }}">
            @error('type')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="mb-4 w-15">
            <label for="license" class="form-label">Lincense</label>
            <input name="license" type="text" class="form-control @error('license') is-invalid @enderror" id="license" value="{{ old('title', $project->license) }}">
            @error('license')<small class="text-danger">{{$message}}</small>@enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description', $project->description) }}</textarea>
        @error('description')<small class="text-danger">{{$message}}</small>@enderror
    </div>
    <div class="mb-4">
        <label for="preview" class="form-label">Preview image</label>
        <input name="preview" type="file" class="form-control @error('preview') is-invalid @enderror" id="preview" value="{{ old('preview', $project->preview) }}">
        @error('preview')<small class="text-danger">{{$message}}</small>@enderror
    </div>
    
    <div class="mb-4">
        <label for="github_url" class="form-label">Github link</label>
        <input name="github_url" type="text" class="form-control @error('github_url') is-invalid @enderror" id="github_url" value="{{ old('github_url', $project->github_url) }}">
        @error('github_url')<small class="text-danger">{{$message}}</small>@enderror
    </div>
    <div id="date" class="d-flex gap-2 w-100">
        <div class="mb-4 w-50">
            <label for="start_date" class="form-label">Creation date*</label>
            <input name="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" value="{{ old('start_date', $project->start_date) }}">
            @error('start_date')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="mb-4 input-date-wrapper w-50">
            <label for="update" class="form-label">Update</label>
            <input name="update" type="date" class="form-control @error('update') is-invalid @enderror" id="update" value="{{ old('update', $project->update) }}">
            @error('update')<small class="text-danger">{{$message}}</small>@enderror
        </div>
    </div>
    <button type="submit" class="btn {{ $method == 'PUT' ? 'btn-warning' : 'btn-success' }}">
    {{ $method == 'PUT' ? 'Modifica' : 'Aggiungi' }}
    </button>


</form>
@section('script')
    @vite('resources/js/confirm-delete.js')
@endsection
