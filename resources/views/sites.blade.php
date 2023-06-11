@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <a href="{{route('create_site_form')}}" style="justify-content: flex-end" class="nav_link"> <i class='bx bx-folder-plus nav_icon'></i><span>Ավելացնել նոր կայք</span></a>
            </div>


            <div class="card">
                <div class="card-header">
                    <div>Կայքեր</div>
                </div>

                <div class="ard-body">
                    <div class="col-md-8">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Անուն</th>
                                <th scope="col">Կայքի հասցե</th>
                                <th scope="col">Hearth bit</th>
                                <th scope="col">Գործակալ</th>
                                <th scope="col">Հասանելիություն</th>
                                <th scope="col">Ստեղծվել է</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sites as $site)
                            <tr>
                                <td>{{$site->name}}</td>
                                <td>{{$site->domain}}</td>
                                <td>{{$site->hearth_bit}}</td>
                                <td>{{$site->agent->name}}</td>
                                <td>Active</td>
                                <td>{{$site->created_at}}</td>
                                <td>
                                    <a href="{{route('site_update_form', ['id' => $site->id])}}" class="nav_link"> <i class='bx bx-edit nav_icon'></i> </a>
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
