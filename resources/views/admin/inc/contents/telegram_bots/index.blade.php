<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        بوتلت التلغرام(Telegram Bots)
        <small>بوتلت التلغرام(Telegram Bots)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">بوتلت التلغرام(Telegram Bots)</li>
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
          <h3 class="box-title">جدول البوتات</h3>
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
              <th>إسم البوت</th>
              <th>توكن(token)</th>
              <th>الحالة</th>
              <th>الصنف</th>
              <th>تاريخ الإنشاء</th>
              <th style="white-space: nowrap;">العمليات</th>
            </tr>
            @if($bots->count()==0)
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>لا توجد بوتات مسجلة</td>
              <td></td>
              <td></td>
              <td>
                
              </td>
            </tr>
            @else

            @foreach ($bots as $index=>$bot)
            <tr>
              <td>{{$index+1}}</td>
              <td>{{$bot->name}}</td>
              <td>{{$bot->token}}</td>
              <td>{!!get_bot_statu($bot->id)!!}</td>
              {{-- <td>{{get_category_name_from_id($bot->category)}}</td> --}}
              <td>{{$bot->created_at}}</td>
              <td style="display:inline-flex;">
                <a href="{{route('admin.telegram_bots.edit',$bot->id)}}"><button class="btn btn-block btn-success">تعديل</button></a>
              {{-- delete form --}}
              <form id="delete_bot_{{$bot->id}}" action="{{route('admin.telegram_bots.destroy')}}" method="post">
              @csrf
              @method('DELETE')
              <input type="hidden" name="bot_id" value="{{$bot->id}}">
              </form>
              <button class="btn btn-block btn-danger" onclick="event.preventDefault();if(confirm('هل تريد فعلا حدف هذا البوت'))document.getElementById('delete_bot_{{$bot->id}}').submit();" >حذف</button>
              </td>
            </tr>
            @endforeach 
            @endif                     
          </tbody></table>
        </div><!-- /.box-body -->
      </div>
      <!-- End page Content-->

    </section><!-- /.content -->
  </div>