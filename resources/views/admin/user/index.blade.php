@extends('admin.layout')

@section('head')
	<title>Users</title>
@endsection
@section('content')

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Index</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
        <li class="active">Index</li>
      </ol>
    </section>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <a href="#">
             <div class="small-box bg-aqua">
            <div class="inner">
              <h3 style="color: white;">{{ count($users) }}</h3>

              <p style="color: white;">All Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
          </a>
         <!-- Trigger the modal with a button -->

          <!-- Modal -->
          
        </div>
        
      </div>
      
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Votes</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @forelse($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              @forelse($user->votes as $vote)
                  {{ $vote->option->option }}
                  <br>
              @empty
                This User have No Votes
              @endforelse
            </td>
            <td>{!! Form::open(['method' => 'POST', 'route' => ['admin.user.delete', $user->id]]) !!}
            
                <div class="btn-group">
                    {!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}
                </div>
            
            {!! Form::close() !!}</td>
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
  <center>{!! $users->render() !!}</center>  
@endsection

@push('scripts')

@endpush