<?php $__env->startSection('content'); ?>
    <span id="url" data-link="<?php echo e(asset('users')); ?>"></span>
    <span id="token" data-token="<?php echo e(csrf_token()); ?>"></span>
    <div class="alert alert-jim" id="inputText">
        <h2 class="page-header">Users Feedback</h2>
        <div class="clearfix"></div>
        <div class="page-divider"></div>
        <?php if(isset($feedbacks) and count($feedbacks) > 0): ?>
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
                    <?php foreach($feedbacks as $feedback): ?>
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
                                <?php if(isset($action) && $action->action=='Pending'): ?>
                                    <a href="<?php echo e(url('/users/feedback/completed/'.$feedback->id)); ?>" class="btn btn-danger btn-sm btn-complete">
                                        <i class="fa fa-check-circle"></i> <?php echo e($action->action); ?>

                                    </a>
                                <?php elseif(isset($action) && $action->action=='Completed'): ?>
                                    <a href="<?php echo e(url('/users/feedback/deleted/'.$feedback->id)); ?>" class="btn btn-success btn-sm btn-complete">
                                        <i class="fa fa-check-circle"></i> <?php echo e($action->action); ?>

                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(url('/users/feedback/deleted/'.$feedback->id)); ?>" class="btn btn-success btn-sm btn-complete">
                                        <i class="fa fa-check-circle"></i> No Action
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td><strong class="text-bold"><?php echo e($name); ?></strong><br><?php echo e($designation); ?></td>
                            <td>
                                <?php echo e($section); ?><br>
                                <em>(<?php echo e($division); ?>)</em>
                            </td>
                            <td>
                                <?php echo e(\Carbon\Carbon::parse($feedback->created_at)->format('M d, Y h:i A')); ?>

                            </td>
                            <td><?php echo $feedback->message; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php echo e($feedbacks->links()); ?>

        <?php else: ?>
            <div class="alert alert-warning">
                <strong><i class="fa fa-exclamation-triangle"></i> Wooh! No feedback.</strong>
            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('plugin'); ?>
    <script src="<?php echo e(asset('resources/plugin/daterangepicker/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('resources/plugin/daterangepicker/daterangepicker.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('resources/plugin/daterangepicker/daterangepicker-bs3.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    @parent
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
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>