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
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
            <form action="{{route('admin.product.marketing.update')}}" method="POST" enctype="application/x-www-form-urlencoded">
              @csrf
                <div class="form-group">
                  <button type="submit" class="btn btn-warning">تصفير عددمرات التسويق</button>                  
                </div>                
              </form>
          </h3>
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
              <th>صورة المنتج</th>
              <th>إسم المنتج</th>
              <th>رابط المنتج</th>
              <th>عدد مرات التسويق</th>
              <th>التسويق</th>
              <th>العمليات</th>
            </tr>            
              @if ($products->count()>=1)
                  @foreach($products as $index => $product)
                  <tr>
                    <td>{{$index+1}}</td>
                    <td><img src="{{$product->image}}" alt="" height="50px" width="50px"></td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->link}}</td>
                    <td>{{$product->posted}}</td>
                    <td>
                      <!-- Rounded switch -->
                                                  
                            <label class="switch">
                            <input id="switch-{{$product->id}}" type="checkbox" name="check" onchange="aproved({{$product->id}})" @if($product->aproved==1){{'checked="checked"'}}@endif>
                            <span class="slider round"></span>
                            </label>                                    
                          {{-- onchange="alert($('#switch-'+{{$product->id}}).val())" --}}
                          
                    </td>
                    <td>
                      <form id="delete-{{$product->id}}" action="{{route('admin.product.delete')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                      </form>
                      <button type="submit" onclick="event.preventDefault();if(confirm('هل تريد حذف هذا المنتج؟'))document.getElementById('delete-{{$product->id}}').submit();" class="btn btn-danger">حذف</button>
                    </td>
                    </tr>
                  @endforeach
              @else
              <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>لا توجد منتجات مسجلة</td>
              <td></td>
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