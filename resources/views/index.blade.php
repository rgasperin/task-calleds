@extends('templates.template')

@section('content')
    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-3">
                    <div class="card-view text-center">
                        <p>Total de Chamados:</p>
                        <div class="d-flex justify-content-center">
                            <span class="text-view">
                                {{ number_format($totalCalled) }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-3">
                    <div class="card-view text-center">
                        <p>Total de Chamados resolvidos:</p>
                        <div class="d-flex justify-content-center">
                            <div style="border: 1px solid #ccc;width: 200px;height: 20px;position: relative;">
                                <div style="background-color: #14af19;height: 100%; width:{{ $totalPercentage }}%">
                                </div>
                                <div
                                    style="font-size:13px;position:absolute;top:0;left:0;display:flex;
                        justify-content:center;align-items:center;width:100%;height:100%;padding:10px">
                                    {{ number_format($totalPercentage, 2) }}%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-3">
                    <div class="card-view text-center">
                        <p>Chamados resolvidos no mês atual:</p>
                        <div class="d-flex justify-content-center">
                            <div style="border: 1px solid #ccc;width: 200px;height: 20px;position: relative;">
                                <div style="background-color: #14af19;height: 100%; width: {{ $percentage }}%">
                                </div>
                                <div
                                    style="font-size:13px;position:absolute;top:0;left:0;display:flex;
                        justify-content:center;align-items:center;width:100%;height:100%;padding:10px">
                                    {{ number_format($percentage, 2) }}%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-center mt-4">
                    <a class="text-decoration-none" href="{{ url('chamados/') }}">
                        <button class="btn btn-dark btn-icon ">
                            Ver Chamados <i class="ms-2 fi fi-br-arrow-turn-down-right btn-icon"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection


