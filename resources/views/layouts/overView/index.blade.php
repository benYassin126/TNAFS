@extends('layouts.adminLTE')
@section('title','الطلاب')
@section('content')


<!-- Main content -->
<div class="content">
  <div class="container-fluid pt-4">
    <!-- Strat MSG -->
    @if(session()->has('message'))
    <div class="alert alert-success green  fade show " role="alert" id="display-success">
     <strong><i class="fas fa-check "></i> {{ session()->get('message') }}</strong>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  @if ($errors->any())
  <div class="alert-dismissible  alert alert-danger" id="display-success">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <!-- End MSG -->


  <!-- Start Content -->

  <!-- Small boxes (Stat box) -->
  <div class="row pt-4">
    <div class="col-lg-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $countStudent }}</h3>

          <p>الطلاب</p>
        </div>
        <div class="icon">
          <i class="ionicons ion-android-person"></i>
        </div>
        <a href="{{ route('student.index') }}" class="small-box-footer">الذهاب للتحكم بالطلاب <i class="fa fa-arrow-circle-left"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 ">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $countGroup }}</h3>

          <p>المجموعات</p>
        </div>
        <div class="icon">
          <i class="ionicons ion-person-stalker"></i>
        </div>
        <a href="{{ route('group.index') }}" class="small-box-footer"> الذهاب للتحكم بالمجموعات  <i class="fa fa-arrow-circle-left"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->

  <div class="text-center mb-4">

      <h4 class="mt-4 mb-4">رابط عرض النتائج للطلاب</h4>
      <input type="text" id="PasteLink" value="{{ url('/') }}/{{$StudentLink}}" class="form-control PasteLink mb-2">
      <button onclick="PasteLinkFunction()" class="btn btn-tnafs mt-2"><i class="fas fa-copy "></i> نسخ الرابط</button>
       <a href="{{ url('/') }}/{{$StudentLink}}" target="_blank" class="btn btn-tnafs mt-2">الذهاب لصفحة الطلاب   <i class="fas fa-arrow-circle-left"></i></a>

       <p class="mt-4">تمكين الطلاب من مشاهدة النتائج عبر الرابط ؟</p>
              <form  action="{{ url('overView/WatchResult') }}" method="post">
                @csrf
                <input type="radio" name="conrtolShow" value="yes" id="yes" @if(isset($WatchResult) && $WatchResult == 'yes') checked @endif>
                <label class="ml-4" for="yes">نعم</label>
                <input type="radio" name="conrtolShow" value="no" id="no" @if(isset($WatchResult) && $WatchResult == 'no') checked @endif>
                <label for="no">لا</label>
                <button type="submit" class="btn btn-tnafs mr-2">حفظ </button>
              </form>
  </div>
  <!-- Main row -->



  @endsection('content')
