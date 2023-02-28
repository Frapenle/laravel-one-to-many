@extends('layouts.admin')
@section('title', "Admin - Add new project")

@section('content')
<div id="form-create" class="container mt-5">
    <div class="row">
        <div class="col-12">
            @include('admin.partials.form', ['route' => 'admin.projects.store', 'idForm'=>'create-form', 'method' => 'POST', 'project' => $project])
        </div>
    </div>

</div>
@endsection