@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($questions as $question)
                <div class="col-md-12" style="padding-top: 20px;">
                    <div class="card">
                        <div class="card-header">{{ $question->question }}</div>

                        <div class="card-body">
                            <ol>
                                @forelse($question->options as $opt)
                                    <li style="padding-top: 15px;">
                                        <div class="row">
                                            <div class="col-md-10">
                                                {{ $opt->option }} {{ count($opt->votes) }}
                                            </div>
                                            <div class="col-md-2">
                                                {!! Form::open(['method' => 'POST', 'route' => ['vote.post', $opt->id]]) !!}
                                                    {!! Form::hidden('question_id', $question->id) !!}
                                                    <div class="btn-group pull-right">
                                                        {!! Form::submit("Vote", ['class' => 'btn btn-info btn-sm']) !!}
                                                    </div>
                                                
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </li>
                                    <hr>
                                @empty
                                    <center><h3>No Option Here</h3></center>
                                @endforelse
                            </ol>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection