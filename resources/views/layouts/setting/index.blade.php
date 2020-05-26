@extends('layouts.adminLTE')
@section('title','الاعدادات')

@section('content')

    <!-- Strat MSG -->
@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="display-success">
       <strong>{{ session()->get('message') }}</strong>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('ErorrMsg'))
    <div class="alert alert-danger fade show" role="alert" id="display-success">
       <strong>{{ session()->get('ErorrMsg') }}</strong>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row text-center ">

      <div class="col-sm-4">
        <div class="card w-100 mt-4">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-plus"></i> اضافة نقاط الطلاب الى مجموعاتهم</h5>
            <hr>
            <p class="card-text">يمكنك هذا الاجراء من اضافة نقاط الطلاب الى مجموعاتهم</p>
            <hr>
            <a onclick="return confirm('{{__('هل أنت متأكد من انك تريد اضافة نقاط الطلاب الى مجموعاتهم ؟ ننصح باستخدام هذا الاجراء نهاية فترة الرصد وقبل الاعلان')}}')" href="{{ route('setting.addPointsToGroup') }}" class="btn btn-success ">تنفيذ</a>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="card w-100 mt-4">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-gifts"></i> توزيع نقاط على طلاب مجموعة محددة</h5>
            <hr>
            <p class="card-text">يمكنك هذا الاجراء من اعطاء نقاط معينة لطلاب مجموعة محددة</p>
            <hr>
            <a href="#" class="btn btn-info " data-toggle="modal" data-target="#Gift">تنفيذ</a>
          </div>
        </div>
      </div>


      <div class="col-sm-4">
        <div class="card w-100 mt-4">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-exchange-alt"></i> تحويل النقاط</h5>
            <hr>
            <p class="card-text">يمكنك هذا الاجراء من تحويل نقاط طالب معين الى طالب اخر</p>
            <hr>
            <a href="#" class="btn btn-primary"  data-toggle="modal" data-target="#Transfer">تنفيذ</a>
          </div>
        </div>
      </div>


      <div class="col-sm-4">
        <div class="card w-100 mt-4">
          <div class="card-body">
            <h5 class="card-title"><i class="fab fa-creative-commons-zero"></i>  تصفير جميع النقاط</h5>
            <hr>
            <p class="card-text">يمكنك هذا الاجراء من جعل الجميع نقاطهم صفر</p>
            <hr>
            <form action="{{ route('setting.restPoints') }}" method="post">
                @csrf
                <button  type="submit" name="restStudent" class="btn btn-primary" onclick="confirm('هل أنت متأكد من انك تريد تصفير نقاط جميع الطلاب')">الطلاب </button>
                <button type="submit" name="restGroup" class="btn btn-primary"onclick="confirm('هل انت متاكد من انك تريد تصفير نقاط المجموعات')">المجموعات</button>
            </form>
          </div>
        </div>
      </div>




      <div class="col-sm-4">
        <div class="card w-100 mt-4">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-trash-alt"></i> حذف جميع الطلاب</h5>
            <hr>
            <p class="card-text">يمكنك هذا الاجراء من حذف جميع الطلاب من النظام</p>
            <hr>
            <form action="{{ route('setting.deleteAllStudents') }}" method="post">
                @csrf
                <button  type="submit" name="deleteStudents" class="btn btn-danger" onclick="confirm('هل انت متاكد من انك تريد حذف جميع الطلاب ؟')">الطلاب </button>
                <button type="submit" name="deleteGroups" class="btn btn-danger"onclick="confirm('هل انت متاكد من انك تريد حذف جميع المجموعات ؟')">المجموعات</button>
            </form>

            </div>
          </div>
        </div>





      </div>

      <!-- Modal -->
      <div class="modal fade" id="Gift" tabindex="-1" role="dialog" aria-labelledby="GiftLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="GiftLabel">توزيع نقاط لطلاب مجموعة محددة</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('setting.Twze3') }}" method="post">
                @csrf
                <div class="form-group">
                  <label>اسم المجموعة :</label>
                  <select class="form-control" required name="StudentGroup">
                    <option  value="0">التنفيذ على جميع المجموعات</option>
                    @foreach ($allGroups as $group)
                    <option  value="{{$group->id}}" >{{$group->GroupName}}</option>
                    @endforeach
                  </select>
                  <label class="mt-4">قيمة النقاط الممنوحة او المخصومة لطلاب المجموعة</label>
                  <input type="number" step="0.01"  name="points" placeholder="0" autofocus required> <span class="pl-2">نقطة</span>
                  <input type="text" name="id" value="0" style="display: none;">
                  <button type="submit" name="add" class="btn btn-success">اضافة</button>
                  <button type="submit" name="dis" class="btn btn-danger">خصم</button>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
          </div>
        </div>
      </div>





      <!-- Modal -->
      <div class="modal fade" id="Transfer" tabindex="-1" role="dialog" aria-labelledby="TransferLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="GiftLabel">تحويل النقاط</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('setting.TransPoints') }}" method="post">
                @csrf
                <label  class="mb-4">عدد النقاط :</label>
                <input type="number" step="0.01"  name="points" placeholder="0" autofocus="" required> <span class="pl-2">نقطة</span>
                <div class="form-group">
                  <label><i class="fas fa-minus-circle"></i> من الطالب:</label>
                  <select class="form-control" required name="fromStudent">
                    @foreach ($allStudents as $student)
                    <option  value="{{$student->id}}" >{{$student->StudentName}} ( {{$student->StudentPoints}} نقطة )</option>
                    @endforeach
                  </select>
                  <label class="mt-4"><i class="fas fa-plus-circle"></i> الى الطالب:</label>
                  <select class="form-control" required name="toStudent">
                    @foreach ($allStudents as $student)
                    <option  value="{{$student->id}}" >{{$student->StudentName}} ( {{$student->StudentPoints}} نقطة )</option>
                    @endforeach
                  </select>

                </div>
                <button class="btn btn-success btn-block"><i class="fas fa-sync-alt"></i> تحويل النقاط</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
          </div>
        </div>
      </div>




      @endsection('content')
