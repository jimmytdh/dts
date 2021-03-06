<form action="<?php echo e(asset('updateDivisionSave')); ?>" method="POST">
    <input type="hidden" value="<?php echo e($id); ?>" name="id">
    <?php echo e(csrf_field()); ?>

    <div class="modal-body">
        <table class="table table-hover table-form table-striped">
            <tr>
                <td class="col-sm-3"><label>Description</label></td>
                <td class="col-sm-1">:</td>
                <td class="col-sm-8">
                    <input type="hidden" id="uniqueDescription" value="<?php echo e($description); ?>">
                    <input type="text" name="description" value="<?php echo e($description); ?>" class="form-control" onkeyup="checkDescriptionUpdate(this);" data-link="<?php echo e(asset('checkDivisionUpdate')); ?>" required>
                    <span class="hidden" style="color:red;">Description already used.</span>
                </td>
            </tr>
            <tr>
                <td class=""><label>Head</label></td>
                <td>:</td>
                <td>
                    <select name="head" id="" class="chosen-select" required>
                        <option value="<?php echo e($headId); ?>"><?php echo e($headName); ?></option>
                        <?php foreach($user as $head): ?>
                            <?php if($headId != $head['id']): ?>
                                <option value="<?php echo e($head['id']); ?>"><?php echo e($head['fname'].' '.$head['mname'].' '.$head['lname']); ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        <button type="submit" class="btn btn-success" id="sectionSubmit"><i class="fa fa-send"></i> Submit</button>
    </div>
</form>
<script>
    $(".chosen-select").chosen();
</script>