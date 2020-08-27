@extends('cpanel.layout.index')
@section('content')

  @include('sweetalert::alert')



<div class="page-content">
                   
                    <div class="page-bar">
                        
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle"  style="background: #17C4BB;" data-toggle="modal" data-target="#centralModal"> 
                                  <i class="fa fa-plus"></i>&nbsp;
                                  منبهات العناية
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
                                        <span class="caption-subject bold uppercase"  >   منبهات العناية</span>
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
                                                  <th>  التصنيف </th>

                                                <th> الصورة  </th>
                                               
                                                 <th></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                          
                                             @foreach($Care as $Car)

                                            <tr class="odd gradeX">
                                               <td>{{ $loop->iteration }}</td>
                                                <td> {{ $Car->name_ar}} </td>
                                                  <td> {{ $Car->name_en}} </td>

                                                  <td> {{ $Car->CatName()->name_ar}} </td>

                                                <td>
                                                 <img src="{{ asset('uploads/' .$Car->image) }}" style="height: 155px;">
                                                </td>

                                               
                                                 
                                               
                                                <td>
                                                    <div class="btn-group">

                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSm{{ $Car->id }}">
ازالة                                                             </button> &#160;




                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalededi{{ $Car->id }}">
تعديل
                                                             </button> &#160;


                                                       
                                                    </div>
                                                </td>
                                            </tr>


<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm{{ $Car->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
              {!!  Form::open(['url' => ['admin/removeca',$Car->id] ,'method' => 'POST','files' => true]) !!}

        <button type="submit" class="btn btn-primary btn-lg">نعم  </button>
         {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>
        


        

<div class="modal fade" id="centralModalededi{{ $Car->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
              {!!  Form::open(['url' => ['admin/edica/'.$Car->id] ,'method' => 'POST','files' => true]) !!}
    <div class="row">
      <div class="col-25">
        {{ $Car->id }}
        <label for="fname">اسم  باللغة العربية </label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name_ar" value="{{ $Car->name_ar}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">الاسم باللغة الانجليزية </label>
      </div>


      <div class="col-75">
        <input type="text" id="lname" name="name_en" value="{{ $Car->name_en}}">
      </div>


              <input type="hidden" id="lname" name="category_id"  value="{{ $Car->category_id}}">

    </div>
    <br>
     <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="{{ asset('uploads/' .$Car->image) }}" alt=""  style="height: 155px;" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span >
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>



                                                                            <input type="file" name="image"> </span>
                                                                     
                                                                    </div>
                                    </div>
                                    </div>
        
      <div class="modal-footer">

        <button type="submit" class="btn btn-primary btn-lg">حفظ  </button>
      

      </div> 
   {!! Form::close() !!} </div>
    </div>
  </div>
</div></div>




<!--EDI-->

              

<!--END-->                           
      @include('sweetalert::alert')                                        
       @endforeach


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
              {!!  Form::open(['url' => ['admin/storeca'] ,'method' => 'POST','files' => true]) !!}
    <div class="row">
      <div class="col-25">
        <label for="fname">اسم  باللغة العربية </label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name_ar" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">الاسم باللغة الانجليزية </label>
      </div>


      <div class="col-75">
        <input type="text" id="lname" name="name_en" required="">
      </div>


              <input type="hidden" id="lname" name="category_id"  value="{{$id}}">

    </div>
    
      <div class="row">
      <div class="col-25">
        <input type="file" name="image" required="">    
                                                                     
      </div>
 </div>
        </div>

        <div class="modal-footer">

        <button type="submit" class="btn btn-primary btn-lg">حفظ  </button>
      

      </div>


       
              {!! Form::close() !!}

 </div>
    </div>
  </div>
</div>         

</div>



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