@extends('layouts.admin')



@section('content')
<div class="container text-center mt-5">
    @if($project->cover_image)
    <img class="img-fluid" src="{{asset('storage/' . $project->cover_image)}}" alt="">
    @else
    <div class="placeholders p-5 bg-secondary">placeholders</div>
    @endif
    <h1>{{$project->title}}</h1>
    <p>{{$project->description}}</p>

    <div class="type">
        <strong>Type</strong>
        {{ $project->type ? $project->type->name : 'Uncategorized'}}
    </div>

    <div class="technology">
        <strong>Technologies:</strong>
        @if(count($project->technologies) > 0 )


        @foreach ($project->technologies as $technology)
        <span>#{{$technology->name}} </span>
        @endforeach

        @else
        <span>Not technology associated to the current post</span>
        @endif

    </div>


</div>
<div>
    <a href="{{route('admin.projects.index')}}" class="btn btn-info">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>
    </a>
</div>
<!-- /.container -->
@endsection