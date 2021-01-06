@extends('layouts.app')

@section('content')
    <span id="url" data-link="{{ asset('users') }}"></span>
    <span id="token" data-token="{{ csrf_token() }}"></span>
    <div class="alert alert-jim" id="inputText">
        <h2 class="page-header">System Users</h2>
        <form class="form-inline form-accept" action="{{ asset('/search/user') }}" method="GET">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Quick Search" autofocus>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
                <div class="btn-group">
                    <a class="btn btn-success" data-link="{{ asset('user/new') }}" href="#new">
                        <i class="fa fa-user-plus"></i> Add New
                    </a>
                </div>
                <a class="btn btn-warning" href="{{ url('users/pending') }}">
                    <span class="badge">{{ $temp }}</span> Pending
                </a>
            </div>
        </form>
        <div class="clearfix"></div>
        <div class="page-divider"></div>
        @if(Session::has('used'))
            <div class="alert alert-danger">
                <strong>{{ Session::get('used') }}</strong>
            </div>
        @endif
        @if(session('status')=='deleted')
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i> Account successfully deactivated and it is now in the pending list.
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
                            <td><a href="#user" data-id="{{ $user->id }}" data-link="{{ asset('user/edit') }}" class="title-info">{{ $user->username }}</a></td>
                            <td><a href="#user" data-id="{{ $user->id }}" data-link="{{ asset('user/edit') }}" class="text-bold">{{ $user->fname ." ". $user->mname." ".$user->lname }}</a></td>
                            <td>{{ $designation }}</td>
                            <td>{{ $section }}</td>
                            <td>{{ $division }}</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-xs delete_user" data-link="{{ url('user/remove/'.$user->id) }}"><i class="fa fa-user-times"></i></button>
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
    <script src="{{ asset('resources/plugin/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('resources/plugin/daterangepicker/daterangepicker.js') }}"></script>
@endsection

@section('css')
    <link href="{{ asset('resources/plugin/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
@endsection
@section('js')
    @@parent
    <script>
        (function($){
            $('.form-accept').submit(function(event){
                $(this).submit();
            });
        })($);

        $(document).ready(function(){
            $(".delete_user").on('click',function(){
                var url = $(this).data('link');
                var c = confirm('Are you sure you want deactivate this account?');
                if(c==true)
                    window.location = url;
            });
        });
    </script>
@endsection



