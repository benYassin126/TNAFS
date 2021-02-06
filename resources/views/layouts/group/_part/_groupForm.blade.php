

@csrf
<div class="card-body">
  <div class="form-group">
    <label class="control-label">اسم المجموعة</label>

    <div>
      <input type="text" class="form-control"  placeholder="فريق التحدي مثلا"  autofocus name="GroupName" @isset($thisGroup) value="{{$thisGroup->GroupName}}" @endisset required >
  </div>
</div>



</div>


