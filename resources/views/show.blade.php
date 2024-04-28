@extends('templates.template')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-3">
                    <h1 class="text-center">{{ $called->title }}</h1>

                    <a class="text-decoration-none" href="{{ url('chamados') }}">
                        <button class="btn btn-dark btn-view">
                            <i class="fi fi-sr-undo"></i> Voltar
                        </button>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @php
                            $category = $called->find($called->id)->relCategories;
                            $stats = $called->find($called->id)->relSituation;
                        @endphp
                        <div class="col-lg-12">
                            <h5 class="margin-show text-center card-title">Chamado - ID
                                {{ $called->id }}
                            </h5>
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <p class="margin-show">Data de Abertura:</p>
                            <input class="form-control"
                                value=" {{ date('d/m/Y H:i:s', strtotime($called->created_at ?? '')) }}" disabled>

                        </div>
                        <div class="col-lg-4">
                            <p class="margin-show">Prazo para Solução:</p>
                            <input class="form-control"
                                value=" {{ date('d/m/Y', strtotime($called->situation_term ?? '')) }} " disabled>

                        </div>
                        <div class="col-lg-4">
                            <p class="margin-show">Categoria:</p>
                            <input class="form-control" value=" {{ $category->name }}" disabled>

                        </div>
                        <div class="col-lg-6 mt-2">
                            <p class="margin-show">Status:</p>
                            <input class="form-control" value="{{ $stats->name }}" disabled>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <p class="margin-show">Data de Solução:</p>
                            <input class="form-control" value="{{ $call_resolved ?? 'Chamado em Aberto' }}" disabled>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <p class="margin-show">Descrição:</p>
                            <textarea class="form-control textarea-show" disabled> {{ $called->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
