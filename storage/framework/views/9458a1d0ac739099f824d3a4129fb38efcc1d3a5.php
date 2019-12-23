<?php
use App\Http\Controllers\DocumentController as Doc;
use App\User;
use App\Http\Controllers\ReleaseController as Rel;
?>
<style>
    .transitionBlink {
        animation: blinker 1s linear infinite;
    }

    @keyframes  blinker {
        100% {
            opacity: 0;
        }
    }
</style>
<li class="list-group-item" data-id="<?php echo e($data->id); ?>">
    <table class="table-jim">
        <tr>
            <td>Route No.:</td>
            <td>
                <a data-route="<?php echo e($data->route_no); ?>" data-link="<?php echo e(asset('')); ?>" href="#document_info" data-toggle="modal"><?php echo e($data->route_no); ?></a><span class="label label-danger transitionBlink" style="font-size: 12pt;float: right;">New</span>
            </td>
        </tr>
        <tr>
            <?php
            if( $user = User::find($data->received_by) ){
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
            if( $user = User::find($data->delivered_by) ){
                $deliveredName = $user->fname.' '.$user->lname;
            } else {
                $deliveredName = "No Name";
            }
            ?>
            <td>Delivered By:</td>
            <td><?php echo e($deliveredName); ?></td>
        </tr>
        <tr>
            <td>Type:</td>
            <td><?php echo e(Doc::getDocType($data->route_no)); ?></td>
        </tr>
        <tr>
            <td>Duration:</td>
            <td><?php echo e(Rel::duration($data->date_in)); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <a href="#track" data-link="<?php echo e(asset('document/track/'.$data->route_no)); ?>" data-route="<?php echo e($data->route_no); ?>" data-toggle="modal" class="btn btn-sm btn-info">Track</a>
                <button data-toggle="modal" data-target="#releaseTo" data-id="<?php echo e($data->id); ?>" data-route_no="<?php echo e($data->route_no); ?>" onclick="putRoute($(this))" type="button" class="btn btn-success btn-sm">Release</button>
                <button type="button" data-link="<?php echo e(asset('document/removepending/'.$data->id)); ?>" data-id="<?php echo e($data->id); ?>" class="btn btn-sm btn-warning btn-end">Cycle End</button>
                <button type="button" data-link="<?php echo e(asset('document/removeOutgoing/'.$data->id)); ?>" data-id="<?php echo e($data->id); ?>" class="btn btn-sm btn-danger btn-remote-outgoing">Remove</button>
            </td>
        </tr>
    </table>
</li>
<script>
    //tracking history of the document
    $("a[href='#track']").on('click',function(){
        $('.track_history').html(loadingState);
        var route_no = $(this).data('route');
        var url = $(this).data('link');
        $('#track_route_no').val('Loading...');
        setTimeout(function(){
            $('#track_route_no').val(route_no);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    console.log(url);
                    $('.track_history').html(data);
                }
            });
        },1000);

    });
</script>