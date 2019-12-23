<?php
    use App\Tracking;
    use App\Tracking_Details;
    use App\User as User;
    use App\Http\Controllers\DocumentController as Doc;
    use App\Section;
    $route_no = Session::get('route_no');
    $document = Tracking::where('route_no',$route_no)->first();
    $tracking = Tracking_Details::where('route_no',$route_no)
        ->orderBy('id','asc')
        ->get();
?>
<html>
<title>Track Details</title>
<style>
    .upper, .info, .table {
        width: 100%;
    }
    .upper td, .info td, .table td {
        border:1px solid #000;
    }
    .upper td {
        padding:10px;
    }
    .info {
        margin-top: 90px;
    }
    .info td {
        padding: 5px;
        vertical-align: top;
    }
    .table th {
        border:1px solid #000;
    }
    .table td {
        padding: 5px;
        vertical-align: top;
    }
    .barcode {
        top: 130px;
        position: relative;
        left: -50%;
    }
    .route_no {
        font-size:1.2em;
        margin-left:70px;
    }

</style>
<body>
<div style="position: absolute; left: 53%;">
    <div class="barcode">
        <?php echo DNS1D::getBarcodeHTML(Session::get('route_no'),"C39E",1,43) ?>
        <font class="route_no"><?php echo e($route_no); ?></font>
    </div>
</div>
<table class="upper" cellpadding="0" cellspacing="0">
    <tr>
        <?php $image_path = '/img/doh.png'; ?>
        <td width="20%"><center><img src="<?php echo e(public_path() . $image_path); ?>" width="100"></center></td>
        <td width="60%" style="font-size: 11pt;">
            <center>
                <strong>Republic of the Philippines</strong><br>
                DEPARTMENT OF HEALTH<br>
                <strong>CENTRAL VISAYAS CENTER for HEALTH DEVELOPMENT</strong><br>
                DOCUMENT TRACKING SYSTEM (DTS)
            </center>
        </td>
        <!--
            {{--<td width="20%"><?php echo DNS2D::getBarcodeHTML(Session::get('route_no'), "QRCODE",5,5); ?></td>--}}
        -->
        <?php $image_path = '/img/f1.jpg'; ?>
        <td width="20%"><center><img src="<?php echo e(public_path() . $image_path); ?>" width="100"></center></td>
    </tr>

</table>

<table class="info" width="100%" cellspacing="0">
    <tr>
        <td width="30%">
            <strong>PREPARED BY:</strong><br>
            <?php $user = User::find($document->prepared_by); ?>
            <?php echo e($user->fname.' '.$user->lname); ?>

            <br><br>
        </td>
        <td>
            <strong>SECTION:</strong><br>
            <?php echo e(Section::find($user->section)->description); ?>

            <br><br>
        </td>
        <td width="30%">
            <strong>PREPARED DATE:</strong><br>
            <?php echo e(date('M d, Y',strtotime($document->prepared_date))); ?>

            <br><br>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <strong>DOCUMENT TYPE:</strong>
            <?php echo e(Doc::getDocType($route_no)); ?>

            <br>
            <br>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <strong>REMARKS / SUBJECT:</strong>
            <?php echo nl2br($document->description); ?>

            <br>
            <br>
        </td>
    </tr>
</table>

<table cellspacing="0" class="table">
    <tr>
        <th width="15%">DATE</th>
        <th width="35%">RECEIVED BY</th>
        <th width="35%">ACTION / REMARKS</th>
        <th width="15%">SIGNATURE</th>
    </tr>
    <?php foreach($tracking as $doc): ?>
        <?php
            $received_by = '';
            $section = '';
        if($doc->received_by==0){
            $string = $doc->code;
            $temp   = explode(';',$string);
            $section_id = isset($temp[1]) ? $temp[1] : 0;
            $action = isset($temp[0]) ? $temp[0]: 0;

            if($received_temp = Section::find($section_id)){
                $received_by = $received_temp->description;
            } else {
                $received_by = 0;
            }

            $user = User::find($doc->delivered_by);
            $tmp = $user->fname.' '.$user->lname;
            

            if($action=='temp')
            {
                $section = 'Unconfirmed';
            }else if($action==='return'){
                $section = 'Returned';
            }
        }else{
            if($user = User::find($doc->received_by)){
                $received_by = $user->fname.' '.$user->lname;
                if($section = Section::find($user->section)){
                    $sectionName = $section->description;
                } else {
                    $sectionName = "No Section";
                }
            } else {
                $received_by = "No Name";
            }

            
        }
        ?>
        <?php if(($doc->received_by != $doc->delivered_by)): ?>
        <tr>
            <td><?php echo e(date('M d, Y', strtotime($doc->date_in))); ?><br><?php echo e(date('h:i A', strtotime($doc->date_in))); ?></td>
            <td>
                <?php echo e($received_by); ?>

                <br>
                <em>(<?php echo e($sectionName); ?>)</em>
            </td>
            <td><?php echo e($doc->action); ?></td>
            <td></td>
        </tr>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php $i = count($tracking); ?>
    <?php for($i; $i < 10; $i++): ?>
    <tr>
        <td>&nbsp;<br><br></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <?php endfor; ?>
</table>
</body>
</html>