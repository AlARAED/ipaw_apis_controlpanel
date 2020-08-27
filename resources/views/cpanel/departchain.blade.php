@extends('cpanel.layout.index')
@section('content')

  @include('sweetalert::alert')



<div class="page-content">
                   
                    <div class="page-bar">
                        
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle"  style="background: #17C4BB;" data-toggle="modal" data-target="#centralModal"> 
                                  <i class="fa fa-plus"></i>&nbsp;
                             اضافة تصنيف جديد
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
                                        <span class="caption-subject bold uppercase"  >  تصنيفات</span>
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
                                                <th> الاسم  اعربية  </th>
                                                  <th> ااسم باانجيزية  </th>
                                                <th> الصورة  </th>
                                               
                                                 <th></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                          
                                             @foreach($Category as $Categ)

                                            <tr class="odd gradeX">
                                               <td>{{ $loop->iteration }}</td>
                                                <td> {{ $Categ->name_ar}} </td>
                                                  <td> {{ $Categ->name_en}} </td>

                                                <td>
                                                 <img src="{{ asset('uploads/' .$Categ->image) }}" style="height: 155px;">
                                                </td>

                                               
                                                 
                                               
                                                <td>
                                                    <div class="btn-group">

                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSm{{ $Categ->id }}">
ازالة التصنيف                                                            </button> &#160;




                                                       
                                                    </div>
                                                </td>
                                            </tr>


<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm{{ $Categ->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
        هل أنت متأكد من ازالة التصنيف

      </div>
      <div class="modal-footer">


<!--         <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">اعلاق</button>
 -->
              {!!  Form::open(['url' => ['admin/removedepartchain',$Categ->id] ,'method' => 'POST','files' => true]) !!}

        <button type="submit" class="btn btn-primary btn-lg">نعم  </button>
         {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>
        


                                       
      @include('sweetalert::alert')                                        
       @endforeach



       <div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-sm " role="document">


    <div class="modal-content" >
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel"> اضافة تصنيف </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="container">
              {!!  Form::open(['url' => ['admin/storedepartchain'] ,'method' => 'POST','files' => true]) !!}
    <div class="row">
      <div class="col-25">
        <label for="fname">اسم التصنيف باللغة العربية </label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name_ar" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname"> اسم اتصنيف باللغة الانجيزية</label>
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