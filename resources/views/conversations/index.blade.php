<div class="bloc" id="app">
        <h1>Hello</h1>
        <div class="container" >
                <div id="messagerie"  data-base="{{ route('conversations', [], false) }}">
                        {{--<Messagerie :user="{{ Auth::user()->id }}"></Messagerie>--}}
                </div >
        </div>
</div>