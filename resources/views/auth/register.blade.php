@include('layouts.partial.header');

@extends('layouts.frontend.app')

@section('content')
    <div class="columns">
        <div class="column is-one-third is-offset-one-third m-t-100">
            <div class="card">
                <div class="card-content">
                    <h1 class="title">Join The Community</h1>

                    <form action="{{route('register')}}" method="POST" role="form">

                        {{csrf_field()}}
                        <div class="field">
                            <label for="nom" class="label">nom</label>
                            <p class="control">
                                <input class="input {{$errors->has('nom') ? 'is-danger' : ''}}" type="text" name="nom" id="nom" value="{{old('nom')}}" required>
                            </p>
                            @if ($errors->has('nom'))
                                <p class="help is-danger">{{$errors->first('nom')}}</p>
                            @endif
                        </div>

                        <div class="field">
                            <label for="prenom" class="label">prenom</label>
                            <p class="control">
                                <input class="input {{$errors->has('prenom') ? 'is-danger' : ''}}" type="text" name="prenom" id="prenom" value="{{old('prenom')}}" required>
                            </p>
                            @if ($errors->has('prenom'))
                                <p class="help is-danger">{{$errors->first('prenom')}}</p>
                            @endif
                        </div>



                        <div class="field">
                            <label for="telephone" class="label">telephone</label>
                            <p class="control">
                                <input class="input {{$errors->has('telephone') ? 'is-danger' : ''}}" type="text" name="telephone" id="telephone" value="{{old('telephone')}}" required>
                            </p>
                            @if ($errors->has('telephone'))
                                <p class="help is-danger">{{$errors->first('telephone')}}</p>
                            @endif
                        </div>


                        <div class="field">
                            <label for="adress" class="label">adresse</label>
                            <p class="control">
                                <input class="input {{$errors->has('adresse') ? 'is-danger' : ''}}" type="text" name="adresse" id="adresse" value="{{old('adresse')}}" required>


                            </p>
                            @if ($errors->has('adresse'))
                                <p class="help is-danger">{{$errors->first('adresse')}}</p>
                            @endif
                        </div>

                        <div class="field">
                            <label for="email" class="label">Email</label>
                            <p class="control">
                                <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" value="{{old('email')}}" required>
                            </p>
                            @if ($errors->has('email'))
                                <p class="help is-danger">{{$errors->first('email')}}</p>
                            @endif
                        </div>


                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label for="password" class="label">Password</label>
                                    <p class="control">
                                        <input class="input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="password" required>
                                    </p>
                                    @if ($errors->has('password'))
                                        <p class="help is-danger">{{$errors->first('password')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="column">
                                <div class="field">
                                    <label for="password_confirmation" class="label">Confirm Password</label>
                                    <p class="control">
                                        <input class="input {{$errors->has('password_confirmation') ? 'is-danger' : ''}}" type="password" name="password_confirmation" id="password_confirmation" required>
                                    </p>
                                    @if ($errors->has('password_confirmation'))
                                        <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <button class="button is-success is-outlined is-fullwidth m-t-30">Register</button>
                    </form>
                </div> <!-- end of .card-content -->
            </div> <!-- end of .card -->
            <h5 class="has-text-centered m-t-20"><a href="{{route('login')}}" class="is-muted">Already have an Account?</a></h5>
        </div>
    </div>



@endsection
