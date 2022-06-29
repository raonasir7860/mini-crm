@extends('home')
@section('content')
<div class="container">
  
        <h1 align="center">Multi Language Website </h1>
        <br>
        <div class="row">
            <div class="col-md-2 col-md-offset-6 text-right">
                <strong>Select Language: </strong>
            </div>
            <div class="col-md-4">
                <select class="form-control changeLang">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>
                    <option value="sp" {{ session()->get('locale') == 'sp' ? 'selected' : '' }}>Spanish</option>
                </select>
            </div>
        </div>
        <br>
        <h1>{{ __('messages.title') }}</h1>
     
    </div>

@endsection