

@csrf
<div class="card-body">
  <div class="form-group">
    <label class="control-label">اسم المجموعة</label>

    <div>
      <input type="text" class="form-control"  placeholder="اسم  المجموعة"  autofocus name="GroupName" @isset($thisGroup) value="{{$thisGroup->GroupName}}" @endisset required >
  </div>
</div>



</div>


