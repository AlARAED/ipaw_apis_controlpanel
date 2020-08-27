@extends('cpanel.layout.index')
@section('content')

<div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    
                    <!-- END THEME PANEL -->
                    
                    
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        
                        
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-blue-sharp">
                                            <span data-counter="counterup" data-value="567"></span>
                                        </h3>
                                        <small>حالة التطبيق</small>
                                    </div>
                                    
                                </div>
                                <div class="progress-info">
                                    
                                    <div class="status">
                                        <div class="status-number"> 100% </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-purple-soft">
                                            <span data-counter="counterup" data-value="276"></span>
                                        </h3>
                                        <small> عدد الاعضاء</small>
                                    </div>
                                    
                                </div>
                                <div class="progress-info">
                                    
                                    <div class="status">
                                        <div class="status-number"> {{$nouser->count()}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    <div class="row">
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <!-- BEGIN REGIONAL STATS PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">جارى  تطويره </span>
                                    </div>
                                    <div class="actions">
                                       
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="region_statistics_loading">
                                        <img src="{{url('admin')}}/assets/global/img/loading.gif" alt="loading" /> </div>
                                    <div id="region_statistics_content" class="display-none">
                                        <div class="btn-toolbar margin-bottom-10">
                                            <div class="btn-group btn-group-circle" data-toggle="buttons">
                                                <a href="" class="btn grey-salsa btn-sm active"> Users </a>
                                                <a href="" class="btn grey-salsa btn-sm"> Orders </a>
                                            </div>
                                            <div class="btn-group pull-right">
                                                <a href="" class="btn btn-circle grey-salsa btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Select Region
                                                    <span class="fa fa-angle-down"> </span>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;" id="regional_stat_world"> World </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" id="regional_stat_usa"> USA </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" id="regional_stat_europe"> Europe </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" id="regional_stat_russia"> Russia </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" id="regional_stat_germany"> Germany </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="vmap_world" class="vmaps display-none"> </div>
                                        <div id="vmap_usa" class="vmaps display-none"> </div>
                                        <div id="vmap_europe" class="vmaps display-none"> </div>
                                        <div id="vmap_russia" class="vmaps display-none"> </div>
                                        <div id="vmap_germany" class="vmaps display-none"> </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END REGIONAL STATS PORTLET-->
                        </div>
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="icon-globe font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">اشعارات</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <!--BEGIN TABS-->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1_1">
                                            <div class="scroller" style="height: 339px;" data-always-visible="1" data-rail-visible="0">
                                                <ul class="feeds">
                               @foreach(auth()->user()->notifications as $not)
                                       


                                                    <li>



                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-success">
                                                                        <i class="fa fa-bell-o"></i>
                                                                        {{$not->data['message']}}
                                                                    </div>
                                                                </div>



                                                             
                                                                                        @endforeach





                                                    
                                                    
                                                    
                                                    
                                                    
                                                  
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!--END TABS-->
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                    </div>
                    
                </div>
                @endsection