@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <a href="{{route('create_agent_form')}}" style="justify-content: flex-end" class="nav_link"> <i class='bx bx-folder-plus nav_icon'></i><span>Ավելացնել նոր գործակալ/սերվեր</span></a>
            </div>


            <div class="card">
                <div class="card-header">
                    <div>Գործակալներ/Սերվերներ</div>
                </div>
                <div class="col-md-10">
                <div class="ard-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Անուն</th>
                                <th scope="col">Նկարագրություն</th>
                                <th scope="col">Տոկեն</th>
                                <th scope="col">Կայքերի քանակ</th>
                                <th scope="col">Ստեղծվել է</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($agents as $agent)
                            <tr>
                                <td>{{$agent->name}}</td>
                                <td>{{$agent->description}}</td>
                                <td>{{$agent->token}}</td>
                                <td>{{count($agent->sites)}}</td>
                                <td>{{$agent->created_at}}</td>
                                <td>
                                    <a href="{{route('agent_update_form', ['id' => $agent->id])}}" class="nav_link"> <i class='bx bx-edit nav_icon'></i> </a>
                                    <a href="{{route('agent_details', ['id' => $agent->id])}}" class="nav_link"> <i class="bi bi-bar-chart-line-fill"></i>  </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
