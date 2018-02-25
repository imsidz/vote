@extends('admin.layout')

@section('head')
	<title>Question</title>
@endsection
@section('content')

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Question
        <small>Index</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Question</a></li>
        <li class="active">Index</li>
      </ol>
    </section>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <a href="#" data-toggle="modal" data-target="#addnewform">
             <div class="small-box bg-aqua">
            <div class="inner">
              <h3 style="color: white;">{{ count($questions) }}</h3>

              <p style="color: white;">Add New Question</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
           
          </div>
          </a>
         <!-- Trigger the modal with a button -->

          <!-- Modal -->
          <div id="addnewform" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">New Question</h4>
                </div>
                <div class="modal-body">
                  {!! Form::open(['method' => 'POST', 'route' => 'admin.question.post', 'files' => false]) !!}
                  
                  	<div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                        {!! Form::label('question', 'Questions') !!}
                        {!! Form::textarea('question', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('question') }}</small>
                    </div>
                </div>
                <div class="modal-footer">
                  <div class="btn-group pull-left">
                          {!! Form::submit("Submit", ['class' => 'btn btn-success']) !!}
                      </div>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Question</th>
            <th width="5%">Options</th>
            <th width="10%">Add Options</th>
            <th width="10%">Edit</th>
            <th width="10%">Delete</th>
          </tr>
        </thead>
        <tbody>
          @forelse($questions as $question)
          <tr>
            <td>
              {{ $question->question }}<br>
              <ul>
                @foreach($question->options as $opt)
                <li>
                  <div class="col-md-10">
                    {{ $opt->option }} 
                  </div>
                  <div class="col-md-2">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.option.delete', $opt->id]]) !!}
                  
                      
                          {!! Form::submit("Delete", ['class' => 'btn btn-danger btn-sm']) !!}
                    
                  
                  {!! Form::close() !!}
                  </div>
                  
                </li>
                <hr>
                @endforeach
              </ul>
            </td>
            <td>{{ count($question->options) }}</td>
            <td><button class="btn btn-info" data-toggle="modal" data-target="#option-{{ $question->id }}">Add Option</button></td>

            <!-- Modal -->
            <div id="option-{{ $question->id }}" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Option</h4>
                  </div>
                  <div class="modal-body">
                    {!! Form::open(['method' => 'POST', 'route' => ['admin.option.post', $question->id]]) !!}
                    
                        <div class="form-group{{ $errors->has('option') ? ' has-error' : '' }}">
                            {!! Form::label('option', 'Option') !!}
                            {!! Form::text('option', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('option') }}</small>
                        </div>
                        
                  </div>
                  <div class="modal-footer">

                        <div class="btn-group pull-left">
                            {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
                        </div>
                    
                      {!! Form::close() !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                  </div>
                </div>

              </div>
            </div>
            <td>
              <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-{{ $question->id }}">Edit</button>

        <!-- Modal -->
        <div id="edit-{{ $question->id }}" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit {{ $question->question }}</h4>
              </div>
              <div class="modal-body">
               {!! Form::open(['method' => 'PUT', 'route' => ['admin.question.edit', $question->id]]) !!}
              
                  <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                      {!! Form::label('question', 'Question') !!}
                      {!! Form::textarea('question',$question->question, ['class' => 'form-control', 'required' => 'required']) !!}
                      <small class="text-danger">{{ $errors->first('question') }}</small>
                  </div>
              
                  
              </div>
              <div class="modal-footer">
                <div class="btn-group pull-left">
                      {!! Form::submit("Update", ['class' => 'btn btn-success']) !!}
                  </div>
              
              {!! Form::close() !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
              
            </td>
            <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['admin.question.delete', $question->id]]) !!}
                  <div class="btn-group ">
                      {!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}
                  </div>
              
              {!! Form::close() !!}
            </td>
          </tr>
          @empty
          <tr>
            <center><h1>No Question Added Yet</h1></center>
          </tr>
          @endforelse
        </tbody>
      </table>
    </section>
    <!-- /.content -->
   
@endsection

@push('scripts')

@endpush