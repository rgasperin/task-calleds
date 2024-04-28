@extends('templates.template')

@section('content')
    @php
        $formName = isset($called) ? 'formEdit' : 'formCad';
        $actionUrl = isset($called) ? url('chamados/' . $called->id) : url('chamados');
        $method = isset($called) ? 'PUT' : 'POST';
    @endphp
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 p-3">
                    <h1 class="text-center">
                        @if (isset($called))
                            Editar
                        @else
                            Novo Cadastro
                        @endif
                    </h1>
                </div>
            </div>

            <form name="{{ $formName }}" id="{{ $formName }}" method="post" action="{{ $actionUrl }}">
                <div class="row">
                    @method($method)
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <span>{{ $errors->first() }}</span>
                        </div>
                    @endif
                    <div class="col-md-7">
                        <p class="margin-show">Título</p>
                        <input class="form-control" type="text" name="title" id="title"
                            value="{{ $called->title ?? '' }}" placeholder="Título" required>
                    </div>
                    <div class="col-md-5">
                        <p class="margin-show">Categorias</p>
                        <select class="form-select" name="id_categories" id="id_categories" required>
                            <option value="{{ $called->relCategories->id ?? '' }}">
                                {{ $called->relCategories->name ?? 'Categoria' }}
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mt-2">
                        @if (isset($called))
                            <p class="margin-show">Status</p>
                            <select class="form-select" name="id_situation" id="id_situation" required>
                                <option value="{{ $called->relSituation->id ?? '' }}">
                                    {{ $called->relSituation->name ?? '' }}
                                </option>
                                @foreach ($situations as $situation)
                                    @if ($situation->name != 'Novo')
                                        <option value="{{ $situation->id }}">{{ $situation->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="col-md-4 mt-2">
                        @if (isset($called))
                            <p class="margin-show">Prazo para Solução</p>
                            <input class="form-control" name="situation_term" id="situation_term"
                                value="{{ date('d/m/Y', strtotime($called->situation_term ?? '')) }}" disabled />
                        @endif
                    </div>
                    <div class="col-md-4 mt-2">
                        @if (isset($called))
                            <p class="margin-show">Data de Solução </p>
                            <input class="form-control" name="call_resolved" id="call_resolved" disabled
                                @if (!empty($called->call_resolved)) value="{{ date('d/m/Y', strtotime($called->call_resolved)) }}""
                                @else
                                value="Chamado em Aberto" @endif />
                        @endif
                    </div>
                    <div class="col-md-12 mt-2">
                        <p class="margin-show">Descrição</p>
                        <textarea class="form-control" name="description" id="description" placeholder="Mensagem..." cols="30"
                            rows="10" required>{{ $called->description ?? '' }}</textarea>
                    </div>
                    <div class="text-center p-3">
                        <input class="btn btn-primary" type="submit"
                            value="@if (isset($called)) Editar @else Cadastrar @endif">
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
