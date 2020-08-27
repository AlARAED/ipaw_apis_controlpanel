
 
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  @include('sweetalert::alert')



<div class="page-content">
                   
                    
                    
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
<th>  صورة     </th>

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
@foreach ($Challeng->comments  as $comment) 
<tr>
<td>{{$comment->content}}</td>
<br>

<td>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$comment->id}}">edite</button>

  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModaldelte{{$comment->id}}">dletye</button>


  <a type="button" class="btn btn-info btn-lg"  href="{{url('addlike/'.$comment->id)}}">لايك</a>


  <div class="modal fade" id="myModal{{$comment->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">


<div class="container">
              {!!  Form::open(['url' => ['editecomments/'.$comment->id] ,'method' => 'POST','files' => true]) !!}
    
    <textarea name="content">
      
  {{$comment->content}}
    </textarea>
    
    <br>



    
     <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="{{ asset('uploads/' .$comment->image) }}" alt=""  style="height: 155px;" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span >
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>



                                                                            <input type="file" name="image" value="{{$comment->image}}"> </span>
                                                                     
                                                                    </div>
                          </div>                                        </div>
        
      <div class="modal-footer">

        <button type="submit" class="btn btn-primary btn-lg">حفظ  </button>
      

     
   {!! Form::close() !!} </div>        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>






 <div class="modal fade" id="myModaldelte{{$comment->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">


<p></p>
        
      <div class="modal-footer">
              {!!  Form::open(['url' => ['deletecomments/'.$comment->id] ,'method' => 'POST','files' => true]) !!}

        <button type="submit" class="btn btn-primary btn-lg">delete  </button>
      

     
   {!! Form::close() !!} </div>        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</td>




@endforeach
              

     {!!  Form::open(['url' => ['storecomments'] ,'method' => 'POST','files' => true]) !!}
  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <input type="hidden" name="challenging_id"   value="{{$Challeng->id}}">
<textarea rows="4" cols="50" name="content" >
Enter text here...</textarea>


<div class="row">
      <div class="col-25">
        <input type="file" name="image" required="">    
                                                                     
      </div>
 </div>


    <input type="submit">

         {!! Form::close() !!}



<!-- Modal -->
  
  
</div>

         

</td>
                </tr>
                   


                                        

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
   

        </td></tr></tbody></table></div></div></div></div></div></body></html>     

<!-- Central Modal Small -->