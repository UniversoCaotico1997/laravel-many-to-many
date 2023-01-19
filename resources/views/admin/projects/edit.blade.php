@extends('layouts.admin')



@section('content')
<div class="container">
    <h1>Create a New Project</h1>
    @include('partials.errors')
    <form action="{{route('admin.projects.update',$project->slug)}}" method="post" enctype="multipart/form-data">
        @csrf
        @METHOD('PUT')

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Write Title" aria-describedby="helpId" value="{{old('title', $project->title)}}">
            <small id="helpTitle" class="text-muted">Please Enter The Title</small>
        </div>
        <!-- Title -->

        <!-- Img -->
        <div class="mb-3 d-flex gap-3">
            <img width="140" class="" src="{{ asset('storage/' . $project->cover_image)}}" alt="">
            <div>
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror" placeholder="Write Title" aria-describedby="helpCoveImage" value="">
                <small id="helpCoveImage" class="text-muted">Please Enter The Cover Image</small>
            </div>
        </div>
        <!-- /.Img -->

        <!-- Type -->
        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select class="form-select form-select-lg @error('type_id') 'is-invalid' @enderror" name="type_id" id="type_id">
                <option value="">Uncategorize</option>

                @forelse ($types as $type )
                <option value="{{$type->id}}" {{ $type->id == old('type_id',  $project->type ? $project->type->id : '') ? 'selected' : '' }}>
                    {{$type->name}}
                </option>
                @empty
                <option value="">Sorry, no types in the system.</option>
                @endforelse

            </select>
        </div>
        <!-- /.Type -->

        <!-- Technology -->
        <div class="mb-3">
            <label for="technologies" class="form-label">Technologies</label>
            <select multiple class="form-select form-select-sm" name="technologies[]" id="technologies">
                <option value="" disabled>Select a Technology</option>
                @forelse ($technologies as $technology)

                @if ($errors->any())
                <!-- Pagina con errori di validazione, deve usare old per verificare quale id di tag preselezionare -->
                <option value="{{$technology->id}}" {{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>{{$technology->name}}</option>
                @else
                <!-- Pagina caricate per la prima volta: deve mostrarare i tag preseleziononati dal db -->
                <option value="{{$technology->id}}" {{ $project->technologies->contains($technology->id) ? 'selected' : ''}}>{{$technology->name}}</option>
                @endif
                @empty
                <option value="" disabled>No Technologies in the system</option>
                @endforelse

            </select>
        </div>
        <!-- /.Technology -->

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{old('description',$project->description)}}</textarea>
            <small id="helpDescription" class="text-muted">Please Enter The Description</small>
        </div>
        <!--/. Description -->

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary text-uppercase">Update</button>
            <a href="{{route('admin.projects.index')}}" class="btn btn-info">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
            </a>
        </div>
    </form>
</div>
<!-- /.container -->
@endsection