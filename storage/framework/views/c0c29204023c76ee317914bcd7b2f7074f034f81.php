<?php
    use App\Tracking_Details;
?>


<?php $__env->startSection('content'); ?>

<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach($errors->all() as $error): ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="alert alert-jim" id="inputText">
    <style>
        .action .btn{
            width:100%;
            margin-bottom: 5px;
        }
    </style>
    <h2 class="page-header">Documents</h2>
    <form class="form-inline" method="POST" action="<?php echo e(asset('document')); ?>" onsubmit="return searchDocument();" id="searchForm">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Quick Search" name="keyword" value="<?php echo e(Session::get('keyword')); ?>" autofocus>
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>

            <div class="btn-group">
                <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-plus"></i>  Add New
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#general_form" data-backdrop="static" data-toggle="modal" data-type="GENERAL">General Document</a> </li>
                    <li class="dropdown-submenu">
                        <a href="#" data-toggle="dropdown">Disbursement Voucher</a>
                        <ul class="dropdown-menu">
                            <li><a href="#general_form" data-backdrop="static" data-toggle="modal" data-type="SAL">Salary, Honoraria, Stipend, Remittances, CHT Mobilization</a></li>
                            <li><a href="#general_form" data-backdrop="static" data-toggle="modal" data-type="TEV">TEV</a></li>
                            <li><a href="#general_form" data-backdrop="static" data-toggle="modal" data-type="BILLS">Bills, Cash Advance Replenishment, Grants/Fund Transfer</a></li>
                            <li class="hide"><a href="#">Supplier (Payment of Transactions with PO)</a></li>
                            <li class="hide"><a href="#">Infra - Contractor</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#" data-toggle="dropdown">Letter/Mail/Communication</a>
                        <ul class="dropdown-menu">
                            <li><a href="#general_form" data-backdrop="static" data-toggle="modal" data-type="INCOMING">Incoming Mail</a></li>
                            <li class="hide"><a href="#">Outgoing</a></li>
                            <li class="divider"></li>
                            <li class="hide"><a href="#">Service Record</a></li>
                            <li class="hide"><a href="#">SALN</a></li>
                            <li class="hide"><a href="#">Plans (includes Allocation List)</a></li>
                            <li><a href="#general_form" data-backdrop="static" data-toggle="modal" data-type="ROUTE">Routing Slip</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu hide">
                        <a href="#" data-toggle="dropdown">Management System Documents</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Memorandum</a></li>
                            <li><a href="#">ISO Documents</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Appointment</a></li>
                            <li><a href="#">Resolutions</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#" data-toggle="dropdown">Miscellaneous</a>
                        <ul class="dropdown-menu">
                            <li><a href="#general_form" data-backdrop="static" data-toggle="modal" data-type="WORKSHEET">Activity Worksheet</a></li>
                            <li><a href="#general_form" data-backdrop="static" data-toggle="modal" data-type="JUST_LETTER">Justification</a></li>
                            <li class="hide"><a href="#">Certifications</a></li>
                            <li class="hide"><a href="#">Certificate of Appearance</a></li>
                            <li class="hide"><a href="#">Certificate of Employment</a></li>
                            <li class="hide"><a href="#">Certificate of Clearance</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#" data-toggle="dropdown">Personnel Related Documents</a>
                        <ul class="dropdown-menu">
                            <li><a href="#general_form" data-backdrop="static" data-toggle="modal" data-type="OFFICE_ORDER">Office Order</a></li>
                            <li class="hide"><a href="#">DTR</a></li>
                            <li><a href="#general_form" data-backdrop="static" data-toggle="modal" data-type="APP_LEAVE">Application for Leave</a></li>
                            <li class="hide"><a href="#">Certificate of Overtime Credit</a></li>
                            <li class="hide"><a href="#">Compensatory Time Off</a></li>
                        </ul>
                    </li>
                    <li><a href="#general_form" data-backdrop="static" data-toggle="modal" data-type="PO">Purchase Order</a></li>
                    <li><a href="#general_form" data-backdrop="static" data-toggle="modal" data-type="PRC">Purchase Request - Cash Advance Purchase</a></li>
                </ul>
            </div>
        </div>
    </form>
    <div class="clearfix"></div>
    <div class="page-divider"></div>
    <?php if(count($documents)): ?>
    <div class="table-responsive">
        <table class="table table-list table-hover table-striped">
            <thead>
                <tr>
                    <th width="8%"></th>
                    <th width="20%">Route #</th>
                    <th width="15%">Prepared Date</th>
                    <th width="20%">Document Type</th>
                    <th>Remarks / Additional Information</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($documents as $doc): ?>
                <tr>
                    <td class="action">
                        <a href="#track" data-link="<?php echo e(asset('document/track/'.$doc->route_no)); ?>" data-toggle="modal" class="btn btn-sm btn-success col-sm-12"><i class="fa fa-line-chart"></i> Track</a>
                        <br />
                        <?php
                            $routed = \App\Tracking_Details::where('route_no',$doc->route_no)
                                ->count();
                        ?>
                        <?php if($routed < 2): ?>
                            <?php
                                $doc_id = Tracking_Details::where('route_no',$doc->route_no)
                                        ->orderBy('id','desc')
                                        ->first()
                                        ->id;
                            ?>
                            <button data-toggle="modal" data-target="#releaseTo" data-id="<?php echo e($doc_id); ?>" data-route_no="<?php echo e($doc->route_no); ?>" onclick="putRoute($(this))" type="button" class="btn btn-info btn-sm">Release To</button>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($doc->doc_type == 'PRR_S'): ?>
                            <a class="title-info" data-route="<?php echo e($doc->route_no); ?>" data-backdrop="static" data-link="<?php echo e(asset('prr_supply_info').'/'.$doc->route_no); ?>" href="#prr_supply_modal" data-toggle="modal"><?php echo e($doc->route_no); ?></a>
                        <?php else: ?>
                            <a class="title-info" data-route="<?php echo e($doc->route_no); ?>" data-backdrop="static" data-link="<?php echo e(asset('/document/info/'.$doc->route_no.'/'.$doc->doc_type)); ?>" href="#document_form" data-toggle="modal"><?php echo e($doc->route_no); ?></a>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e(date('M d, Y',strtotime($doc->prepared_date))); ?><br><?php echo e(date('h:i:s A',strtotime($doc->prepared_date))); ?></td>
                    <td><?php echo e(\App\Http\Controllers\DocumentController::docTypeName($doc->doc_type)); ?></td>
                    <td>
                        <?php if($doc->doc_type == 'PRR_S'): ?>
                            <?php echo nl2br($doc->purpose); ?>

                        <?php else: ?>
                            <?php echo nl2br($doc->description); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php echo e($documents->links()); ?>

    <?php else: ?>
        <div class="alert alert-danger">
            <strong><i class="fa fa-times fa-lg"></i> No documents found! </strong>
        </div>
    <?php endif; ?>
</div>

<?php echo $__env->make('modal.release_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('plugin_old'); ?>

<?php echo $__env->make('js.release_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
    <?php if(Session::get('updated')): ?>
        Lobibox.notify('success', {
            msg: 'Successfully Updated!'
        });
        <?php Session::forget('updated'); ?>
    <?php endif; ?>
    <?php if(Session::get('added')): ?>
        Lobibox.notify('success', {
            msg: 'Successfully Added!'
        });
        <?php Session::forget('added'); ?>
    <?php endif; ?>
    <?php if(Session::get('deleted')): ?>
        Lobibox.notify('warning', {
            msg: 'Successfully Deleted!'
        });
        <?php Session::forget('deleted'); ?>
    <?php endif; ?>
    <?php if(Session::get('deletedPR')): ?>
        Lobibox.notify('warning', {
            msg: 'Successfully PR Deleted!'
        });
        <?php Session::forget('deletedPR'); ?>
    <?php endif; ?>
        <?php if(session('status')): ?>
            <?php
                $status = session('status');
            ?>
            <?php if($status=='releaseAdded'): ?>
            Lobibox.notify('success', {
                msg: 'Successfully Released!'
            });
        <?php endif; ?>
    <?php endif; ?>

    $("a[href='#prr_supply_modal']").on('click',function(){
        var route_no = $(this).data('route');
        $('.modal-title').html(route_no);
        $('.modal_content').html(loadingState);
        var url = $(this).data('link');
        setTimeout(function(){
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('.modal_content').html(data);
                    var datePicker = $('body').find('.datepicker');
                    $('input').attr('autocomplete', 'off');
                }
            });
        },1000);
    });

    $('a[href="#general_form"]').on('click',function(){
        var title = $(this).html();
        var type = $(this).data('type');
        <?php echo 'var url ="'.asset('document/create/').'";';?>
        $('#general_form_title').html(title);
        $.ajax({
            url:url+'/'+type,
            type: 'GET',
            success: function(data){
                $('#general_form_content').html(data);
            }
        })
    });
    function searchDocument(){
        $('.loading').show();
        setTimeout(function(){
            return true;
        },2000);
    }
</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>