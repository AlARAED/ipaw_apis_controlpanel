@extends('cpanel.layout.index')
@section('content')

  @include('sweetalert::alert')



<div class="page-content">
                 
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"  >   الأسئلة والأجوبة</span>
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
                                                <th> السؤال    </th>
                                                  <th>   صاحب السؤال   </th>
                                                 

                                                 <th></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                          
                                             @foreach($Question as $question)

                                            <tr class="odd gradeX">
                                              <a href="">
                                               <td>{{ $loop->iteration }}</td>
                                                <td> {{ $question->question}} </td>
                                                  <td> {{ $question->userName()->name}} </td>


                                                 
                                               
                                                <td>
                                                    <div class="+6btn-group">
<a href="{{url('admin/questionwithanswer/'.$question->id)}}"  type="button" class="btn btn-default">الرد </a>
                                                   


                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSm{{ $question->id }}">
ازالة                                                             </button> 



                                                         

                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                          </a>


<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-sm" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">حذف  </h4>
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
              {!!  Form::open(['url' => ['admin/removequestion',$question->id] ,'method' => 'POST','files' => true]) !!}

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