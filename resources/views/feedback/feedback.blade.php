<form action="{{ asset('/users/feedback') }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-body">
        <table class="table table-hover table-form table-striped">
            <tr>
                <td><label>Prepared by :</label></td>
                <td><input type="text" name="prepared_by" class="form-control" value="{{ $name }}" readonly></td>
            </tr>
            <tr>
                <td><label>Subject :</label></td>
                <td><input type="text" name="subject" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Tel no. :</label></td>
                <td><input type="text" name="telno" class="form-control"></td>
            </tr>
            <tr>
                <td><label>Message :</label></td>
                <td><textarea class="form-control" name="message" rows="10" style="resize:none;"></textarea></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Submit</button>
    </div>
</form>