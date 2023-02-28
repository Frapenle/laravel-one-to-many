@extends('layouts.admin')
@section('buttons')
    <div class="container-fluid">
        <div class="row w-100 d-flex mt-2">
            <div class="col-12">
                <div class="controllers w-100 d-flex gap-2">
                    <a href="{{route('admin.projects.create')}}" class="h-50 btn btn-outline-success fw-bold sticky-top">Nuovo progetto</a>
                    @if (session('message'))
                    <div class="my-alert message alert text-center flex-grow-1 {{session('alert-type')}}">
                        <span>{{session('message')}}</span>
                    </div>
                    @endif
                    <a href="{{route('admin.projects.trashed')}}" class="ms-auto h-50 btn btn-outline-secondary fw-bold sticky-top"><i class="fa-solid fa-trash fa-xl"></i>@if($trashed>0)&nbsp;{{$trashed}}@endif</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<section id="index">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- Inserire checkbox --}}

            </div>
        </div>
        <div class="row w-100 mt-2">
            <div class="col-12">
                {{-- =========== table head ========= --}}
                <table class="table table-striped table-hover table-warning">
                    <thead class="table-success-dark text-small-th">
                        <tr>
                            {{-- columns with arrow up/down --}}
                        <th scope="col" class="" style="min-width: 50px">
                            <a class="text-primary text-decoration-none" href="{{ route('admin.projects.index', ['sort' => 'id', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}">Id 
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-up fa-xs"></i>
                                    @else
                                        <i class="fas fa-sort-down fa-xs"></i>
                                    @endif
                                @else
                                <i class="fas fa-sort fa-xs"></i>
                                @endif
                            </a>
                        </th>

                        <th scope="col"><a class="text-primary text-decoration-none" href="{{route('admin.projects.index', ['sort' => 'preview', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])}}">Preview 
                            @if ($sort == 'preview')
                                @if ($direction === 'asc')
                                <i class="fas fa-sort-up fa-xs"></i>
                                @else
                                <i class="fas fa-sort-down fa-xs"></i>
                                @endif
                            @else
                            <i class="fas fa-sort fa-xs"></i>
                            @endif
                        </a></th>
                        <th scope="col"><a class="text-primary text-decoration-none" href="{{route('admin.projects.index', ['sort' => 'name', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])}}">Name 
                            Id @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-up fa-xs"></i>
                                    @else
                                        <i class="fas fa-sort-down fa-xs"></i>
                                    @endif
                                @else
                                <i class="fas fa-sort fa-xs"></i>
                                @endif
                        </a></th>
                        <th scope="col"><a class="text-primary text-decoration-none" href="{{route('admin.projects.index', ['sort' => 'description', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])}}">Description 
                            @if ($sort == 'description')
                                @if ($direction === 'asc')
                                <i class="fas fa-sort-up fa-xs"></i>
                                @else
                                <i class="fas fa-sort-down fa-xs"></i>
                                @endif
                            @else
                            <i class="fas fa-sort fa-xs"></i>
                            @endif
                        </a></th>
                        <th scope="col"><a class="text-primary text-decoration-none" href="{{route('admin.projects.index', ['sort' => 'authors', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])}}">Authors 
                            @if ($sort == 'authors')
                                @if ($direction === 'asc')
                                <i class="fas fa-sort-up fa-xs"></i>
                                @else
                                <i class="fas fa-sort-down fa-xs"></i>
                                @endif
                            @else
                            <i class="fas fa-sort fa-xs"></i>
                            @endif
                        </a></th>
                        <th scope="col"><a class="text-primary text-decoration-none" href="{{route('admin.projects.index', ['sort' => 'license', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])}}">License 
                            @if ($sort == 'license')
                                @if ($direction === 'asc')
                                <i class="fas fa-sort-up fa-xs"></i>
                                @else
                                <i class="fas fa-sort-down fa-xs"></i>
                                @endif
                            @else
                            <i class="fas fa-sort fa-xs"></i>
                            @endif
                        </a></th>
                        <th scope="col"><a class="text-primary text-decoration-none" href="{{route('admin.projects.index',['sort' => 'program_lang', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])}}">L.P.
                            @if ($sort == 'program_lang')
                                @if ($direction === 'asc')
                                <i class="fas fa-sort-up fa-xs"></i>
                                @else
                                <i class="fas fa-sort-down fa-xs"></i>
                                @endif
                            @else
                            <i class="fas fa-sort fa-xs"></i>
                            @endif
                        </a></th>
                        <th scope="col"><a class="text-primary text-decoration-none" href="{{route('admin.projects.index', ['sort' => 'frameworks', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])}}">Fw
                            @if ($sort == 'frameworks')
                                @if ($direction === 'asc')
                                <i class="fas fa-sort-up fa-xs"></i>
                                @else
                                <i class="fas fa-sort-down fa-xs"></i>
                                @endif
                            @else
                            <i class="fas fa-sort fa-xs"></i>
                            @endif
                        </a></th>
                        <th scope="col"><span class="text-primary fst-italic">Github</span></th>
                        <th scope="col"><a class="text-primary text-decoration-none" href="{{route('admin.projects.index', ['sort' => 'start_date', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])}}">Created 
                            @if ($sort == 'start_date')
                                @if ($direction === 'asc')
                                <i class="fas fa-sort-up fa-xs"></i>
                                @else
                                <i class="fas fa-sort-down fa-xs"></i>
                                @endif
                            @else
                            <i class="fas fa-sort fa-xs"></i>
                            @endif    
                        </a></th>
                        <th scope="col"><a class="text-primary text-decoration-none" href="{{route('admin.projects.index', ['sort' => 'update', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])}}">Updated 
                            @if ($sort == 'update')
                                @if ($direction === 'asc')
                                <i class="fas fa-sort-up fa-xs"></i>
                                @else
                                <i class="fas fa-sort-down fa-xs"></i>
                                @endif
                            @else
                            <i class="fas fa-sort fa-xs"></i>
                            @endif
                        </a></th>
                        <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-small">
                        @forelse ($projects as $project)
                            <tr>
                                <th scope="row"> {{$project->id}} </th>
                                <td class="text-truncate" style="max-width: 100px">
                                    <img src="{{(Storage::exists($project->preview)) ? asset('storage/' . $project->preview) : asset('placeholders/' . $project->preview)}}" alt="{{$project->name}} preview image" class="" width="80">
                                </td>
                                <td style="min-width: 100px"> {{$project->name}} </td>
                                <td class="text-truncate" style="max-width: 200px"> {{$project->description}} </td>
                                <td style="max-width: 200px"> {{$project->authors}} </td>
                                <td> {{$project->license}} </td>
                                <td> {{$project->program_lang}} </td>
                                <td> {{$project->frameworks}} </td>
                                <td class="text-truncate" style="max-width: 100px"><a href="#">{{$project->github_url}}</a></td>
                                <td class="text-truncate" style="max-width: 300px"> {{ \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') }} </td>
                                <td class="text-truncate" style="max-width: 300px"> {{ \Carbon\Carbon::parse($project->update)->format('Y-m-d  H:i') }} </td>
                                <td style="width: 250px;" class="text-end">
                                    <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" class="delete">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-sm btn-success" href="{{route('admin.projects.show', $project->id)}}">Show</a>
                                        <a class="btn btn-sm btn-warning" href="{{route('admin.projects.edit', $project->id)}}">Edit</a>
                                        <button title="Cancella" type="submit" class="btn btn-sm btn-danger confirm" href="{{route('admin.projects.destroy', $project->id)}}">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        <table>
                            <tr>
                                <td id="empty" colspan="6"> No projects available </td>
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