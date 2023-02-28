@extends('layouts.admin')
@section('title', "Admin - edit $project->name")
@section('content')
<div class="container mt-2">
    <div class="row">
            <div class="col-12">
                <div id="edit">
                    @include('admin.partials.form', ['route' => 'admin.projects.update', 'idForm'=>'edit-form', 'method' => 'PUT', 'project' => $project])
                </div>
            </div>
    </div>
</div>
@endsection
