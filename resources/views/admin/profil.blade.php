@extends('admin.layouts.sub-admin-layout')

@section('title-page')
Profile
@endsection
@section('content')
<h1> Profil Admin de {{Auth::user()->name}}</h1>
<table class="table">
    <tr>
        <td>Nom : {{Auth::user()->name}}</td>
        <td></td>
    </tr>
    <tr>
        <td>Email : {{Auth::user()->email}}</td>
        <td><a href="/admin/profile/{{Auth::user()->id}}/edit">Changer mon adresse email</a></td>
    </tr>
    <tr>
        <td> Mot de passe : ******* </td>
        <td><a href="/admin/password/reset/{{Auth::user()->id}}">Changer mon mot de passe</a></td>
    </tr>
</table>

@endsection