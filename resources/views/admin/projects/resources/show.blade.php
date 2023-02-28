@extends('layouts.admin')
@section('title', "Admin - Show $project->name")
@section('content')
<section id="cards" class="m-4">
    <div class="">
        <div class="row w-100">
            <div class="col-12">
                <p><span class="fw-bold">Id</span>: {{$project->id}} </p>
                <h4><span class="fw-bold">Name</span>: {{$project->name}} </h4>
                <p><span class="fw-bold">Description</span>: {{$project->description}} </p>
                <div class="card-img">
                    <span class="fw-bold">Preview: </span>
                    <img src="{{(Storage::exists($project->preview)) ? asset('storage/' . $project->preview) : asset('placeholders/' . $project->preview)}}" alt="{{$project->name}} preview image" class="" width="150">
                </div>
                {{-- <p><span class="fw-bold">Preview</span>: {{$project->preview}} </p> --}}
                <p><span class="fw-bold">Authors</span>: {{$project->authors}} </p>
                <p><span class="fw-bold">License</span>: {{$project->license}} </p>
                <p><span class="fw-bold">Languages</span>: {{$project->program_lang}} </p>
                <p><span class="fw-bold">Frameworks</span>: {{$project->frameworks}} </p>
                <p><span class="fw-bold">Github link</span>: {{$project->github_url}} </p>
                <p><span class="fw-bold">Creation date</span>: {{$project->start_date}} </p>
                <p><span class="fw-bold">Last update</span>: {{$project->update}} </p>
                {{-- inserire pulsanti --}}
                <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                @csrf
                @method('DELETE')
                    <a class="btn btn-warning btn-sm" href="{{route('admin.projects.edit', $project->id)}}">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm" href="{{route('admin.projects.destroy', $project->id)}}">Delete</button>
                    <a href="{{route('admin.projects.index')}}" class="btn btn-primary btn-sm">Back</a>
            </form>
            </div>
        </div>
    </div>
</section>
@endsection
