@extends('layouts.adminLTE')
@section('title','طباعة')
@section('content')
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Strat MSG -->
        <!-- Strat MSG -->
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="display-success">
            <strong>{{ session()->get('message') }}</strong>
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
        <!-- Strat MSG -->
        @section('content')
        <div class="print text-center pt-4">
            <div class="row">
                <div class="col-sm-6">
                    <h4></h4>
                    <div class="card " style="height: 350px;">
                        <div class="card-footer">
                            <h6 class=" mb-2"><i class="fas fa-eye"></i>  رابط عرض النتائج للطلاب</h6>
                        </div>
                        <div class="card-body">
                            <input type="text" id="PasteLink" value="{{ url('/') }}/{{$StudentLink}}" class="form-control PasteLink">
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
                    </div>
                </div>
                <div class="col-sm-6">
                    <h4></h4>
                    <div class="card" style="height: 350px;" >
                        <div class="card-footer">
                            <h6><i class="fas fa-print"></i>  طباعة النتائج </h6>
                        </div>
                        <div class="card-body">
                            <form action="{{route('print.showPrint')}}" method="post">
                                @csrf
                                <!-- select -->
                                <div class="form-group mb-4">
                                    <label>تحديد المجموعة</label>
                                    <select class="form-control" required name="StudentGroup" style="width: 50%; margin: 0 auto;" >
                                        <option value="0">عرض جميع المجموعات</option>
                                        @foreach ($allGroups as $group)
                                        <option  value="{{$group->id}}"  @if (isset($GroupTitle) && $GroupTitle->GroupName == $group->GroupName) selected @endif >{{$group->GroupName}}</option>
                                        @endforeach
                                    </select>
                                    <label class="mt-4">نوع الطباعة</label>
                                    <select  class="form-control mb-4" required name="printType" style="width: 50%; margin: 0 auto;" >
                                        <option value="printPoints">طباعة النقاط</option>
                                        <option value="printKshof">طباعة  الكشوف</option>
                                    </select>
                                    <button type="submit" class="btn btn-tnafs mt-2"><i class="fas fa-print"></i>  الذهاب للطباعة </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection('content')
