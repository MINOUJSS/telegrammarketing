<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
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
          <h3 class="box-title">جدول قنوات التلغرام</h3>
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
              <th>إسم القناة</th>
              <th>Chat id</th>
              <th>لغة القناة</th>
              <th>الصنف</th>
              <th>تاريخ الإنشاء</th>
              <th style="white-space: nowrap;">العمليات</th>
            </tr>
            @foreach ($channels as $index=>$channel)
            <tr>
              <td>{{$index+1}}</td>
              <td>{{$channel->name}}</td>
              <td>{{$channel->chat_id}}</td>
              <td>{{$channel->lang}}</td>
              <td>{{get_category_name_from_id($channel->category_id)}}</td>
              <td>{{$channel->created_at}}</td>
              <td style="display:inline-flex;">
                <a href="{{route('admin.telegram_channels.edit',$channel->id)}}"><button class="btn btn-block btn-success">تعديل</button></a>
              {{-- delete form --}}
              <form id="delete_channel_{{$channel->id}}" action="{{route('admin.telegram_channels.destroy')}}" method="post">
              @csrf
              @method('DELETE')
              <input type="hidden" name="bot_id" value="{{$channel->id}}">
              </form>
              <button class="btn btn-block btn-danger" onclick="event.preventDefault();if(confirm('هل تريد فعلا حدف هذا البوت'))document.getElementById('delete_channel_{{$channel->id}}').submit();" >حذف</button>
              </td>
            </tr>
            @endforeach                      
          </tbody></table>
        </div><!-- /.box-body -->
      </div>
      <!-- end page content -->

    </section><!-- /.content -->
  </div>