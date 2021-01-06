<?php
use App\Http\Controllers\DocumentController as Doc;
use App\User;
use App\Http\Controllers\ReleaseController as Rel;
?>

<?php $__env->startSection('content'); ?>
    <style>
        .panel-incoming .panel-heading{
            background: #7ABA7A;
        }
        .panel-incoming {
            border-color: #7ABA7A;
        }

        .panel-unconfirmed .panel-heading{
            background: #028482;
        }
        .panel-unconfirmed {
            border-color: #028482;
        }
        #incomingInput, #outgoingInput, #uncofirmInput {
            background-image: url('<?php echo e(url('/img/searchicon.png')); ?>'); /* Add a search icon to input */
            background-position: 9px 8px ; /* Position the search icon */
            background-repeat: no-repeat; /* Do not repeat the icon image */
            width: 100%; /* Full-width */
            font-size: 16px; /* Increase font-size */
            padding: 12px 20px 12px 40px; /* Add some padding */
            border: 1px solid #ddd; /* Add a grey border */
        }
        .table-jim tr td:first-child {
            width:30%;
            text-align: right;
            font-weight: bold;
            font-size: 0.9em;
        }
        .table-jim {
            width: 100%;
            max-width: 100%;
        }
        .table-jim td {
            padding:3px 5px;
            vertical-align: top;
        }
        .title {
            font-size: 0.9em;
            width:30%;
            text-align: right;
            padding:0px;
        }
        .panel-title .badge {
            background: #fff;
            color: #00a7d0;
        }
    </style>
    <link rel="stylesheet" href="<?php echo asset('/plugin_old/dataTable/css/dataTables.bootstrap.min.css');?>" type="text/css" />
    <div class="col-sm-4 wrapper">
        <div class="panel panel-jim panel-incoming">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Incoming Documents
                    <?php if(count($data['incoming'])): ?>
                    <span class="badge badgeIncoming"><?php echo e(count($data['incoming'])); ?></span>
                    <?php endif; ?>
                </h3>
            </div>
            <div class="panel-body">
                <form method="POST" class="form-inline" action="<?php echo e(asset('document/pending')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="text" class="form-control" style="width: 70%" id="incomingInput" placeholder="Quick Search Route #" name="incomingInput" value="<?php echo e($incomingInput); ?>">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
                    <!-- <input type="text" name="incomingInput" id="incomingInput" class="form-control" onkeyup="incomingFunction()" placeholder="Search for route # or keyword.."> -->
                </form>
            </div>
            <?php if(count($data['incoming'])): ?>
            <ul class="list-group" id="incomingUL">
                <?php foreach($data['incoming'] as $row): ?>
                
                <li class="list-group-item" data-id="<?php echo e($row->id); ?>" data-route="<?php echo e($row->route_no); ?>">
                    <table class="table-jim">
                        <tr>
                            <td>Route No.:</td>
                            <td>
                                <a data-route="<?php echo e($row->route_no); ?>" data-link="<?php echo e(asset('/document/info/'.$row->route_no.'/'.$row->doc_type)); ?>" href="#document_info" data-toggle="modal"><?php echo e($row->route_no); ?></a>
                            </td>
                        </tr>
                        <tr>
                            <?php

                                if( User::find($row->delivered_by) ){
                                    $user = User::find($row->delivered_by);
                                    $name = $user->fname.' '.$user->lname;
                                    if($section = \App\Section::find($user->section)) {
                                        $section = $section->description;
                                    }else{
                                        $section = 'No Section';
                                    }
                                } else {
                                    $name = "No Name".' '.$row->delivered_by;
                                }
                            ?>
                            <td>Delivered By:</td>
                            <td><?php echo e($name); ?> <br /><small>(<?php echo e($section); ?>)</small></td>
                        </tr>
                        <tr>
                            <td>Type:</td>
                            <td><?php echo e(Doc::getDocType($row->route_no)); ?></td>
                        </tr>
                        <tr>
                            <td>Duration:</td>
                            <td><?php echo e(Rel::duration($row->date_in)); ?></td>
                        </tr>
                        <tr>
                            <td>Remarks:</td>
                            <td><?php echo $row->action; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="#track" data-link="<?php echo e(asset('document/track/'.$row->route_no)); ?>" data-route="<?php echo e($row->route_no); ?>" data-toggle="modal" class="btn btn-sm btn-info">Track</a>
                                <a href="#" class="btn btn-sm btn-success btn-accept">Accept</a>
                                <a href="#" class="btn btn-warning btn-sm btn-return" data-id="<?php echo e($row->id); ?>">Return</a>
                                <button type="button" data-link="<?php echo e(asset('document/removeIncoming/'.$row->id)); ?>" data-id="<?php echo e($row->id); ?>" class="btn btn-sm btn-danger btn-remote-incoming">Remove</button>
                            </td>
                        </tr>
                    </table>
                </li>
                
                <?php endforeach; ?>
            </ul>
            <div style="padding: 3%" class="incomingPaginate">
                <?php echo e($data['incoming']->links()); ?>

            </div>
            <?php else: ?>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-warning">
                        <div class="text-center text-bold">
                            <i class="fa fa-check"></i> No incoming documents...
                        </div>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-sm-4 wrapper">
        <div class="panel panel-jim panel-outgoing">
            <div class="panel-heading">
                <h3 class="panel-title">Outgoing Documents
                    <?php if(count($data['outgoing'])): ?>
                        <span class="badge badgeOutgoing"><?php echo e(count($data['outgoing'])); ?></span>
                    <?php endif; ?>
                </h3>
            </div>
            <div class="panel-body">
                <form method="POST" class="form-inline" action="<?php echo e(asset('document/pending')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="text" class="form-control" style="width: 70%" id="outgoingInput" placeholder="Quick Search Route #" name="outgoingInput" value="<?php echo e($outgoingInput); ?>">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
                </form>
                <!-- <input type="text" id="outgoingInput" class="form-control" onkeyup="outgoingFunction()" placeholder="Search for route # or keyword.."> -->
            </div>
            <?php if(count($data['outgoing'])): ?>
            <ul class="list-group" id="outgoingUL">
                <?php foreach($data['outgoing'] as $row): ?>
                <li class="list-group-item" data-id="<?php echo e($row->id); ?>">
                    <table class="table-jim">
                        <tr>
                            <td>Route No.:</td>
                            <td><a data-route="<?php echo e($row->route_no); ?>" data-link="<?php echo e(asset('/document/info/'.$row->route_no.'/'.$row->doc_type)); ?>" href="#document_info" data-toggle="modal"><?php echo e($row->route_no); ?></a></td>
                        </tr>
                        <tr>
                            <?php
                                if( $user = User::find($row->received_by) ){
                                    $receiveName = $user->fname.' '.$user->lname;
                                } else {
                                    $receiveName = "No Name";
                                }
                            ?>
                            <td>Received By:</td>
                            <td><?php echo e($receiveName); ?></td>
                        </tr>
                        <tr>
                            <?php
                            if( $user = User::find($row->delivered_by) ){
                                $deliveredName = $user->fname.' '.$user->lname;
                            } else {
                                $deliveredName = "No Name";
                            }

                            ?>
                            <td>Delivered By:</td>
                            <td>
                                <?php echo e($deliveredName); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>Type:</td>
                            <td><?php echo e(Doc::getDocType($row->route_no)); ?></td>
                        </tr>
                        <tr>
                            <td>Duration:</td>
                            <td><?php echo e(Rel::duration($row->date_in)); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="#track" data-link="<?php echo e(asset('document/track/'.$row->route_no)); ?>" data-route="<?php echo e($row->route_no); ?>" data-toggle="modal" class="btn btn-sm btn-info">Track</a>
                                <button data-toggle="modal" data-target="#releaseTo" data-id="<?php echo e($row->id); ?>" data-route_no="<?php echo e($row->route_no); ?>" onclick="putRoute($(this))" type="button" class="btn btn-success btn-sm">Release</button>
                                <button type="button" data-link="<?php echo e(asset('document/removepending/'.$row->id)); ?>" data-id="<?php echo e($row->id); ?>" class="btn btn-sm btn-warning btn-end">Cycle End</button>
                                <button type="button" data-link="<?php echo e(asset('document/removeOutgoing/'.$row->id)); ?>" data-id="<?php echo e($row->id); ?>" class="btn btn-sm btn-danger btn-remote-outgoing">Remove</button>
                            </td>
                        </tr>
                    </table>
                </li>
                <?php endforeach; ?>
            </ul>
            <div style="padding: 3%" class="outgoingPaginate">
                <?php echo e($data['outgoing']->links()); ?>

            </div>
            <?php else: ?>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-warning">
                        <div class="text-center text-bold">
                            <i class="fa fa-check"></i> No outgoing or returned documents...
                        </div>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-sm-4 wrapper">
        <div class="panel panel-jim panel-unconfirmed">
            <div class="panel-heading">
                <h3 class="panel-title">Released / Returned Documents to
                    <?php if(count($data['unconfirm'])): ?>
                        <span class="badge badgeUnconfirm"><?php echo e(count($data['unconfirm'])); ?></span>
                    <?php endif; ?>
                </h3>
            </div>
            <div class="panel-body">
                <form method="POST" class="form-inline" action="<?php echo e(asset('document/pending')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="text" id="uncofirmInput" class="form-control" style="width: 70%" placeholder="Quick Search Route #" name="unconfirmedInput" value="<?php echo e($unconfirmedInput); ?>">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
                </form>
                <!--<input type="text" id="uncofirmInput" class="form-control" onkeyup="uncofirmFunction()" placeholder="Search for route # or keyword.."> -->
            </div>
            <?php if(count($data['unconfirm'])): ?>
            <ul class="list-group" id="uncofirmUL">
                <?php foreach($data['unconfirm'] as $row): ?>

                <li class="list-group-item" data-id="<?php echo e($row->id); ?>" data-route="<?php echo e($row->route_no); ?>">
                    <table class="table-jim">
                        <tr>
                            <td>Route No.:</td>
                            <td><a data-route="<?php echo e($row->route_no); ?>" data-link="<?php echo e(asset('/document/info/'.$row->route_no.'/'.$row->doc_type)); ?>" href="#document_info" data-toggle="modal"><?php echo e($row->route_no); ?></a></td>
                        </tr>
                        <tr>
                            <?php
                            $user = User::find($row->delivered_by);
                            ?>
                            <td>Delivered By:</td>
                            <td><?php echo e($user->fname); ?> <?php echo e($user->lname); ?></td>
                        </tr>
                        <tr>
                            <?php
                                $temp = explode(';',$row->code);
                                $section = \App\Section::find($temp[1])->description;
                            ?>
                            <td>Delivered To:</td>
                            <td><?php echo e($section); ?></td>
                        </tr>
                        <tr>
                            <td>Type:</td>
                            <td><?php echo e(Doc::getDocType($row->route_no)); ?></td>
                        </tr>
                        <tr>
                            <td>Duration:</td>
                            <td>
                                <?php if(Rel::duration($row->date_in)==null): ?>
                                    Just Now
                                <?php endif; ?>
                                <?php echo e(Rel::duration($row->date_in)); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <a href="#track" data-link="<?php echo e(asset('document/track/'.$row->route_no)); ?>" data-route="<?php echo e($row->route_no); ?>" data-toggle="modal" class="btn btn-sm btn-info">Track</a>
                                <button type="button" class="btn btn-sm btn-default btn-cancel">Cancel</button>
                            </td>
                        </tr>
                    </table>
                </li>
                <?php endforeach; ?>
            </ul>
            <div style="padding: 3%" class="unconfirmPaginate">
                <?php echo e($data['unconfirm']->links()); ?>

            </div>
            <?php else: ?>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-warning">
                        <div class="text-center text-bold">
                            <i class="fa fa-check"></i> No unconfirmed documents...
                        </div>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <?php echo $__env->make('modal.release_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo asset('/plugin_old/dataTable/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo asset('/plugin_old/dataTable/js/dataTables.bootstrap.min.js');?>"></script>
    <?php echo $__env->make('js.release_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script>
        $(".incomingPaginate").children().children().each(function(index){
            var _href = $($(this).children().get(0)).attr('href');
            $($(this).children().get(0)).attr('href',_href+'?type=incoming');
        });
        $(".outgoingPaginate").children().children().each(function(index){
            var _href = $($(this).children().get(0)).attr('href');
            $($(this).children().get(0)).attr('href',_href+'?type=outgoing');
        });
        $(".unconfirmPaginate").children().children().each(function(index){
            var _href = $($(this).children().get(0)).attr('href');
            $($(this).children().get(0)).attr('href',_href+'?type=unconfirm');
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>