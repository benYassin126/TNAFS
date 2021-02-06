

@csrf
<div class="card-body">
  <div class="form-group">
    <label class="control-label">اسم الطالب</label>

    <div>
      <input type="text" class="form-control"  placeholder=""  autofocus name="StudentName" @isset($thisStudent) value="{{$thisStudent->StudentName}}" @endisset required >
  </div>
</div>
<!-- select -->
<div class="form-group">
    <label>مجموعة الطالب  [ <a href="{{route('group.create')}}" class="btn btn-link">اضافة  مجموعة</a> ]</label>
   @if ($allGroups == '[]')
    <div class="alert alert-danger fade show" role="alert">
     <p>لايمكنك اضافة اي طالب  حتى تقوم بانشاء مجموعة واحدة على الاقل</p>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
       <a href="{{route('group.create')}}" class="btn btn-info mb-4"><i class="fas fa-plus"></i> اضافة مجموعة </a>
   @endif
    <select class="form-control" required name="StudentGroup">
       @foreach ($allGroups as $group)
       <option value="{{$group->id}}"  @if(isset($thisStudent) && $thisStudent->StudentGroup == $group->id ) selected @endisset>{{$group->GroupName}}</option>
       @endforeach
   </select>
</div>



</div>


