@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="ard-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="card col-md-4">
                            <div class="card-header">Hdd usage</div>

                            <div class="ard-body">
                                 <div class="row">
                                    <div style="width: 100%">
                                        <canvas id="hddLog" height="450px" width="600px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
