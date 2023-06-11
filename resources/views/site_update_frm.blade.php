@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div style="margin: auto">
            <div class="card" style="margin: auto">
                <div class="card-header">Site: {{$site->name}}</div>
                <div class="ard-body">
                    <div class="col-md-5">
                    <form href="{{route('site_update', ['id' => $site->id])}}" method="post">
                        @csrf
                        @method('post')
                        <div class="input-group mb-3" style="display: block">
                            <label for="inputGroupSelect03" class="form-label">Ընտրեք կցված գործակալին</label>

                            <select class="custom-select" id="inputGroupSelect03" name="agent_id" style="width: inherit" required>
                                @foreach($agents as $agent)
                                    @if($agent->id === $site->agent_id)
                                        <option value="{{$agent->id}}" selected>{{$agent->name}}</option>
                                    @else
                                        <option value="{{$agent->id}}">{{$agent->name}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="siteName" class="form-label">Կայքի անվանում</label>
                            <input type="text" class="form-control" id="siteName" aria-describedby="agent Name"
                                   value="{{$site->name}}" name="site_name">
                        </div>
                        <div class="mb-3">
                            <label for="siteDomain" class="form-label">Կայքի հասցե(առանց http/https/www)</label>
                            <input type="text" class="form-control" id="siteDomain" aria-describedby="site domain"
                                   value="{{$site->domain}}" name="site_domain" required>
                        </div>
                        <div class="mb-3">
                            <label for="siteHearthBit" class="form-label">Կայքի hearth bit path (առանց / սիմվոլի)</label>
                            <input type="text" class="form-control" id="siteHearthBit" aria-describedby="site hearth bit path"
                                   value="{{$site->hearth_bit}}" name="site_hearth_bit">
                        </div>
                        <div class="mb-3" style="margin: auto">
                            <label for="siteCheckWord" class="form-label">Կայքի ստուգող բառ</label>
                            <input type="text" class="form-control" id="siteCheckWord" aria-describedby="site check word path"
                                   value="" name="check_word">
                        </div>

                        <button type="submit" class="btn btn-primary">Թարմեցնել</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

    </div>
@endsection
