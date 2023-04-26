@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <a href="{{route('create_agent_form')}}" style="justify-content: flex-end" class="nav_link"> <i class='bx bx-folder-plus nav_icon'></i><span>Add new Agent/Server</span></a>
            </div>


            <div class="card">
                <div class="card-header">
                    <div>Agents/Servers</div>
                </div>

                <div class="ard-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Token</th>
                                <th scope="col">Sites count</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
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
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection