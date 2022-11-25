<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        إضافة بوت
        <small>إضافة  بوت</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">إضافة</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      @if(session()->has('message') || session()->has('error'))
      <div class="alert {{session()->has('message')? 'alert-success' :'alert-danger'}} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>	<i class="icon fa {{session()->has('message')? 'fa-check' :'fa-ban'}}"></i> تنبيه!</h4>
        @if (session()->has('message'))
            {{session()->get('message')}}
        @else
            {{session()->get('error')}}
        @endif
      </div>
      @endif
      <!---->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">إضافة</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('admin.telegram_bots.store')}}" method="POST">
          @csrf
          <div class="box-body">            
            {{-- <div class="form-group {{$errors->has('category_id')? 'has-error' : ''}}">
              <label>الأصناف المتاحة</label>
              <select name="category_id" class="form-control">
                <option value="0" @if(old('category_id')==0){{'selected'}}@endif>إختر الصنف</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if(old('category_id')==$category->id){{'selected'}}@endif>{{$category->name}}</option>   
                @endforeach
              </select>
              @if($errors->has('category_id'))
              <span class="help-block">
              {{ $errors->first('category_id')}}
              </span>
              @endif
            </div> --}}
            <div class="form-group {{$errors->has('name')? 'has-error':''}}">
              <label for="name">إسم البوت (تخصص البوت)</label>
              <input type="text" name='name' class="form-control" placeholder="إسم البوت (تخصص البوت)" value="@if(old('name')){{old('name')}}@endif">
              @if($errors->has('name'))
              <span class="help-block">
              {{ $errors->first('name')}}
              </span>
              @endif
            </div> 
            <div class="form-group {{$errors->has('token')? 'has-error':''}}">
              <label for="token">توكن (Bot Token)</label>
              <input type="text" name='token' class="form-control" placeholder="توكن (Bot Token)" value="@if(old('token')){{old('token')}}@endif">
              @if($errors->has('token'))
              <span class="help-block">
              {{ $errors->first('token')}}
              </span>
              @endif
            </div>
                   

          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">إضافة</button>
          </div>
        </form>
      </div>
      <!--End page Content -->

    </section><!-- /.content -->
  </div>