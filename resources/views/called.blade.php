@extends('templates.template')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-4 mb-4">
                    <h1 class="text-center">Lista de Chamados</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Id</th>
                                <th scope="col" class="text-center">Título</th>
                                <th scope="col" class="text-center">Categoria</th>
                                <th scope="col" class="text-center">Prazo para Solução</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Data de Abertura</th>
                                <th scope="col" class="text-center">Data de Solução</th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($called as $calleds)
                                @php
                                    $categories = $calleds->find($calleds->id)->relCategories;
                                    $stats = $calleds->find($calleds->id)->relSituation;
                                @endphp
                                <tr>
                                    <th scope="row">{{ $calleds->id }}</th>
                                    <td class="text-center">{{ $calleds->title }}</td>
                                    <td class="text-center">{{ $categories->name }}</td>
                                    <td class="text-center">
                                        @if (!empty($calleds->situation_term))
                                            {{ date('d/m/Y', strtotime($calleds->situation_term)) }}
                                        @else
                                            Prazo não informado
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $stats->name }}</td>
                                    <td class="text-center">{{ date('d/m/Y  H:i', strtotime($calleds->created_at)) }}</td>
                                    <td class="text-center">
                                        @if (!empty($calleds->call_resolved))
                                            {{ date('d/m/Y', strtotime($calleds->call_resolved)) }}
                                        @else
                                            Chamado em Aberto
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a class="text-decoration-none" href="{{ url('chamados/' . $calleds->id) }}">
                                            <button class="btn btn-dark btn-view">
                                                <i class="fi fi-ss-eye btn-icon"></i>
                                            </button>
                                        </a>
                                        <a class="text-decoration-none"
                                            href="{{ url('chamados/' . $calleds->id) . '/edit' }}">
                                            <button class="btn btn-primary btn-view">
                                                <i class="fi fi-sr-file-edit btn-icon"></i>
                                            </button>
                                        </a>

                                        <button class="btn btn-danger btn-view" onclick="openDeleteModal()">
                                            <i class="fi fi-sr-trash btn-icon"></i>
                                        </button>

                                        <div id="confirmModalDelete" class="modal" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirmar Exclusão</h5>
                                                        <button class="btn-close" type="button"
                                                            onclick="closeDeleteModal()" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span>Tem certeza de que deseja excluir este item?</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            onclick="closeDeleteModal()">Cancelar</button>

                                                        <form id="deleteForm" method="POST"
                                                            action="{{ url('chamados/' . $calleds->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Confirmar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($called->hasPages())
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ $called->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $called->previousPageUrl() }}" tabindex="-1"
                                        aria-disabled="true">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                @foreach ($called->getUrlRange(1, $called->lastPage()) as $page => $url)
                                    <li class="page-item {{ $called->currentPage() == $page ? 'active' : '' }}"><a
                                            class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endforeach

                                <li class="page-item {{ $called->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link pagination" href="{{ $called->nextPageUrl() }}">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
