@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/agent_details.js')}}" defer></script>

    <div class="row justify-content-center" id="details_owner" data-id="{{$agent->id}}">
        <div class="row">
            <div class="flex-container" style="display: flex">
            <div>
                <div class="card-header">Hdd usage</div>
                <div class="ard-body">
                    <div class="row">
                        <div style="width: 100%">
                            <canvas id="hddLog" height="450px" width="600px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-header">Ram usage</div>
                <div class="ard-body">
                    <div class="row">
                        <div style="width: 100%">
                            <canvas id="ramLog" height="450px" width="600px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-header">Cpu usage</div>
                <div class="ard-body">
                    <div class="row">
                        <div style="width: 100%">
                            <canvas id="cpuLog" height="450px" width="600px"></canvas>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </div>

        This is agent details
    </div>
@endsection
