<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        عناوين للمسح
        <small>قائمة عناوين المسح</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">عناوين للمسح</li>
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
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول عناوين المسح</h3>
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
              <th>إسم الموقع الرئيسي</th>
              <th style="white-space: nowrap;">العنوان المراد مسحه</th>
              <th style="white-space: nowrap;">عدد الصفحات المراد مسحها</th>
              <th style="white-space: nowrap;">عدد مرات المسح للعنوان</th>
              <th>الصنف</th>
              <th>التاريخ</th>
              <th>العمليات</th>
            </tr> 
            @if ($urls->count() >=1)
            @foreach ($urls as $index => $url)
            <tr>
              <td>{{$index+1}}</td>
              <td>{{get_site_name_from_id($url->site_id)}}</td>
              <td style="white-space: nowrap;">{{$url->url}}</td>
              <td>{{$url->num_pages}}</td>
              <td>{{$url->num_of_scrap}}</td>
              <td style="white-space: nowrap;">{{get_category_name_from_id($url->category_id)}}</td>
              <td style="white-space: nowrap;">{{$url->created_at}}</td>
              <td style="display:inline-flex;">
              <a href="{{route('admin.url_for_scrap.edit',$url->id)}}" class="btn btn-block btn-success">تعديل</a>
                {{-- delete url --}}
                <form id="delete_url_{{$url->id}}" action="{{route('admin.url_for_scrap.destroy')}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="url_id" value="{{$url->id}}">
                </form>
                <button class="btn btn-block btn-danger" onclick="event.preventDefault();if(confirm('هل تريد حذف هذا العنوان؟'))document.getElementById('delete_url_{{$url->id}}').submit();">حذف</button>
            </td>
            </tr>  
            @endforeach
            @else
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>لا يوجد عناوين مسجلة للمسح</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            @endif                                                   
          </tbody></table>
        </div><!-- /.box-body -->
      </div>
      <!--end page content-->

    </section><!-- /.content -->
  </div>