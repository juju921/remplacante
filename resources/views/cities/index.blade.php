@include('layouts.partial.header');

@section('content')
    <h1>hello</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto culpa ducimus laudantium molestiae odio omnis praesentium quam unde? Eos ipsa minima repellendus. Accusantium aliquid aspernatur libero molestiae omnis perspiciatis veniam?</p>
    @foreach($cities as $citie)

        {{ $citie->nom }}
    @endforeach


@endsection
