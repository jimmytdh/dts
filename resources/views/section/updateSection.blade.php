<form action="{{ asset('updateSectionSave') }}" method="POST">
    <input type="hidden" value="{{ $id }}" name="id">
    {{ csrf_field() }}
    <div class="modal-body">
        <table class="table table-hover table-form table-striped">
            <tr>
                <td class="col-sm-3"><label>Code</label></td>
                <td class="col-sm-1">:</td>
                <td class="col-sm-8">
                    <input type="text" name="code" value="{{ $code }}" id="code" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td class=""><label>Division</label></td>
                <td>:</td>
                <td>
                    <select name="division" class="form-control" required>
                        <option value="{{ $divisionId }}">{{ $divisionName }}</option>
                        @foreach($divisionAll as $div)
                            @if($divisionId != $div['id'])
                            <option value="{{ $div['id'] }}">{{ $div['description'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td class="col-sm-3"><label>Description</label></td>
                <td class="col-sm-1">:</td>
                <td class="col-sm-8">
                    <input type="hidden" id="uniqueDescription" value="{{ $description }}">
                    <input type="text" name="description" value="{{ $description }}" class="form-control" onkeyup="checkDescriptionUpdate(this);" data-link="{{ asset('checkDivisionUpdate') }}" required>
                    <span class="hidden" style="color:red;">Description already used.</span>
                </td>
            </tr>
            <tr>
                <td class=""><label>Head</label></td>
                <td>:</td>
                <td>
                    <select name="head" id="sectionHead" class="form-control chosen-select" required>
                        <option value="{{ $headId }}">{{ $headName }}</option>
                        @foreach($user as $head)
                            @if($headId != $head['id'])
                                <option value="{{ $head['id'] }}">{{ $head['fname'].' '.$head['mname'].' '.$head['lname'] }}</option>
                            @endif
                        @endforeach
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
    $('.chosen-select').chosen();
</script>