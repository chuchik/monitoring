@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <h4>Add new site</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="ard-body">
                    <form href="{{route('create_site')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="input-group mb-3" style="display: block">
                            <label for="inputGroupSelect03" class="form-label">Select linked agent</label>

                            <select class="custom-select" id="inputGroupSelect03" name="agent_id" style="width: inherit" required>
                                @foreach($agents as $agent)
                                    <option value="{{$agent->id}}">{{$agent->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="siteName" class="form-label">Site name</label>
                            <input type="text" class="form-control" id="siteName" aria-describedby="agent Name"
                                   value="" name="site_name">
                            <div id="siteName" class="form-text">Current site name</div>
                        </div>
                        <div class="mb-3">
                            <label for="siteDomain" class="form-label">Site domain(without http/https/www)</label>
                            <input type="text" class="form-control" id="siteDomain" aria-describedby="site domain"
                                   value="" name="site_domain" required>
                            <div id="siteDomain" class="form-text">Current site domain</div>
                        </div>
                        <div class="mb-3">
                            <label for="siteHearthBit" class="form-label">Site hearth bit path (without symbol /)</label>
                            <input type="text" class="form-control" id="siteHearthBit" aria-describedby="site hearth bit path"
                                   value="" name="site_hearth_bit">
                            <div id="siteHearthBit" class="form-text">Current site hearth bit path</div>
                        </div>
                        <div class="mb-3" style="margin: auto">
                            <label for="siteCheckWord" class="form-label">Site check word</label>
                            <input type="text" class="form-control" id="siteCheckWord" aria-describedby="site check word path"
                                   value="" name="check_word">
                            <div id="siteCheckWord" class="form-text">Current check word</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
