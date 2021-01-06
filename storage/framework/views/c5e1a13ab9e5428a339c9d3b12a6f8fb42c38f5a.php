<?php
use App\Http\Controllers\SectionController as Sec;
use App\Http\Controllers\AdminController as Admin;
?>


<?php $__env->startSection('content'); ?>

    <div class="alert alert-jim" id="inputText">
        <h2 class="page-header">Reported Documents - <?php echo e($year); ?></h2>

        <!-- Nav tabs -->
        <?php
            $monthArray = ['02' => "February",'03' => "March",'04' => "April",'05' => "May",'06' => "June",'07' => "July",'08' => "August",'09' => "September",'10' => "October",'11' => "November",'12' => "December"];
            $thHeadColor = ['text-success','text-info','text-warning','text-danger'];
        ?>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#January" role="tab" aria-controls="home" aria-selected="true">January</a>
            </li>
            <?php foreach($monthArray as $key => $month): ?>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#<?php echo e($month); ?>" role="tab" aria-controls="profile" aria-selected="false"><?php echo e($month); ?></a>
            </li>
            <?php endforeach; ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade active in" id="January" role="tabpanel" aria-labelledby="home-tab">
                <?php /*<div class="clearfix"></div>
                <div class="page-divider"></div>*/ ?>
                <?php $count = 0; ?>
                <?php foreach(\App\Division::get() as $division): ?>
                    <table class="table table-striped table-hover" style="border: 1px solid #d6e9c6">
                        <thead>
                        <tr>
                            <th colspan="2" class="bg-<?php echo e(explode('-',$thHeadColor[$count])[1]); ?> text-bold <?php echo e($thHeadColor[$count]); ?> text-uppercase" style="padding: 15px 10px;"><?php echo e($division->description); ?> - January</th>
                        </tr>
                        <tr>
                            <th class="col-sm-6">Sections</th>
                            <th class="col-sm-6">Count of reported documents</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach(\App\Section::where('division','=',$division->id)->get() as $section): ?>
                        <tr>
                            <td><?php echo e($section->description); ?></td>
                            <td><?php echo isset($reportedDocument[$section->id.'-01']) ? nl2br("<strong style='color:#f06e20;'>".$reportedDocument[$section->id.'-01']."</strong>") : 0; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php $count++; ?>
                <?php endforeach; ?>
            </div>
            <?php foreach($monthArray as $key => $month): ?>
                <div class="tab-pane fade" id="<?php echo e($month); ?>" role="tabpanel" aria-labelledby="profile-tab">
                    <?php $count = 0; ?>
                    <?php foreach(\App\Division::get() as $division): ?>
                    <table class="table table-striped table-hover" style="border: 1px solid #d6e9c6">
                        <thead>
                        <tr>
                            <th colspan="3" class="bg-<?php echo e(explode('-',$thHeadColor[$count])[1]); ?> text-bold <?php echo e($thHeadColor[$count]); ?> text-uppercase" style="padding: 15px 10px;"><?php echo e($division->description.' - '.$month); ?></th>
                        </tr>
                        <tr>
                            <th class="col-sm-6">Sections</th>
                            <th class="col-sm-6">Count of reported documents</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach(\App\Section::where('division','=',$division->id)->get() as $section): ?>
                        <tr>
                            <td ><?php echo e($section->description); ?></td>
                            <td ><?php echo isset($reportedDocument[$section->id.'-'.$key]) ? nl2br("<strong style='color:#f06e20;'>".$reportedDocument[$section->id.'-'.$key]."</strong>") : 0; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php $count++; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('plugin'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>