@extends('layouts.app')

@section('css')

@endsection
@section('content')
    <div class="alert alert-jim" id="inputText">
        <h2 class="page-header">Pending Users</h2>
        <form class="form-inline" action="{{ asset('/users/pending/search') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="keyword" class="form-control" placeholder="Quick Search" value="{{ Session::get('pendingKeyword') }}" autofocus>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
                <a class="btn btn-success" href="{{ url('users') }}">
                    <i class="fa fa-users"></i> View Users
                </a>
            </div>
        </form>
        <div class="clearfix"></div>
        <div class="page-divider"></div>
        @if(session('status')=='activated')
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i> Account successfully <strong>ACTIVATED!</strong>
            </div>
        @endif
        @if(session('status')=='deleted')
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i> Account successfully <strong>DELETED!</strong>
            </div>
        @endif
        @if(count($users) > 0)
            <div class="table-responsive">
                <table class="table table-list table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Name </th>
                        <th>Designation</th>
                        <th>Section</th>
                        <th>Division</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <?php $section = \App\Section::where('id', $user->section)->pluck('description')->first(); ?>
                        <?php $division = \App\Division::where('id', $user->division)->pluck('description')->first(); ?>
                        <?php $designation = \App\Designation::where('id', $user->designation)->pluck('description')->first(); ?>

                        <tr>
                            <td><a href="#" class="title-info">{{ $user->username }}</a></td>
                            <td><a href="#" class="text-bold">{{ $user->fname ." ". $user->mname." ".$user->lname }}</a></td>
                            <td>{{ $designation }}</td>
                            <td>{{ $section }}</td>
                            <td>{{ $division }}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-xs activate_user" data-link="{{ url('users/activate/'.$user->id) }}"><i class="fa fa-user-plus"></i></button>
                                <button type="button" class="btn btn-danger btn-xs delete_user" data-link="{{ url('users/pending/remove/'.$user->id) }}"><i class="fa fa-user-times"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        @else
            <div class="alert alert-warning">
                <strong><i class="fa fa-exclamation-triangle"></i> No users found.</strong>
            </div>
        @endif
    </div>

@endsection
@section('plugin')

@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $(".delete_user").on('click',function(){
                var url = $(this).data('link');
                var c = confirm('Are you sure you want REMOVE this account?');
                if(c==true)
                    window.location = url;
            });

            $(".activate_user").on('click',function(){
                var url = $(this).data('link');
                var c = confirm('ACTIVATE this account?');
                if(c==true)
                    window.location = url;
            });
        });
    </script>
@endsection



