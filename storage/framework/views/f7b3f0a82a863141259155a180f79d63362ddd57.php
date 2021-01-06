<form action="<?php echo e(asset('addDivision')); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

    <div class="modal-body">
        <table class="table table-hover table-form table-striped">
            <tr>
                <td class="col-sm-3"><label>Description</label></td>
                <td class="col-sm-1">:</td>
                <td class="col-sm-8">
                    <input type="text" name="description" class="form-control" onkeyup="checkDescription(this);" data-link="<?php echo e(asset('checkDivision')); ?>" required>
                    <span class="hidden" style="color:red;">Description already used.</span>
                </td>
            </tr>
            <tr>
                <td class=""><label>Head</label></td>
                <td>:</td>
                <td>
                    <div id="headBorder">
                        <select name="head" id="head" class="chosen-select" required>
                            <option value="">Select Head</option>
                            <?php foreach($user as $head): ?>
                                <option value="<?php echo e($head['id']); ?>"><?php echo e($head['fname'].' '.$head['mname'].' '.$head['lname']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        <button type="submit" onclick="divisionValidate();" id="sectionSubmit" class="btn btn-success"><i class="fa fa-send"></i> Submit</button>
    </div>
</form>
<script>
    $('.chosen-select').chosen();
</script>

