@extends('layout.template')

@section('content')
<div style="padding: 10px;">
    <h1>Accueil</h1>

    <p>Je suis la page Accueil</p>
    <p>Pour continuer, cliquez sur le lien ci-dessous :</p>

    <a href="{{ route('services') }}">👉 Accéder aux services</a>
</div>
@endsection
