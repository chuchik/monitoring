@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/agent_details.js')}}" defer></script>
    <div style="text-align: center"><h2>This is agent details</h2></div>
    <div class="row justify-content-center" id="details_owner" data-id="{{$agent->id}}">
        <div class="row">
            <div class="flex-container" style="display: flex">
                <div class="ard-body">
                    <div class="row">Hdd usage
                        <div style="width: 100%">
                            <canvas id="hddLog" height="450px" width="600px"></canvas>
                        </div>
                        <div class="row">Ram usage
                            <div style="width: 100%">
                                <canvas id="ramLog" height="450px" width="600px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ard-body">
                    <div class="row">Cpu usage
                        <div style="width: 100%">
                            <canvas id="cpuLog" height="450px" width="600px"></canvas>
                        </div>
                        <div class="row">Db usage
                            <div style="width: 100%">
                                <canvas id="dbLog" height="450px" width="600px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
@endsection
