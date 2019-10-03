@extends('layouts.app')


@section('content')

<div class="container">
<h1>Déposser une annonce</h1>
<hr>

<form method="POST" action="{{ route('ad.store') }}">
    @csrf
    <div class="form-group">
      <label for="title">Titre de l'annonce</label>
      <input type="text" class="form-control  {{ $errors->has('title') ? 'is-invalid' : '' }}"   placeholder="Enter votre titre" name="title">
      @if ($errors->has('title'))
      <span class="invalid-feedback">{{ $errors->first('title')}}</span>
    @endif
    </div>
    <div class="form-group">
        <label for="description">Description de l'annonce</label>
        <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description"  cols="30" rows="10"></textarea>
        @if ($errors->has('description'))
        <span class="invalid-feedback">{{ $errors->first('description')}}</span>
        @endif
    </div>
    <div class="form-group">
      <label for="localiosation">Localisation</label>
      <input type="text" class="form-control  {{ $errors->has('localisation') ? 'is-invalid' : '' }}" id="localisation" placeholder="entrez votre localisation içi" name="localisation">
      @if ($errors->has('localisation'))
      <span class="invalid-feedback">{{ $errors->first('localisation')}}</span>
      @endif
    </div>
    <div class="form-group">
        <label for="price">Prix</label>
        <input type="text" class="form-control  {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" placeholder="entrez votre prix içi" name="price">
        @if ($errors->has('price'))
        <span class="invalid-feedback">{{ $errors->first('price')}}</span>
        @endif  
    </div>
    @guest
      <h1>Vos informations</h1>
      <hr>

      <div class="form-group">
        <label for="name">Votre nom</label>
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"  id="name"  name="name">
        @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
        @endif
      </div>

      <div class="form-group">
        <label for="name">Votre email</label>
        <input type="email" class="form-control"  id="email"  name="email">
      </div>

      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control"  id="password"  name="password">
      </div>

      <div class="form-group">
        <label for="password">Conformation du Mot de passe</label>
        <input type="password" class="form-control"  id="password_confirmation"  name="password_confirmation">
      </div>

    @endguest 
    <button type="submit" class="btn btn-primary">Soummetre notre annonce</button>
  </form>
</div>
@endsection