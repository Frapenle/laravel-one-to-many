@extends('layouts.admin')
@section('content')
<section id="trashed">
    @section('buttons')
        <div class="container-fluid">
            <div class="row w-100 d-flex mt-2">
                <div class="col-12">
                    <div class="controllers w-100 d-flex gap-2">
                        @if (session('message'))
                        <div class="my-alert message alert text-center flex-grow-1 {{session('alert-type')}}">
                            <span>{{session('message')}}</span>
                        </div>
                        @endif
                        <a href="{{route('admin.projects.index')}}" class="ms-auto h-50 btn btn-outline-primary fw-bold sticky-top">Back</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    <div class="container-fluid">
        <div class="row w-100 mt-2">
            <div class="col-12">
                <table class="table table-striped table-hover table-warning">
                    @if(isset($project))
                    <thead class="table-success-dark">
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Preview</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Authors</th>
                        <th scope="col">License</th>
                        <th scope="col">Languages</th>
                        <th scope="col">Frameworks</th>
                        <th scope="col">Github link</th>
                        {{-- <th scope="col">Date creation</th> --}}
                        <th scope="col">Updated</th>
                        <th scope="col" class="text-center" style="width: 250px;">Action</th>
                        </tr>
                    </thead>
                    @endif
                    <tbody class="text-small">
                        @forelse ($projects as $project)
                            <tr>
                                <th scope="row"> {{$project->id}} </th>
                                <td class="text-truncate" style="max-width: 150px;"> {{$project->preview}} </td>
                                <td> {{$project->name}} </td>
                                <td class="text-truncate" style="max-width: 200px;"> {{$project->description}} </td>
                                <td style="max-width: 200px;"> {{$project->authors}} </td>
                                <td> {{$project->license}} </td>
                                <td> {{$project->program_lang}} </td>
                                <td> {{$project->frameworks}} </td>
                                <td class="text-truncate" style="max-width: 100px;"><a href="#">{{$project->github_url}}</a></td>
                                {{-- <td class="text-truncate" style="max-width: 300px;"> {{ \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') }} </td> --}}
                                <td class="text-truncate" style="max-width: 300px;"> {{ \Carbon\Carbon::parse($project->update)->format('Y-m-d  H:i') }} </td>
                                <td style="width: 250px;" class="text-end">
                                    <form action="{{route('admin.projects.forceDelete', $project->id)}}" method="POST" class="delete double-confirm">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-sm btn-secondary" href="{{route('admin.projects.restore', $project->id)}}">Restore</a>
                                        <button type="submit" class="btn btn-sm btn-danger" href="{{route('admin.projects.destroy', $project->id)}}" title="Cancella">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        <table>
                            <tr>
                                <td id="empty" colspan="6"> Il cestino è vuoto </td>
                            </tr>
                        </table>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
@endsection
@section('script')
    @vite('resources/js/confirm-delete.js')
@endsection