<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        إضافة عنوان للمسح
        <small>إضافة  عنوان لمسح محتواه</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">إضافة</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <!---->
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
        <form role="form" action="{{route('admin.url_for_scrap.store')}}" method="POST">
          @csrf
          <div class="box-body">
            <div class="form-group {{$errors->has('site_id')? 'has-error' : ''}}">
              <label>المواقع المتاحة</label>
              <select name="site_id" class="form-control">
                <option value="0" @if(old('site_id')==0){{'selected'}}@endif>إختر إسم  الموقع المراد  مسحه</option>
                @foreach ($sites as $site)
                <option value="{{$site->id}}" @if(old('site_id')==$site->id){{'selected'}}@endif>{{$site->name}}</option>   
                @endforeach
              </select>
              @if($errors->has('site_id'))
              <span class="help-block">
              {{ $errors->first('site_id')}}
              </span>
              @endif
            </div>
            <div class="form-group {{$errors->has('category_id')? 'has-error' : ''}}">
              <label>الأصناف المتاحة</label>
              <select name="category_id" class="form-control">
                <option value="0" @if(old('category_id')==0){{'selected'}}@endif>إختر الصنف     </option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if(old('category_id')==$category->id){{'selected'}}@endif>{{$category->name}}</option>   
                @endforeach
              </select>
              @if($errors->has('category_id'))
              <span class="help-block">
              {{ $errors->first('category_id')}}
              </span>
              @endif
            </div>
            <div class="form-group {{$errors->has('url')? 'has-error':''}}">
              <label for="url">العنوان (URL)</label>
              <input type="text" name='url' class="form-control" placeholder="العنوان" value="@if(old('url')){{old('url')}}@endif">
              @if($errors->has('url'))
              <span class="help-block">
              {{ $errors->first('url')}}
              </span>
              @endif
            </div> 
            <div class="form-group {{$errors->has('num_pages')? 'has-error':''}}">
              <label for="num_pages">عدد صفحات العنوان (URL)</label>
              <input type="number" name='num_pages' class="form-control" placeholder="عدد صفحات العنوان " value="@if(old('num_pages')){{old('num_pages')}}@endif">
              @if($errors->has('num_pages'))
              <span class="help-block">
              {{ $errors->first('num_pages')}}
              </span>
              @endif
            </div>       

          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">إضافة</button>
          </div>
        </form>
      </div>
      <!--End pageContent Here-->

    </section><!-- /.content -->
  </div>