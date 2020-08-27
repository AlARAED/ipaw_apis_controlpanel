@extends('cpanel.layout.index')
@section('content')
  @include('sweetalert::alert')
                <div class="page-content">

                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line boxless tabbable-reversed">
                               
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="portlet box blue">
                                            <div class="portlet-title" style="background: #17C4BB;">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>   تعديل   </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                    <a href="javascript:;" class="reload"> </a>
                                                    <a href="javascript:;" class="remove"> </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
 {!!  Form::open(['url' => ['admin/edifactory_myself/'.$factory_myself->id] ,'method' => 'POST','files' => true]) !!}                                                    <div class="form-body">
                                                        














                                                        


                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">المحتوى  باللغة العربية   </label>
                                                            <textarea name="content_ar" rows="19" >
                                                                
                                                                {{$factory_myself->content_ar}}
                                                            </textarea>



                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                     
                                                      <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">المحتوى باللغة الانجليزية</label>
                                                           <textarea name="content_en"  rows="19"  cols="30">
                                                               


                                                               {{$factory_myself->content_en}}

                                                           </textarea>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <!--/span-->
                                                        </div>
                                                        
                                                        
                                                        <!--/row-->
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="{{ asset('uploads/' .$factory_myself->image) }}" alt=""  style="height: 155px;" /> </div>
                                                                   
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>



                                                                            <input type="file" name="image" 
                                                                            value="   {{$factory_myself->image}}" > </span>
                                                                     
                                                                    </div>
                                                                </div>
                                                    </div>
                                                    <div class="form-actions right">
                                                        <button type="submit" class="btn blue">
                                                            <i class="fa fa-check"></i> تغيير</button>
                                                    </div>
  {!! Form::close() !!}                                                <!-- END FORM-->
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            @endsection
