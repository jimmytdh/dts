@extends('layouts.app')

@section('content')
    <span id="url" data-link="{{ asset('users') }}"></span>
    <span id="token" data-token="{{ csrf_token() }}"></span>
    <div class="alert alert-jim" id="inputText">
        <h2 class="page-header">Users Feedback</h2>
        <div class="clearfix"></div>
        <div class="page-divider"></div>
        @if(isset($feedbacks) and count($feedbacks) > 0)
            <div class="table-responsive">
                <table class="table table-list table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Name </th>
                        <th>Section / Division</th>
                        <th>Date Created</th>
                        <th>Content</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($feedbacks as $feedback)
                        <?php
                            if($user = \App\Users::where('id',$feedback->userid)->first()){
                                $name = $user->fname ." ". $user->mname." ".$user->lname;
                                if($section = \App\Section::where('id', $user->section)->pluck('description')->first()){
                                    $division = \App\Division::where('id', $user->division)->pluck('description')->first();
                                    $designation = \App\Designation::where('id', $user->designation)->pluck('description')->first();
                                }
                                else {
                                    $section = "No Section";
                                    $division = "No Division";
                                    $designation = "No Designation";
                                }
                            } else {
                                $section = "No Section";
                                $division = "No Division";
                                $designation = "No Designation";
                                $name = "ANONYMOUS";
                            }
                         ?>

                        <tr>
                            <td>
                                <?php $action = \App\FeedbackStatus::where('id',$feedback->stat_id)->first(); ?>
                                @if(isset($action) && $action->action=='Pending')
                                    <a href="{{ url('/users/feedback/completed/'.$feedback->id) }}" class="btn btn-danger btn-sm btn-complete">
                                        <i class="fa fa-check-circle"></i> {{ $action->action }}
                                    </a>
                                @elseif(isset($action) && $action->action=='Completed')
                                    <a href="{{ url('/users/feedback/deleted/'.$feedback->id) }}" class="btn btn-success btn-sm btn-complete">
                                        <i class="fa fa-check-circle"></i> {{ $action->action }}
                                    </a>
                                @else
                                    <a href="{{ url('/users/feedback/deleted/'.$feedback->id) }}" class="btn btn-success btn-sm btn-complete">
                                        <i class="fa fa-check-circle"></i> No Action
                                    </a>
                                @endif
                            </td>
                            <td><strong class="text-bold">{{ $name }}</strong><br>{{ $designation }}</td>
                            <td>
                                {{ $section }}<br>
                                <em>({{ $division }})</em>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($feedback->created_at)->format('M d, Y h:i A') }}
                            </td>
                            <td>{!! $feedback->message !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $feedbacks->links() }}
        @else
            <div class="alert alert-warning">
                <strong><i class="fa fa-exclamation-triangle"></i> Wooh! No feedback.</strong>
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
            $('a[href="#view"]').on('click',function(e){
                $('#document_form').modal('show');
                $('.modal_content').html(loadingState);
                $('.modal-title').html($(this).html());
                var data = {
                    "id" : $(this).data('id')
                };
                var url = $(this).data('link');
                setTimeout(function() {
                    $.ajax({
                        url: url,
                        data : data,
                        type: 'GET',
                        success: function(data) {
                            $('.modal_content').html(data);
                        }
                    });
                },1000);
            });
        })($);

    </script>
@endsection



