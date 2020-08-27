@extends('cpanel.layout.index')
@section('content')
  @include('sweetalert::alert') 
  <div class="page-content">
                  
                    <div class="row">
                        <div class="col-md-12">
                           
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">اعدادات الحساب </span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">بيانات الدخول</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">تغيير الصورة </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_3" data-toggle="tab">تغيير كلمة المرور </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
  {!!  Form::open(['url' => ['admin/Changesettingadmin'] ,'method' => 'POST','files' => true]) !!}                                                            <div class="form-group">
                                                                <label class="control-label"> الاسم</label>
                                                                <input type="text" value="{{$admin->name}}" class="form-control"  name="name"/> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">البريد الالكترونى </label>
                                                                <input type="text" value="{{$admin->email}}" class="form-control" name="email"/> </div>

                                                            <div class="margiv-top-10">
                                                                      <button type="submit" class="btn btn-prry btn-lg" style="background: #17C4BB;">حفظ التغييرات  </button>

                                                             
                                                            </div>


                                                          {!! Form::close() !!}
                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    <div class="tab-pane" id="tab_1_2">
                                                       
 {!!  Form::open(['url' => ['admin/Changesettingadminimage'] ,'method' => 'POST','files' => true]) !!}                                                             <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="{{ asset('uploads/' .$admin->image) }}" alt=""  style="height: 155px;" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>



                                                                            <input type="file" name="image"> </span>
                                                                     
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="margin-top-10">
                                                                 <button type="submit" class="btn btn-primary btn-lg"
                                                                 style="background: #17C4BB;">حفظ التغييرات  </button>
                                                                
                                                            </div>
                                                      {!! Form::close() !!}
                                                    </div>
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    <div class="tab-pane" id="tab_1_3">
 {!!  Form::open(['url' => ['admin/Changesettingadminpass'] ,'method' => 'POST','files' => true]) !!}                                                            
                                                            <div class="form-group">
                                                                <label class="control-label"> كلمة السر الجديدة</label>
                                                                <input type="password" class="form-control"  name="password" required="" /> </div>
                                                            
                                                            <div class="margin-top-10">
                                                               <button type="submit" class="btn btn-primary btn-lg" style="background: #17C4BB;">حفظ التغييرات  </button>
                                                            </div>
                                                                          {!! Form::close() !!}

                                                    </div>
                                                    <!-- END CHANGE PASSWORD TAB -->
                                                    <!-- PRIVACY SETTINGS TAB -->
                                                    <div class="tab-pane" id="tab_1_4">
                                                        <form action="#">
                                                            <table class="table table-light table-hover">
                                                                <tr>
                                                                    
                                                                    <td>
                                                                        <div class="mt-radio-inline">
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios1" value="option1" /> Yes
                                                                                <span></span>
                                                                            </label>
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios1" value="option2" checked/> No
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                                    <td>
                                                                        <div class="mt-radio-inline">
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios11" value="option1" /> Yes
                                                                                <span></span>
                                                                            </label>
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios11" value="option2" checked/> No
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                                    <td>
                                                                        <div class="mt-radio-inline">
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios21" value="option1" /> Yes
                                                                                <span></span>
                                                                            </label>
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios21" value="option2" checked/> No
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                                    <td>
                                                                        <div class="mt-radio-inline">
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios31" value="option1" /> Yes
                                                                                <span></span>
                                                                            </label>
                                                                            <label class="mt-radio">
                                                                                <input type="radio" name="optionsRadios31" value="option2" checked/> No
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!--end profile-settings-->
                                                            <div class="margin-top-10">
                                                                <a href="javascript:;" class="btn red"> Save Changes </a>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END PRIVACY SETTINGS TAB -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                </div>
               @endsection