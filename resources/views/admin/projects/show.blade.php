@extends('layouts.app')

@section('title','Progetti')

@section('content')

<main>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-auto">
            <h1 class="fs-2 p-4">Titolo: {{ $project->title }}</h1>
        </div>
        <div class="col-auto ms-auto">
          <div class="d-flex gap-2">
            <a href="{{ route('admin.projects.edit',$project) }}" class="p-2">Modifica</a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Elimina
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header justify-content-center">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Vuoi davvero eliminare il progetto?</h1>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Ho cambiato idea</button>
                    <form action="{{ route('admin.projects.destroy',$project) }}" method="POST">
                      @method('DELETE')
                      @csrf

                      <button class="btn btn-outline-danger">Elimina</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <div class="container">
      <ul>
        <li>Tipologia:<br>{{ $project->type ? $project->type->name : 'non specificata' }}</li>
        <li>Link GitHub:<br><a href="{{ $project->repository_link }}">Progetto</a></li>
        <li>Linguaggi:<br>{{ $project->languages }}</li>
        <li>Softwares<br>{{ $project->softwares }}</li>
        <li>Autori<br>{{ $project->authors }}</li>
      </ul>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-4">
          {!! $project->description !!}
        </div>
        <div class="col-8">
          <img src="{{ $project->image_link }}" alt="">
        </div>
      </div>
    </div>
  </section>
</main>

@endsection