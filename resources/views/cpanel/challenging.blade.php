@extends('cpanel.layout.index')
@section('content')

  @include('sweetalert::alert')



<div class="page-content">
                   
                    <div class="page-bar">
                        
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <a href="{{url('admin/storechalleng')}}" type="button" class="btn btn-fit-height grey-salt "  style="background: #17C4BB;" > 
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
                                        <span class="caption-subject bold uppercase"  >    التحديات</span>
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
                                                <th> الاسم باللغة العربية   </th>
                                                  <th> الاسم باللغة الانجليزية   </th>
                                                  <th>  تاريخ انتهاء </th>
                                                  <th>  حالة النشر   </th>
                                                  <th>  صورة     </th>

                                                <th> حالة التحدى   </th>

                                                 <th></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                          
                                             @foreach($Challenging as $Challeng)

                                            <tr class="odd gradeX">
                                               <td>{{ $loop->iteration }}</td>
                                                <td> {{ $Challeng->name_ar}} </td>
                                                  <td> {{ $Challeng->name_en}} </td>

                                                  <td> {{ $Challeng->enddate}} </td>

                                                  <td> @if($Challeng->publish==0)
                                                  غير منشور 
                                                   @else
منشور
@endif
                                                 </td>


                                                <td>
                                                 <img src="{{ asset('uploads/' .$Challeng->image) }}" style="height: 155px;">
                                                </td>

                                               <td>@if($Challeng->status==0)
                                                منتهى
                                                    @else
قيد الانتظار
@endif

  </td>
                                                 
                                               
                                                <td>
                                                    <div class="btn-group">

                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSm{{ $Challeng->id }}">
ازالة                                                             </button> 



                                                           
                                                            <a type="button" class="btn btn-primary" href="{{url('admin/edichalleng/'.$Challeng->id)}}">
تعديل
                                                             </a> 



                                                             


                                                       
                                                    </div>
                                                </td>
                                            </tr>


<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm{{ $Challeng->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
              {!!  Form::open(['url' => ['admin/removechallenge',$Challeng->id] ,'method' => 'POST','files' => true]) !!}

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