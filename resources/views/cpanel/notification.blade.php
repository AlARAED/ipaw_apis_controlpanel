@extends('cpanel.layout.index')
@section('content')

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
                                        <span class="caption-subject bold uppercase"  >  الاشعارات </span>
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
                                                <th> الاشعار   </th>
                                                 
                                              
                                            </tr>
                                        </thead>
                                        <tbody>

                                          
                                             @foreach($not as $no)

                                            <tr class="odd gradeX">
                                               <td>{{ $loop->iteration }}</td>
                                                <td>  {{$no->data['message']}} </td>
                                                  

                                               
                                                 
                                               
                                                
                                            </tr>


<!-- Central Modal Small -->

        


                                       
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