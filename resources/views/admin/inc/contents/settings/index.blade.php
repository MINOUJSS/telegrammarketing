<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        إعدادات
        <small>إعدادات</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">إعدادات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول الإعدادت</h3>
          <div class="box-tools">
            <div class="input-group" style="width: 150px;">
              <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
              <th>الرقم</th>
              <th>التعيين</th>
              <th>القيمة</th>
              <th>العمليات</th>
            </tr> 
            @if ($settings->count()>=1)
            @foreach ($settings as $index=>$setting)
            <tr>
              <td>{{$index+1}}</td>
              <td>{{$setting->name}}</td>
              <td>
                @if($setting->name=='تفعيل ماسح الموقع')
                <!-- Rounded switch -->                                                  
                <label class="switch">
                  <input id="scraper-{{$setting->id}}" type="checkbox" name="check-{{$setting->id}}" onchange="setting_scraper({{$setting->id}})" @if($setting->value=='on'){{'checked="checked"'}}@endif>
                  <span class="slider round"></span>
                  </label> 
                @elseif($setting->name=='تفعيل المسوق الآلى')
                <label class="switch">
                  <input id="marketing-{{$setting->id}}" type="checkbox" name="check-{{$setting->id}}" onchange="setting_marketing({{$setting->id}})" @if($setting->value=='on'){{'checked="checked"'}}@endif>
                  <span class="slider round"></span>
                  </label>
                @else
                {{$setting->value}}
                @endif
              </td>
              <td>
                <a class="btn btn-success" href="{{route('admin.setting.edit',$setting->id)}}">تعديل</a>
              </td>
            </tr>
            @endforeach  
            @else 
            <tr>
              <td></td>
              <td></td>
              <td>لا توجد إعدادات</td>
              <td></td>
              <td></td>
            </tr>
            @endif                                   
          </tbody></table>
        </div><!-- /.box-body -->
      </div>
      <!-- End Your Page Content Here -->

    </section><!-- /.content -->
  </div>