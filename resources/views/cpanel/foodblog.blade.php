@extends('cpanel.layout.index')
@section('content')

  @include('sweetalert::alert')



<div class="page-content">
                   
                    <div class="page-bar">
                        
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <a href="{{ url('admin/addfoodblog') }}" type="button" class="btn btn-fit-height grey-salt "  style="background: #17C4BB;" > 
                                  <i class="fa fa-plus"></i>&nbsp;
                                  اضافة  جديد 
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    
                    <!-- END PAGE HEADER-->
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"  >    التغذية</span>
                                    </div>


                                  
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                 <!--    <button id="sample_editable_1_new" class="btn sbold green"> اضاة مستخدم جديد
                                                        <i class="fa fa-plus"></i>
                                                    </button> -->
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column"     id="example" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                 <th> #  </th>
                                                <th> العنوان باللغة العربية      </th>
                                                <th> العنوان باللغة الانجليزية      </th>

                                                  <th>  الصورة </th>
                                                

                                                <th>  </th>

                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                          
                                             @foreach($FoodBlogs as $FoodBlog)

                                            <tr class="odd gradeX">
                                               <td>{{ $loop->iteration }}</td>
                                                <td> {{ $FoodBlog->name_ar}} </td>
                                                    <td> {{ $FoodBlog->name_en}} </td>

                                                

                                                <td>
                                                 <img src="{{ asset('uploads/' .$FoodBlog->image) }}" style="height: 155px;">
                                                </td>

                                               
                                                <td>
                                                    <div class="btn-group">

                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSm{{ $FoodBlog->id }}">
ازالة                                                             </button> 



                                                           
                                                            <a type="button" class="btn btn-primary" href="{{url('admin/edifoodblog/'.$FoodBlog->id)}}">
تعديل
                                                             </a> 



                                                            <a type="button" class="btn btn-primary"
                                                             href="{{url('admin/commentsfood/'.$FoodBlog->id)}}">
التعليقات
                                                             </a> 



                                                       
                                                    </div>
                                                </td>
                                            </tr>


<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm{{ $FoodBlog->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-sm" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">تغيير الحالة </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        هل أنت متأكد من ازالة 

      </div>
      <div class="modal-footer">


<!--         <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">اعلاق</button>
 -->
              {!!  Form::open(['url' => ['admin/removefoodblog',$FoodBlog->id] ,'method' => 'POST','files' => true]) !!}

        <button type="submit" class="btn btn-primary btn-lg">نعم  </button>
         {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>
        





  






<!--EDI-->

              

<!--END-->                           
      @include('sweetalert::alert')                                        
       @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
   

                  @endsection

<!-- Central Modal Small -->