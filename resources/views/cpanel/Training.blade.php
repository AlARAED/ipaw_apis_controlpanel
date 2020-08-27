@extends('cpanel.layout.index')
@section('content')

  @include('sweetalert::alert')



<div class="page-content">
                   
                    <div class="page-bar">
                        
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle"  style="background: #17C4BB;" data-toggle="modal" data-target="#centralModal"> 
                                  <i class="fa fa-plus"></i>&nbsp;
                             اضافة  جديد
                                </button>
                                
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
                                        <span class="caption-subject bold uppercase"  >   التدريبات</span>
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

                                          
                                             @foreach($Training as $Trainin)

                                            <tr class="odd gradeX">
                                               <td>{{ $loop->iteration }}</td>
                                                <td> {{ $Trainin->name_ar}} </td>
                                                    <td> {{ $Trainin->name_en}} </td>

                                                

                                                <td>
                                                 <img src="{{ asset('uploads/' .$Trainin->image) }}" style="height: 155px;">
                                                </td>

                                               
                                                <td>
                                                    <div class="btn-group">

                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSm{{ $Trainin->id }}">
ازالة                                                             </button> 

 


   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSmedite{{ $Trainin->id }}">
تعديل                                                             </button> 

                                                         



                                                            <a type="button" class="btn btn-primary"
                                                             href="{{url('admin/steps/'.$Trainin->id)}}">
خطوات التدريب
                                                             </a> 

<a type="button" class="btn btn-primary"
                                                             data-toggle="modal" data-target="#centralModal_{{$Trainin->id}}">
اضافة خطوات التدريب    


                                                         </a>

                 <a type="button" class="btn btn-primary"
                                                               href="{{url('admin/vedio/'.$Trainin->id)}}">
فيديوهات التدريب      


                                                         </a>                                        




                                                       
                                                    </div>
                                                </td>
                                            </tr>


<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm{{ $Trainin->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
              {!!  Form::open(['url' => ['admin/removeTrainin',$Trainin->id] ,'method' => 'POST','files' => true]) !!}

        <button type="submit" class="btn btn-primary btn-lg">نعم  </button>
         {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>















<div class="modal fade" id="centralModalSmedite{{ $Trainin->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-sm " role="document">


    <div class="modal-content" >
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel"> تعديل  </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="container">
              {!!  Form::open(['url' => ['admin/editetraining',$Trainin->id] ,'method' => 'POST','files' => true]) !!}
    <div class="row">
      <div class="col-25">
        <label for="fname">اسم التدريب باللغة العربية </label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name_ar" required=""   value=" {{ $Trainin->name_ar}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname"> اسم التدريب باللغة الانجليزية   </label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="name_en" required="" value="{{ $Trainin->name_en}}">
      </div>
    </div>
    <br>
      <div class="row">
      <div class="col-25">


        <input type="file" name="image" >    
                                                                     
      </div>
 </div>
         </div>
      <div class="modal-footer">


<!--         <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">اعلاق</button>
 -->

        <button type="submit" class="btn btn-primary btn-lg">انشاء  </button>
         {!! Form::close() !!}

      </div> 

    </div>
  </div>
</div>      </div>
        





  


<div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-sm " role="document">


    <div class="modal-content" >
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel"> اضافة  </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="container">
              {!!  Form::open(['url' => ['admin/storetrainig'] ,'method' => 'POST','files' => true]) !!}
    <div class="row">
      <div class="col-25">
        <label for="fname">اسم التدريب باللغة العربية </label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name_ar" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname"> اسم التدريب باللغة الانجليزية   </label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="name_en" required="">
      </div>
    </div>
    <br>
      <div class="row">
      <div class="col-25">



        <input type="file" name="image" required="">    
                                                                     
      </div>
 </div>
         </div>
      <div class="modal-footer">


<!--         <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">اعلاق</button>
 -->

        <button type="submit" class="btn btn-primary btn-lg">انشاء  </button>
         {!! Form::close() !!}

      </div> 

    </div>
  </div>
</div>      </div>






<div class="modal fade" id="centralModal_{{$Trainin->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-sm " role="document">


    <div class="modal-content" style="width: 500px;"  >
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel"> اضافة  </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="container">
              {!!  Form::open(['url' => ['admin/storestep',$Trainin->id ] ,'method' => 'POST','files' => true]) !!}
    <div class="row" class="col_lg_4 col-md-4 col-sm-4" style="direction: rtl;">
      
      <div class="col_lg_4 col-md-4 col-sm-4">
  <textarea     name="content_ar"  required=""    >

    المحتوى باللغة العربية
  </textarea>      </div>
    </div>
    




    <div class="row" class="col_lg_4 col-md_4 col-sm-4">
      
      <div class="col_lg_4 col-md-4 col-sm-4">
  <textarea     name="content_en" required=""      style="direction: rtl;">
المحتوى باللغة الانجليزية
    
  </textarea>      </div>
    </div>
    <br>
      <div class="row">
      <div class="col-25">


        <input type="file" name="image"    required=""  >    
                                                                     
      </div>
 </div>
         </div>
      <div class="modal-footer">


<!--         <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">اعلاق</button>
 -->

        <button type="submit" class="btn btn-primary btn-lg">انشاء  </button>
         {!! Form::close() !!}

      </div> 

    </div>
  </div>
</div>      </div>
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