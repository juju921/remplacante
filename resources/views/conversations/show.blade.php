<div class="bloc">
    @include('conversations.users',['users' => $users, 'unread' => $unread]);

    @foreach($users as $user)
        <div class="bloc">
            <div class="card">
                <div class="card-header">{{ $user->nom }}</div>
            </div>
            @foreach($messages as $message)
        <div class="row">
            <div class="col-md-10 {{ $message->from->id !== $user->id ? 'offset-md-2 text-right' : '' }}">
                <p>
                <strong> {{$message->from->nom}}</strong><br>

                    {!! nl2br(e($message->content)) !!}
                </p>
                </div>
        </div>
                <hr>
                @endforeach
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="field">
                    <label for="title" class="label">Titre</label>
                    <p class="control">
                        <input class="input {{$errors->has('title') ? 'is-danger' : ''}}" type="text" name="title" id="title" value="{{old('title')}}" required>
                    </p>
                    @if ($errors->has('title'))
                        <p class="help is-danger">{{$errors->first('title')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <textarea name="content" placeholder="Ecrivez votre message" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"></textarea>
                    @if($errors->has('content'))
                        <div class="invalid-feedback">{{ implode(',', $errors->get('content')) }}</div>
                    @endif
                </div>
                <button class="btn btn-primary" type="submit">Envoyer</button>
            </form>

        </div>
    @endforeach

</div>