@extends('admin.layouts.sub-admin-layout')

@section('title-page')
Éditer Profile
@endsection
@section('content')

<h1> Éditer Profil Admin de {{Auth::user()->name}}</h1>
<table class="table">
    <tr>
        <td>Nom : {{Auth::user()->name}}</td>
        <td></td>
    </tr>
    <tr>
        <td>Email : {{Auth::user()->email}}</td>
        <td>
            <form style="display: flex" action="/admin/profile/{{Auth::user()->id}}" method="POST"> @csrf
                @method('PATCH')<input style="width: 250px" class="form-control" type="text" name="email"
                    placeholder="Nouvel email"> <button class="btn btn-primary ml-2" type="submit">Modifier</button>
            </form>
        </td>
    </tr>
    <tr>
        <td> Mot de passe : ******* </td>
        <td><a href="/admin/password/reset/{{Auth::user()->id}}">Changer mon mot de passe</a></td>
    </tr>
</table>

@endsection