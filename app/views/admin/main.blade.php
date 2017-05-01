@extends('layout.master')
@section('includes')
    @parent
    <!-- css -->
    @stop

@section('main')


  <!-- RIBBON -->
  <div id="ribbon">

    <span class="ribbon-button-alignment"> 
      <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
        <i class="fa fa-refresh"></i>
      </span> 
    </span>

    <!-- breadcrumb -->
    <ol class="breadcrumb">
      <li>Home</li><li>Dashboard</li>
    </ol>
    <!-- end breadcrumb -->

    <!-- You can also add more buttons to the
    ribbon for further usability

    Example below:

    <span class="ribbon-button-alignment pull-right">
    <span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
    <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
    <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
    </span> -->

  </div>
  <!-- END RIBBON -->

  <!-- MAIN CONTENT -->
  <div id="content">

    <div class="row">
      <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard <span>> My Dashboard</span></h1>
      </div>
      <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        <ul id="sparks" class="">
          <li class="sparks-info">
            <h5> My Income <span class="txt-color-blue">$47,171</span></h5>
            <div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
              1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
            </div>
          </li>
          <li class="sparks-info">
            <h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up"></i>&nbsp;45%</span></h5>
            <div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
              110,150,300,130,400,240,220,310,220,300, 270, 210
            </div>
          </li>
          <li class="sparks-info">
            <h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
            <div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
              110,150,300,130,400,240,220,310,220,300, 270, 210
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!-- widget grid -->
    <section id="widget-grid" class="">

      <!-- row -->
      <div class="row">
        <article class="col-sm-12">
          <!-- new widget -->
          <div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
            <!-- widget options:
            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

            data-widget-colorbutton="false"
            data-widget-editbutton="false"
            data-widget-togglebutton="false"
            data-widget-deletebutton="false"
            data-widget-fullscreenbutton="false"
            data-widget-custombutton="false"
            data-widget-collapsed="true"
            data-widget-sortable="false"

            -->
            <header>
              <span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
              <h2>Live Feeds </h2>

              <ul class="nav nav-tabs pull-right in" id="myTab">
                <li class="active">
                  <a data-toggle="tab" href="#s1"><i class="fa fa-clock-o"></i> <span class="hidden-mobile hidden-tablet">Live Stats</span></a>
                </li>

                <li>
                  <a data-toggle="tab" href="#s2"><i class="fa fa-facebook"></i> <span class="hidden-mobile hidden-tablet">Social Network</span></a>
                </li>

                <li>
                  <a data-toggle="tab" href="#s3"><i class="fa fa-dollar"></i> <span class="hidden-mobile hidden-tablet">Revenue</span></a>
                </li>
              </ul>

            </header>

            <!-- widget div-->
            <div class="no-padding">
              <!-- widget edit box -->
              <div class="jarviswidget-editbox">

                test
              </div>
              <!-- end widget edit box -->

              <div class="widget-body">
                <!-- content -->
                <div id="myTabContent" class="tab-content">
                  <div class="tab-pane fade active in padding-10 no-padding-bottom" id="s1">
                    <div class="row no-space">
                      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <span class="demo-liveupdate-1"> <span class="onoffswitch-title">Live switch</span> <span class="onoffswitch">
                            <input type="checkbox" name="start_interval" class="onoffswitch-checkbox" id="start_interval">
                            <label class="onoffswitch-label" for="start_interval"> 
                              <span class="onoffswitch-inner" data-swchon-text="ON" data-swchoff-text="OFF"></span> 
                              <span class="onoffswitch-switch"></span> </label> </span> </span>
                        <div id="updating-chart" class="chart-large txt-color-blue"></div>

                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 show-stats">

                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> My Tasks <span class="pull-right">130/200</span> </span>
                            <div class="progress">
                              <div class="progress-bar bg-color-blueDark" style="width: 65%;"></div>
                            </div> </div>
                          <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> Transfered <span class="pull-right">440 GB</span> </span>
                            <div class="progress">
                              <div class="progress-bar bg-color-blue" style="width: 34%;"></div>
                            </div> </div>
                          <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> Bugs Squashed<span class="pull-right">77%</span> </span>
                            <div class="progress">
                              <div class="progress-bar bg-color-blue" style="width: 77%;"></div>
                            </div> </div>
                          <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> User Testing <span class="pull-right">7 Days</span> </span>
                            <div class="progress">
                              <div class="progress-bar bg-color-greenLight" style="width: 84%;"></div>
                            </div> </div>

                          <span class="show-stat-buttons"> <span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> <a href="javascript:void(0);" class="btn btn-default btn-block hidden-xs">Generate PDF</a> </span> <span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> <a href="javascript:void(0);" class="btn btn-default btn-block hidden-xs">Report a bug</a> </span> </span>

                        </div>

                      </div>
                    </div>

                    <div class="show-stat-microcharts">
                      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">

                        <div class="easy-pie-chart txt-color-orangeDark" data-percent="33" data-pie-size="50">
                          <span class="percent percent-sign">35</span>
                        </div>
                        <span class="easy-pie-title"> Server Load <i class="fa fa-caret-up icon-color-bad"></i> </span>
                        <ul class="smaller-stat hidden-sm pull-right">
                          <li>
                            <span class="label bg-color-greenLight"><i class="fa fa-caret-up"></i> 97%</span>
                          </li>
                          <li>
                            <span class="label bg-color-blueLight"><i class="fa fa-caret-down"></i> 44%</span>
                          </li>
                        </ul>
                        <div class="sparkline txt-color-greenLight hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
                          130, 187, 250, 257, 200, 210, 300, 270, 363, 247, 270, 363, 247
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="easy-pie-chart txt-color-greenLight" data-percent="78.9" data-pie-size="50">
                          <span class="percent percent-sign">78.9 </span>
                        </div>
                        <span class="easy-pie-title"> Disk Space <i class="fa fa-caret-down icon-color-good"></i></span>
                        <ul class="smaller-stat hidden-sm pull-right">
                          <li>
                            <span class="label bg-color-blueDark"><i class="fa fa-caret-up"></i> 76%</span>
                          </li>
                          <li>
                            <span class="label bg-color-blue"><i class="fa fa-caret-down"></i> 3%</span>
                          </li>
                        </ul>
                        <div class="sparkline txt-color-blue hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
                          257, 200, 210, 300, 270, 363, 130, 187, 250, 247, 270, 363, 247
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="easy-pie-chart txt-color-blue" data-percent="23" data-pie-size="50">
                          <span class="percent percent-sign">23 </span>
                        </div>
                        <span class="easy-pie-title"> Transfered <i class="fa fa-caret-up icon-color-good"></i></span>
                        <ul class="smaller-stat hidden-sm pull-right">
                          <li>
                            <span class="label bg-color-darken">10GB</span>
                          </li>
                          <li>
                            <span class="label bg-color-blueDark"><i class="fa fa-caret-up"></i> 10%</span>
                          </li>
                        </ul>
                        <div class="sparkline txt-color-darken hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
                          200, 210, 363, 247, 300, 270, 130, 187, 250, 257, 363, 247, 270
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="easy-pie-chart txt-color-darken" data-percent="36" data-pie-size="50">
                          <span class="percent degree-sign">36 <i class="fa fa-caret-up"></i></span>
                        </div>
                        <span class="easy-pie-title"> Temperature <i class="fa fa-caret-down icon-color-good"></i></span>
                        <ul class="smaller-stat hidden-sm pull-right">
                          <li>
                            <span class="label bg-color-red"><i class="fa fa-caret-up"></i> 124</span>
                          </li>
                          <li>
                            <span class="label bg-color-blue"><i class="fa fa-caret-down"></i> 40 F</span>
                          </li>
                        </ul>
                        <div class="sparkline txt-color-red hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
                          2700, 3631, 2471, 2700, 3631, 2471, 1300, 1877, 2500, 2577, 2000, 2100, 3000
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- end s1 tab pane -->

                  <div class="tab-pane fade" id="s2">
                    <div class="widget-body-toolbar bg-color-white">

                      <form class="form-inline" role="form">

                        <div class="form-group">
                          <label class="sr-only" for="s123">Show From</label>
                          <input type="email" class="form-control input-sm" id="s123" placeholder="Show From">
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control input-sm" id="s124" placeholder="To">
                        </div>

                        <div class="btn-group hidden-phone pull-right">
                          <a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
                          <ul class="dropdown-menu pull-right">
                            <li>
                              <a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
                            </li>
                            <li>
                              <a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
                            </li>
                          </ul>
                        </div>

                      </form>

                    </div>
                    <div class="padding-10">
                      <div id="statsChart" class="chart-large has-legend-unique"></div>
                    </div>

                  </div>
                  <!-- end s2 tab pane -->

                  <div class="tab-pane fade" id="s3">

                    <div class="widget-body-toolbar bg-color-white smart-form" id="rev-toggles">

                      <div class="inline-group">

                        <label for="gra-0" class="checkbox">
                          <input type="checkbox" name="gra-0" id="gra-0" checked="checked">
                          <i></i> Target </label>
                        <label for="gra-1" class="checkbox">
                          <input type="checkbox" name="gra-1" id="gra-1" checked="checked">
                          <i></i> Actual </label>
                        <label for="gra-2" class="checkbox">
                          <input type="checkbox" name="gra-2" id="gra-2" checked="checked">
                          <i></i> Signups </label>
                      </div>

                      <div class="btn-group hidden-phone pull-right">
                        <a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
                        <ul class="dropdown-menu pull-right">
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
                          </li>
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
                          </li>
                        </ul>
                      </div>

                    </div>

                    <div class="padding-10">
                      <div id="flotcontainer" class="chart-large has-legend-unique"></div>
                    </div>
                  </div>
                  <!-- end s3 tab pane -->
                </div>

                <!-- end content -->
              </div>

            </div>
            <!-- end widget div -->
          </div>
          <!-- end widget -->

        </article>
      </div>

      <!-- end row -->

      <!-- row -->

      <div class="row">

        <article class="col-sm-12 col-md-12 col-lg-6">

          <!-- new widget -->
          <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" data-widget-fullscreenbutton="false">

            <!-- widget options:
            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

            data-widget-colorbutton="false"
            data-widget-editbutton="false"
            data-widget-togglebutton="false"
            data-widget-deletebutton="false"
            data-widget-fullscreenbutton="false"
            data-widget-custombutton="false"
            data-widget-collapsed="true"
            data-widget-sortable="false"

            -->

            <header>
              <span class="widget-icon"> <i class="fa fa-comments txt-color-white"></i> </span>
              <h2> SmartChat </h2>
              <div class="widget-toolbar">
                <!-- add: non-hidden - to disable auto hide -->

                <div class="btn-group">
                  <button class="btn dropdown-toggle btn-xs btn-success" data-toggle="dropdown">
                    Status <i class="fa fa-caret-down"></i>
                  </button>
                  <ul class="dropdown-menu pull-right js-status-update">
                    <li>
                      <a href="javascript:void(0);"><i class="fa fa-circle txt-color-green"></i> Online</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);"><i class="fa fa-circle txt-color-red"></i> Busy</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);"><i class="fa fa-circle txt-color-orange"></i> Away</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="javascript:void(0);"><i class="fa fa-power-off"></i> Log Off</a>
                    </li>
                  </ul>
                </div>
              </div>
            </header>

            <!-- widget div-->
            <div>
              <!-- widget edit box -->
              <div class="jarviswidget-editbox">
                <div>
                  <label>Title:</label>
                  <input type="text" />
                </div>
              </div>
              <!-- end widget edit box -->

              <div class="widget-body widget-hide-overflow no-padding">
                <!-- content goes here -->

                <!-- CHAT CONTAINER -->
                <div id="chat-container">
                  <span class="chat-list-open-close"><i class="fa fa-user"></i><b>!</b></span>

                  <div class="chat-list-body custom-scroll">
                    <ul id="chat-users">
                      <li>
                        <a href="javascript:void(0);"><img src="img/avatars/5.png" alt="">Robin Berry <span class="badge badge-inverse">23</span><span class="state"><i class="fa fa-circle txt-color-green pull-right"></i></span></a>
                      </li>
                      <li>
                        <a href="javascript:void(0);"><img src="img/avatars/male.png" alt="">Mark Zeukartech <span class="state"><i class="last-online pull-right">2hrs</i></span></a>
                      </li>
                      <li>
                        <a href="javascript:void(0);"><img src="img/avatars/male.png" alt="">Belmain Dolson <span class="state"><i class="last-online pull-right">45m</i></span></a>
                      </li>
                      <li>
                        <a href="javascript:void(0);"><img src="img/avatars/male.png" alt="">Galvitch Drewbery <span class="state"><i class="fa fa-circle txt-color-green pull-right"></i></span></a>
                      </li>
                      <li>
                        <a href="javascript:void(0);"><img src="img/avatars/male.png" alt="">Sadi Orlaf <span class="state"><i class="fa fa-circle txt-color-green pull-right"></i></span></a>
                      </li>
                      <li>
                        <a href="javascript:void(0);"><img src="img/avatars/male.png" alt="">Markus <span class="state"><i class="last-online pull-right">2m</i></span> </a>
                      </li>
                      <li>
                        <a href="javascript:void(0);"><img src="img/avatars/sunny.png" alt="">Sunny <span class="state"><i class="last-online pull-right">2m</i></span> </a>
                      </li>
                      <li>
                        <a href="javascript:void(0);"><img src="img/avatars/male.png" alt="">Denmark <span class="state"><i class="last-online pull-right">2m</i></span> </a>
                      </li>
                    </ul>
                  </div>
                  <div class="chat-list-footer">

                    <div class="control-group">

                      <form class="smart-form">

                        <section>
                          <label class="input">
                            <input type="text" id="filter-chat-list" placeholder="Filter">
                          </label>
                        </section>

                      </form>

                    </div>

                  </div>

                </div>

                <!-- CHAT BODY -->
                <div id="chat-body" class="chat-body custom-scroll">
                  <ul>
                    <li class="message">
                      <img src="img/avatars/5.png" class="online" alt="">
                      <div class="message-text">
                        <time>
                          2014-01-13
                        </time> <a href="javascript:void(0);" class="username">Sadi Orlaf</a> Hey did you meet the new board of director? He's a bit of an geek if you ask me...anyway here is the report you requested. I am off to launch with Lisa and Andrew, you wanna join?
                        <p class="chat-file row">
                          <b class="pull-left col-sm-6"> <!--<i class="fa fa-spinner fa-spin"></i>--> <i class="fa fa-file"></i> report-2013-demographic-report-annual-earnings.xls </b>
                          <span class="col-sm-6 pull-right"> <a href="javascript:void(0);" class="btn btn-xs btn-default">cancel</a> <a href="javascript:void(0);" class="btn btn-xs btn-success">save</a> </span>
                        </p>
                        <p class="chat-file row">
                          <b class="pull-left col-sm-6"> <i class="fa fa-ok txt-color-green"></i> tobacco-report-2012.doc </b>
                          <span class="col-sm-6 pull-right"> <a href="javascript:void(0);" class="btn btn-xs btn-primary">open</a> </span>
                        </p> </div>
                    </li>
                    <li class="message">
                      <img src="img/avatars/sunny.png" class="online" alt="">
                      <div class="message-text">
                        <time>
                          2014-01-13
                        </time> <a href="javascript:void(0);" class="username">John Doe</a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> 
                      </div>
                    </li>
                  </ul>

                </div>

                <!-- CHAT FOOTER -->
                <div class="chat-footer">

                  <!-- CHAT TEXTAREA -->
                  <div class="textarea-div">

                    <div class="typearea">
                      <textarea placeholder="Write a reply..." id="textarea-expand" class="custom-scroll"></textarea>
                    </div>

                  </div>

                  <!-- CHAT REPLY/SEND -->
                  <span class="textarea-controls">
                    <button class="btn btn-sm btn-primary pull-right">
                      Reply
                    </button> <span class="pull-right smart-form" style="margin-top: 3px; margin-right: 10px;"> <label class="checkbox pull-right">
                        <input type="checkbox" name="subscription" id="subscription">
                        <i></i>Press <strong> ENTER </strong> to send </label> </span> <a href="javascript:void(0);" class="pull-left"><i class="fa fa-camera fa-fw fa-lg"></i></a> </span>

                </div>

                <!-- end content -->
              </div>

            </div>
            <!-- end widget div -->
          </div>
          <!-- end widget -->

          <!-- Widget ID (each widget will need unique ID)-->
          <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-editbutton="false">
            <!-- widget options:
            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
    
            data-widget-colorbutton="false"
            data-widget-editbutton="false"
            data-widget-togglebutton="false"
            data-widget-deletebutton="false"
            data-widget-fullscreenbutton="false"
            data-widget-custombutton="false"
            data-widget-collapsed="true"
            data-widget-sortable="false"
    
            -->
            <header>
              <span class="widget-icon"> <i class="fa fa-table"></i> </span>
              <h2>Export to PDF / Excel</h2>
    
            </header>
    
            <!-- widget div-->
            <div>
    
              <!-- widget edit box -->
              <div class="jarviswidget-editbox">
                <!-- This area used as dropdown edit box -->
    
              </div>
              <!-- end widget edit box -->
    
              <!-- widget content -->
              <div class="widget-body no-padding">
    
                <table id="datatable_tabletools" class="table table-striped table-bordered table-hover" width="100%">
                  <thead>
                    <tr>
                      <th data-hide="phone">ID</th>
                      <th data-class="expand">Name</th>
                      <th>Phone</th>
                      <th data-hide="phone">Company</th>
                      <th data-hide="phone,tablet">Zip</th>
                      <th data-hide="phone,tablet">City</th>
                      <th data-hide="phone,tablet">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Jennifer</td>
                      <td>1-342-463-8341</td>
                      <td>Et Rutrum Non Associates</td>
                      <td>35728</td>
                      <td>Fogo</td>
                      <td>03/04/14</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Clark</td>
                      <td>1-516-859-1120</td>
                      <td>Nam Ac Inc.</td>
                      <td>7162</td>
                      <td>Machelen</td>
                      <td>03/23/13</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Brendan</td>
                      <td>1-724-406-2487</td>
                      <td>Enim Commodo Limited</td>
                      <td>98611</td>
                      <td>Norman</td>
                      <td>02/13/14</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Warren</td>
                      <td>1-412-485-9725</td>
                      <td>Odio Etiam Institute</td>
                      <td>10312</td>
                      <td>Sautin</td>
                      <td>01/01/13</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Rajah</td>
                      <td>1-849-642-8777</td>
                      <td>Neque Ltd</td>
                      <td>29131</td>
                      <td>Glovertown</td>
                      <td>02/16/13</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Demetrius</td>
                      <td>1-470-329-9627</td>
                      <td>Euismod In Ltd</td>
                      <td>1883</td>
                      <td>Kapolei</td>
                      <td>03/15/13</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>Keefe</td>
                      <td>1-188-191-2346</td>
                      <td>Molestie Industries</td>
                      <td>2211BM</td>
                      <td>Modena</td>
                      <td>07/08/13</td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>Leila</td>
                      <td>1-663-655-8904</td>
                      <td>Est LLC</td>
                      <td>75286</td>
                      <td>Hondelange</td>
                      <td>12/09/12</td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>Fritz</td>
                      <td>1-598-234-7837</td>
                      <td>Et Ultrices Posuere Institute</td>
                      <td>2324</td>
                      <td>Monte San Pietrangeli</td>
                      <td>12/29/12</td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>Cassady</td>
                      <td>1-212-965-8381</td>
                      <td>Vitae Erat Vel Company</td>
                      <td>5898</td>
                      <td>Huntly</td>
                      <td>10/07/13</td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td>Rogan</td>
                      <td>1-541-654-9030</td>
                      <td>Iaculis Incorporated</td>
                      <td>6464JN</td>
                      <td>Carson City</td>
                      <td>05/30/13</td>
                    </tr>
                    <tr>
                      <td>12</td>
                      <td>Candice</td>
                      <td>1-153-708-6027</td>
                      <td>Pellentesque Company</td>
                      <td>8565</td>
                      <td>Redruth</td>
                      <td>02/25/14</td>
                    </tr>
                    <tr>
                      <td>13</td>
                      <td>Brittany</td>
                      <td>1-987-452-6038</td>
                      <td>Suspendisse Inc.</td>
                      <td>4031</td>
                      <td>Carapicuíba</td>
                      <td>10/13/13</td>
                    </tr>
                    <tr>
                      <td>14</td>
                      <td>Baxter</td>
                      <td>1-281-147-5085</td>
                      <td>Nulla Donec Non Associates</td>
                      <td>53067</td>
                      <td>Yellowknife</td>
                      <td>08/14/14</td>
                    </tr>
                    <tr>
                      <td>15</td>
                      <td>Vaughan</td>
                      <td>1-940-231-1787</td>
                      <td>Metus Facilisis Lorem Incorporated</td>
                      <td>26530-046</td>
                      <td>Guarapuava</td>
                      <td>11/17/12</td>
                    </tr>
                    <tr>
                      <td>16</td>
                      <td>Ivan</td>
                      <td>1-314-209-1223</td>
                      <td>Posuere Vulputate Inc.</td>
                      <td>KX3W 1OI</td>
                      <td>Bienne-lez-Happart</td>
                      <td>03/04/14</td>
                    </tr>
                    <tr>
                      <td>17</td>
                      <td>Marah</td>
                      <td>1-348-582-4041</td>
                      <td>Feugiat Ltd</td>
                      <td>2128</td>
                      <td>Nîmes</td>
                      <td>11/29/12</td>
                    </tr>
                    <tr>
                      <td>18</td>
                      <td>Kiara</td>
                      <td>1-570-428-6681</td>
                      <td>Et Euismod Et Corp.</td>
                      <td>70483</td>
                      <td>Meeuwen</td>
                      <td>03/28/13</td>
                    </tr>
                    <tr>
                      <td>19</td>
                      <td>Brielle</td>
                      <td>1-216-787-0056</td>
                      <td>Quis Massa Mauris Institute</td>
                      <td>19913</td>
                      <td>Mombaruzzo</td>
                      <td>12/17/12</td>
                    </tr>
                    <tr>
                      <td>20</td>
                      <td>Kennedy</td>
                      <td>1-997-154-9340</td>
                      <td>Quis Diam Pellentesque Institute</td>
                      <td>3092FI</td>
                      <td>Edmundston</td>
                      <td>02/26/13</td>
                    </tr>
                    <tr>
                      <td>21</td>
                      <td>Peter</td>
                      <td>1-394-459-3833</td>
                      <td>Mauris Eu Turpis Corporation</td>
                      <td>27337</td>
                      <td>Ravenstein</td>
                      <td>06/05/14</td>
                    </tr>
                    <tr>
                      <td>22</td>
                      <td>Kibo</td>
                      <td>1-162-467-7160</td>
                      <td>Massa LLP</td>
                      <td>30305</td>
                      <td>Witney</td>
                      <td>08/20/14</td>
                    </tr>
                    <tr>
                      <td>23</td>
                      <td>Tanek</td>
                      <td>1-806-556-1897</td>
                      <td>Pharetra Nam Industries</td>
                      <td>84972</td>
                      <td>Abbotsford</td>
                      <td>05/03/14</td>
                    </tr>
                    <tr>
                      <td>24</td>
                      <td>Guinevere</td>
                      <td>1-850-940-6176</td>
                      <td>Montes Nascetur Limited</td>
                      <td>54983</td>
                      <td>Rio Grande</td>
                      <td>02/24/14</td>
                    </tr>
                    <tr>
                      <td>25</td>
                      <td>Ronan</td>
                      <td>1-168-544-4394</td>
                      <td>Nunc Inc.</td>
                      <td>12167</td>
                      <td>Pinkafeld</td>
                      <td>01/02/13</td>
                    </tr>
                    <tr>
                      <td>26</td>
                      <td>Kasper</td>
                      <td>1-153-221-5650</td>
                      <td>Rutrum Limited</td>
                      <td>M9N 0N6</td>
                      <td>Saint-G?ry</td>
                      <td>04/03/14</td>
                    </tr>
                    <tr>
                      <td>27</td>
                      <td>Otto</td>
                      <td>1-894-944-5767</td>
                      <td>Purus Maecenas Libero LLC</td>
                      <td>74552-602</td>
                      <td>Jauche</td>
                      <td>11/17/13</td>
                    </tr>
                    <tr>
                      <td>28</td>
                      <td>Brenda</td>
                      <td>1-783-562-8563</td>
                      <td>Sit Consulting</td>
                      <td>15632</td>
                      <td>Llandrindod Wells</td>
                      <td>08/13/14</td>
                    </tr>
                    <tr>
                      <td>29</td>
                      <td>Laith</td>
                      <td>1-482-317-8464</td>
                      <td>Tellus Limited</td>
                      <td>P8L 2V5</td>
                      <td>Codó</td>
                      <td>11/02/13</td>
                    </tr>
                    <tr>
                      <td>30</td>
                      <td>Ella</td>
                      <td>1-275-839-6518</td>
                      <td>Tincidunt Inc.</td>
                      <td>V8L 7Y0</td>
                      <td>Lummen</td>
                      <td>09/29/13</td>
                    </tr>
                    <tr>
                      <td>31</td>
                      <td>Hanae</td>
                      <td>1-339-661-4197</td>
                      <td>Nunc Incorporated</td>
                      <td>47931</td>
                      <td>South Burlington</td>
                      <td>05/19/14</td>
                    </tr>
                    <tr>
                      <td>32</td>
                      <td>Donna</td>
                      <td>1-236-575-1365</td>
                      <td>Ultricies Sem Incorporated</td>
                      <td>78685</td>
                      <td>Baranello</td>
                      <td>02/19/13</td>
                    </tr>
                    <tr>
                      <td>33</td>
                      <td>Bevis</td>
                      <td>1-955-717-0835</td>
                      <td>Est Ac Inc.</td>
                      <td>7424</td>
                      <td>Ichtegem</td>
                      <td>08/15/13</td>
                    </tr>
                    <tr>
                      <td>34</td>
                      <td>Celeste</td>
                      <td>1-368-137-6285</td>
                      <td>Tortor Nibh Sit Inc.</td>
                      <td>01318</td>
                      <td>Portobuffolè</td>
                      <td>05/28/14</td>
                    </tr>
                    <tr>
                      <td>35</td>
                      <td>Ila</td>
                      <td>1-315-684-6122</td>
                      <td>Gravida Sagittis Associates</td>
                      <td>4438PF</td>
                      <td>Keswick</td>
                      <td>11/22/13</td>
                    </tr>
                    <tr>
                      <td>36</td>
                      <td>Alana</td>
                      <td>1-586-261-7830</td>
                      <td>Nullam Industries</td>
                      <td>6044</td>
                      <td>Bacabal</td>
                      <td>03/04/13</td>
                    </tr>
                    <tr>
                      <td>37</td>
                      <td>Rowan</td>
                      <td>1-782-168-2387</td>
                      <td>Aliquet Consulting</td>
                      <td>33000</td>
                      <td>Papasidero</td>
                      <td>02/06/14</td>
                    </tr>
                    <tr>
                      <td>38</td>
                      <td>Eric</td>
                      <td>1-161-390-1140</td>
                      <td>Odio Institute</td>
                      <td>5652</td>
                      <td>Moliterno</td>
                      <td>03/14/13</td>
                    </tr>
                    <tr>
                      <td>39</td>
                      <td>Dana</td>
                      <td>1-989-320-2205</td>
                      <td>Bibendum Fermentum Institute</td>
                      <td>X31 1HZ</td>
                      <td>Saint-Pierre</td>
                      <td>02/25/13</td>
                    </tr>
                    <tr>
                      <td>40</td>
                      <td>Karleigh</td>
                      <td>1-218-513-8714</td>
                      <td>Duis Volutpat Inc.</td>
                      <td>1356</td>
                      <td>Fresno</td>
                      <td>06/09/14</td>
                    </tr>
                    <tr>
                      <td>41</td>
                      <td>Malik</td>
                      <td>1-869-972-9871</td>
                      <td>Praesent Luctus Curabitur Limited</td>
                      <td>V3Y 0P0</td>
                      <td>Roxboro</td>
                      <td>05/09/14</td>
                    </tr>
                    <tr>
                      <td>42</td>
                      <td>May</td>
                      <td>1-462-220-8205</td>
                      <td>Suspendisse Dui LLP</td>
                      <td>4765</td>
                      <td>Mold</td>
                      <td>06/15/13</td>
                    </tr>
                    <tr>
                      <td>43</td>
                      <td>Alan</td>
                      <td>1-478-769-3709</td>
                      <td>Suspendisse Inc.</td>
                      <td>7354AC</td>
                      <td>Norfolk</td>
                      <td>03/09/14</td>
                    </tr>
                    <tr>
                      <td>44</td>
                      <td>Anastasia</td>
                      <td>1-589-358-5285</td>
                      <td>Mus Proin Institute</td>
                      <td>33244</td>
                      <td>Montbliart</td>
                      <td>06/18/14</td>
                    </tr>
                    <tr>
                      <td>45</td>
                      <td>Yardley</td>
                      <td>1-422-907-2926</td>
                      <td>Urna Et LLP</td>
                      <td>88531</td>
                      <td>Évreux</td>
                      <td>05/23/14</td>
                    </tr>
                    <tr>
                      <td>46</td>
                      <td>Oscar</td>
                      <td>1-476-548-4758</td>
                      <td>Nunc Id Enim Institute</td>
                      <td>T5Z 4YS</td>
                      <td>Burlington</td>
                      <td>08/26/14</td>
                    </tr>
                    <tr>
                      <td>47</td>
                      <td>Hasad</td>
                      <td>1-397-946-7346</td>
                      <td>Auctor Nunc Corp.</td>
                      <td>2307HU</td>
                      <td>Savona</td>
                      <td>10/29/13</td>
                    </tr>
                    <tr>
                      <td>48</td>
                      <td>Mohammad</td>
                      <td>1-984-931-7753</td>
                      <td>Ultricies Dignissim LLP</td>
                      <td>4718</td>
                      <td>Nadrin</td>
                      <td>12/08/13</td>
                    </tr>
                    <tr>
                      <td>49</td>
                      <td>Nissim</td>
                      <td>1-739-146-3150</td>
                      <td>Lacus Ltd</td>
                      <td>UX95 5JM</td>
                      <td>Veere</td>
                      <td>08/19/14</td>
                    </tr>
                    <tr>
                      <td>50</td>
                      <td>Porter</td>
                      <td>1-299-790-1428</td>
                      <td>Aliquam LLC</td>
                      <td>41708</td>
                      <td>Montaldo Bormida</td>
                      <td>11/02/12</td>
                    </tr>
                    <tr>
                      <td>51</td>
                      <td>Sophia</td>
                      <td>1-413-195-0820</td>
                      <td>Viverra Maecenas Iaculis Ltd</td>
                      <td>83468</td>
                      <td>Doetinchem</td>
                      <td>09/28/13</td>
                    </tr>
                    <tr>
                      <td>52</td>
                      <td>Acton</td>
                      <td>1-855-937-9214</td>
                      <td>Vitae Sodales Company</td>
                      <td>1757</td>
                      <td>Bad Oldesloe</td>
                      <td>04/13/13</td>
                    </tr>
                    <tr>
                      <td>53</td>
                      <td>Briar</td>
                      <td>1-846-339-0222</td>
                      <td>Congue Turpis In Limited</td>
                      <td>51510</td>
                      <td>Caerphilly</td>
                      <td>02/06/13</td>
                    </tr>
                    <tr>
                      <td>54</td>
                      <td>Benjamin</td>
                      <td>1-828-436-8902</td>
                      <td>Aliquam Nec Enim Ltd</td>
                      <td>4289GW</td>
                      <td>Holyhead</td>
                      <td>12/17/13</td>
                    </tr>
                    <tr>
                      <td>55</td>
                      <td>Gregory</td>
                      <td>1-782-119-9191</td>
                      <td>A PC</td>
                      <td>14531</td>
                      <td>Águas Lindas de Goiás</td>
                      <td>04/11/14</td>
                    </tr>
                    <tr>
                      <td>56</td>
                      <td>Marny</td>
                      <td>1-255-275-2769</td>
                      <td>Malesuada Institute</td>
                      <td>41706</td>
                      <td>Montaldo Bormida</td>
                      <td>12/19/13</td>
                    </tr>
                    <tr>
                      <td>57</td>
                      <td>Indira</td>
                      <td>1-215-687-1488</td>
                      <td>Augue Id Ante PC</td>
                      <td>42010</td>
                      <td>Lorient</td>
                      <td>09/02/13</td>
                    </tr>
                    <tr>
                      <td>58</td>
                      <td>Fleur</td>
                      <td>1-309-181-4794</td>
                      <td>Libero Donec Consectetuer Corp.</td>
                      <td>ZD4H 3NF</td>
                      <td>Valleyview</td>
                      <td>01/13/14</td>
                    </tr>
                    <tr>
                      <td>59</td>
                      <td>Fulton</td>
                      <td>1-380-339-9492</td>
                      <td>Vulputate LLP</td>
                      <td>01154</td>
                      <td>Blois</td>
                      <td>04/16/13</td>
                    </tr>
                    <tr>
                      <td>60</td>
                      <td>Arsenio</td>
                      <td>1-794-184-3132</td>
                      <td>Nec Diam Duis Ltd</td>
                      <td>91908</td>
                      <td>Foligno</td>
                      <td>05/24/13</td>
                    </tr>
                    <tr>
                      <td>61</td>
                      <td>Jaden</td>
                      <td>1-979-292-4559</td>
                      <td>Vestibulum Ante Industries</td>
                      <td>2724</td>
                      <td>Bertogne</td>
                      <td>06/16/14</td>
                    </tr>
                    <tr>
                      <td>62</td>
                      <td>Kylie</td>
                      <td>1-900-819-9083</td>
                      <td>Arcu Vestibulum Ut Incorporated</td>
                      <td>E6R 8N1</td>
                      <td>Scandriglia</td>
                      <td>03/19/14</td>
                    </tr>
                    <tr>
                      <td>63</td>
                      <td>Melyssa</td>
                      <td>1-911-370-2794</td>
                      <td>Pede Sagittis Augue Ltd</td>
                      <td>37293</td>
                      <td>Frauenkirchen</td>
                      <td>08/31/13</td>
                    </tr>
                    <tr>
                      <td>64</td>
                      <td>Jerry</td>
                      <td>1-501-422-6929</td>
                      <td>Nonummy Ut Molestie LLP</td>
                      <td>9024</td>
                      <td>Nossegem</td>
                      <td>07/22/13</td>
                    </tr>
                    <tr>
                      <td>65</td>
                      <td>Rhiannon</td>
                      <td>1-188-451-3938</td>
                      <td>Elit Pellentesque Consulting</td>
                      <td>12283</td>
                      <td>College</td>
                      <td>08/16/14</td>
                    </tr>
                    <tr>
                      <td>66</td>
                      <td>Price</td>
                      <td>1-769-162-9068</td>
                      <td>Vitae Erat Vivamus Corp.</td>
                      <td>6843</td>
                      <td>Villata</td>
                      <td>08/18/14</td>
                    </tr>
                    <tr>
                      <td>67</td>
                      <td>Ginger</td>
                      <td>1-263-395-0268</td>
                      <td>Ligula Institute</td>
                      <td>1979</td>
                      <td>Rodengo/Rodeneck</td>
                      <td>06/14/13</td>
                    </tr>
                    <tr>
                      <td>68</td>
                      <td>Britanney</td>
                      <td>1-121-616-0992</td>
                      <td>Nec Diam LLP</td>
                      <td>07095</td>
                      <td>Queanbeyan</td>
                      <td>09/01/13</td>
                    </tr>
                    <tr>
                      <td>69</td>
                      <td>Wylie</td>
                      <td>1-736-996-8984</td>
                      <td>Arcu Industries</td>
                      <td>7587LK</td>
                      <td>Fauglia</td>
                      <td>01/24/13</td>
                    </tr>
                    <tr>
                      <td>70</td>
                      <td>Holly</td>
                      <td>1-210-117-9053</td>
                      <td>Adipiscing Incorporated</td>
                      <td>9053</td>
                      <td>Dortmund</td>
                      <td>04/21/13</td>
                    </tr>
                    <tr>
                      <td>71</td>
                      <td>Althea</td>
                      <td>1-525-409-7849</td>
                      <td>Vel Company</td>
                      <td>20125</td>
                      <td>Qualicum Beach</td>
                      <td>09/27/13</td>
                    </tr>
                    <tr>
                      <td>72</td>
                      <td>Quintessa</td>
                      <td>1-947-731-6466</td>
                      <td>Nunc Interdum Foundation</td>
                      <td>3260</td>
                      <td>Llandrindod Wells</td>
                      <td>04/06/13</td>
                    </tr>
                    <tr>
                      <td>73</td>
                      <td>Fitzgerald</td>
                      <td>1-725-747-2841</td>
                      <td>Torquent Associates</td>
                      <td>01688-439</td>
                      <td>Manchester</td>
                      <td>02/06/14</td>
                    </tr>
                    <tr>
                      <td>74</td>
                      <td>Keefe</td>
                      <td>1-672-945-4291</td>
                      <td>Mollis Dui PC</td>
                      <td>73231</td>
                      <td>Hillsboro</td>
                      <td>06/24/13</td>
                    </tr>
                    <tr>
                      <td>75</td>
                      <td>Rudyard</td>
                      <td>1-504-162-2567</td>
                      <td>Ipsum Curabitur Consequat Foundation</td>
                      <td>Xxxx</td>
                      <td>Kimberly</td>
                      <td>12/12/13</td>
                    </tr>
                    <tr>
                      <td>76</td>
                      <td>Kareem</td>
                      <td>1-716-663-9703</td>
                      <td>In Ltd</td>
                      <td>2707</td>
                      <td>Legal</td>
                      <td>01/29/14</td>
                    </tr>
                    <tr>
                      <td>77</td>
                      <td>Genevieve</td>
                      <td>1-361-358-3030</td>
                      <td>Mi PC</td>
                      <td>4995</td>
                      <td>Crieff</td>
                      <td>04/25/13</td>
                    </tr>
                    <tr>
                      <td>78</td>
                      <td>Wang</td>
                      <td>1-806-922-8622</td>
                      <td>Lacinia Vitae Corporation</td>
                      <td>1850UC</td>
                      <td>Rudiano</td>
                      <td>04/05/14</td>
                    </tr>
                    <tr>
                      <td>79</td>
                      <td>Odessa</td>
                      <td>1-983-915-7779</td>
                      <td>Dolor Donec Corporation</td>
                      <td>L2M 1L6</td>
                      <td>Siddi</td>
                      <td>01/05/13</td>
                    </tr>
                    <tr>
                      <td>80</td>
                      <td>Adrienne</td>
                      <td>1-771-540-3805</td>
                      <td>Eu Lacus Incorporated</td>
                      <td>2116</td>
                      <td>Lincoln</td>
                      <td>09/13/14</td>
                    </tr>
                    <tr>
                      <td>81</td>
                      <td>Charity</td>
                      <td>1-749-804-8328</td>
                      <td>Aenean Sed Pede Foundation</td>
                      <td>14470-440</td>
                      <td>Haverfordwest</td>
                      <td>08/01/13</td>
                    </tr>
                    <tr>
                      <td>82</td>
                      <td>Kieran</td>
                      <td>1-333-507-3878</td>
                      <td>Malesuada Ut Sem Corp.</td>
                      <td>W3C 3PM</td>
                      <td>Croydon</td>
                      <td>10/30/13</td>
                    </tr>
                    <tr>
                      <td>83</td>
                      <td>Alika</td>
                      <td>1-544-422-1437</td>
                      <td>Integer Tincidunt Company</td>
                      <td>Xxxx</td>
                      <td>Plymouth</td>
                      <td>12/26/12</td>
                    </tr>
                    <tr>
                      <td>84</td>
                      <td>Shay</td>
                      <td>1-530-583-8669</td>
                      <td>Diam LLP</td>
                      <td>63260</td>
                      <td>College</td>
                      <td>08/20/14</td>
                    </tr>
                    <tr>
                      <td>85</td>
                      <td>Cailin</td>
                      <td>1-415-254-8139</td>
                      <td>Placerat Eget Foundation</td>
                      <td>L3M 4R6</td>
                      <td>Jonqui?re</td>
                      <td>09/12/14</td>
                    </tr>
                    <tr>
                      <td>86</td>
                      <td>Xena</td>
                      <td>1-979-983-1456</td>
                      <td>Tellus Eu Augue Associates</td>
                      <td>09703-746</td>
                      <td>Angleur</td>
                      <td>05/21/13</td>
                    </tr>
                    <tr>
                      <td>87</td>
                      <td>Walker</td>
                      <td>1-380-277-2755</td>
                      <td>Sollicitudin A Malesuada Corporation</td>
                      <td>60019</td>
                      <td>Toronto</td>
                      <td>06/11/14</td>
                    </tr>
                    <tr>
                      <td>88</td>
                      <td>Adena</td>
                      <td>1-756-948-8416</td>
                      <td>Diam Ltd</td>
                      <td>B7T 5X7</td>
                      <td>Stene</td>
                      <td>05/30/14</td>
                    </tr>
                    <tr>
                      <td>89</td>
                      <td>Bradley</td>
                      <td>1-800-808-3688</td>
                      <td>Nunc Quis LLC</td>
                      <td>83932-949</td>
                      <td>Uppingham. Cottesmore</td>
                      <td>11/05/13</td>
                    </tr>
                    <tr>
                      <td>90</td>
                      <td>Yvette</td>
                      <td>1-843-923-0038</td>
                      <td>Eget Metus PC</td>
                      <td>47936</td>
                      <td>Feira de Santana</td>
                      <td>06/27/14</td>
                    </tr>
                    <tr>
                      <td>91</td>
                      <td>Neil</td>
                      <td>1-550-664-4050</td>
                      <td>Aenean Euismod LLP</td>
                      <td>28842</td>
                      <td>Corby</td>
                      <td>07/27/14</td>
                    </tr>
                    <tr>
                      <td>92</td>
                      <td>Hunter</td>
                      <td>1-637-483-4408</td>
                      <td>In Nec Orci LLC</td>
                      <td>49338</td>
                      <td>Cleveland</td>
                      <td>01/15/13</td>
                    </tr>
                    <tr>
                      <td>93</td>
                      <td>Marcia</td>
                      <td>1-512-896-6301</td>
                      <td>Et Risus Industries</td>
                      <td>74123</td>
                      <td>Quinte West</td>
                      <td>09/30/13</td>
                    </tr>
                    <tr>
                      <td>94</td>
                      <td>Lavinia</td>
                      <td>1-222-745-5312</td>
                      <td>Nulla Interdum Curabitur LLC</td>
                      <td>3531</td>
                      <td>Assiniboia</td>
                      <td>01/12/13</td>
                    </tr>
                    <tr>
                      <td>95</td>
                      <td>Cynthia</td>
                      <td>1-392-134-2788</td>
                      <td>Nunc Ut Erat Company</td>
                      <td>I27 5OS</td>
                      <td>Pagazzano</td>
                      <td>05/20/13</td>
                    </tr>
                    <tr>
                      <td>96</td>
                      <td>Lee</td>
                      <td>1-128-816-7274</td>
                      <td>Litora Torquent Per PC</td>
                      <td>11386</td>
                      <td>Mazzano Romano</td>
                      <td>04/18/14</td>
                    </tr>
                    <tr>
                      <td>97</td>
                      <td>Linda</td>
                      <td>1-546-735-8920</td>
                      <td>Dis Parturient Montes Associates</td>
                      <td>64629</td>
                      <td>Ferlach</td>
                      <td>03/29/14</td>
                    </tr>
                    <tr>
                      <td>98</td>
                      <td>Wayne</td>
                      <td>1-744-647-6144</td>
                      <td>In Industries</td>
                      <td>Xxxx</td>
                      <td>Memphis</td>
                      <td>06/11/14</td>
                    </tr>
                    <tr>
                      <td>99</td>
                      <td>Liberty</td>
                      <td>1-841-489-1665</td>
                      <td>Sed Sem Limited</td>
                      <td>27504-649</td>
                      <td>Olivola</td>
                      <td>05/24/14</td>
                    </tr>
                    <tr>
                      <td>100</td>
                      <td>Cathleen</td>
                      <td>1-883-567-6065</td>
                      <td>Eu Corporation</td>
                      <td>4286</td>
                      <td>Rotheux-Rimi?re</td>
                      <td>07/16/13</td>
                    </tr>
                  </tbody>
                </table>
    
              </div>
              <!-- end widget content -->
    
            </div>
            <!-- end widget div -->
    
          </div>
          <!-- end widget -->

        </article>

        <article class="col-sm-12 col-md-12 col-lg-6">

          <!-- new widget -->
          <div class="jarviswidget" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false">

            <!-- widget options:
            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

            data-widget-colorbutton="false"
            data-widget-editbutton="false"
            data-widget-togglebutton="false"
            data-widget-deletebutton="false"
            data-widget-fullscreenbutton="false"
            data-widget-custombutton="false"
            data-widget-collapsed="true"
            data-widget-sortable="false"

            -->

            <header>
              <span class="widget-icon"> <i class="fa fa-map-marker"></i> </span>
              <h2>Birds Eye</h2>
              <div class="widget-toolbar hidden-mobile">
                <span class="onoffswitch-title"><i class="fa fa-location-arrow"></i> Realtime</span>
                <span class="onoffswitch">
                  <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" checked="checked" id="myonoffswitch">
                  <label class="onoffswitch-label" for="myonoffswitch"> <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> <span class="onoffswitch-switch"></span> </label> </span>
              </div>
            </header>

            <!-- widget div-->
            <div>
              <!-- widget edit box -->
              <div class="jarviswidget-editbox">
                <div>
                  <label>Title:</label>
                  <input type="text" />
                </div>
              </div>
              <!-- end widget edit box -->

              <div class="widget-body no-padding">
                <!-- content goes here -->

                <div id="vector-map" class="vector-map"></div>
                <div id="heat-fill">
                  <span class="fill-a">0</span>

                  <span class="fill-b">5,000</span>
                </div>

                <table class="table table-striped table-hover table-condensed">
                  <thead>
                    <tr>
                      <th>Country</th>
                      <th>Visits</th>
                      <th class="text-align-center">User Activity</th>
                      <th class="text-align-center hidden-xs">Online</th>
                      <th class="text-align-center">Demographic</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="javascript:void(0);">USA</a></td>
                      <td>4,977</td>
                      <td class="text-align-center">
                      <div class="sparkline txt-color-blue text-align-center" data-sparkline-height="22px" data-sparkline-width="90px" data-sparkline-barwidth="2">
                        2700, 3631, 2471, 1300, 1877, 2500, 2577, 2700, 3631, 2471, 2000, 2100, 3000
                      </div></td>
                      <td class="text-align-center hidden-xs">143</td>
                      <td class="text-align-center">
                      <div class="sparkline display-inline" data-sparkline-type='pie' data-sparkline-piecolor='["#E979BB", "#57889C"]' data-sparkline-offset="90" data-sparkline-piesize="23px">
                        17,83
                      </div>
                      <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                        <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-cog fa-lg"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-xs pull-right">
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> <u>P</u>DF</a>
                          </li>
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> <u>D</u>elete</a>
                          </li>
                          <li class="divider"></li>
                          <li class="text-align-center">
                            <a href="javascript:void(0);">Cancel</a>
                          </li>
                        </ul>
                      </div></td>
                    </tr>
                    <tr>
                      <td><a href="javascript:void(0);">Australia</a></td>
                      <td>4,873</td>
                      <td class="text-align-center">
                      <div class="sparkline txt-color-blue text-align-center" data-sparkline-height="22px" data-sparkline-width="90px" data-sparkline-barwidth="2">
                        1000, 1100, 3030, 1300, -1877, -2500, -2577, -2700, 3631, 2471, 4700, 1631, 2471
                      </div></td>
                      <td class="text-align-center hidden-xs">247</td>
                      <td class="text-align-center">
                      <div class="sparkline display-inline" data-sparkline-type='pie' data-sparkline-piecolor='["#E979BB", "#57889C"]' data-sparkline-offset="90" data-sparkline-piesize="23px">
                        22,88
                      </div>
                      <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                        <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-cog fa-lg"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-xs pull-right">
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> <u>P</u>DF</a>
                          </li>
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> <u>D</u>elete</a>
                          </li>
                          <li class="divider"></li>
                          <li class="text-align-center">
                            <a href="javascript:void(0);">Cancel</a>
                          </li>
                        </ul>
                      </div></td>
                    </tr>
                    <tr>
                      <td><a href="javascript:void(0);">India</a></td>
                      <td>3,671</td>
                      <td class="text-align-center">
                      <div class="sparkline txt-color-blue text-align-center" data-sparkline-height="22px" data-sparkline-width="90px" data-sparkline-barwidth="2">
                        3631, 1471, 2400, 3631, 471, 1300, 1177, 2500, 2577, 3000, 4100, 3000, 7700
                      </div></td>
                      <td class="text-align-center hidden-xs">373</td>
                      <td class="text-align-center">
                      <div class="sparkline display-inline" data-sparkline-type='pie' data-sparkline-piecolor='["#E979BB", "#57889C"]' data-sparkline-offset="90" data-sparkline-piesize="23px">
                        10,90
                      </div>
                      <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                        <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-cog fa-lg"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-xs pull-right">
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> <u>P</u>DF</a>
                          </li>
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> <u>D</u>elete</a>
                          </li>
                          <li class="divider"></li>
                          <li class="text-align-center">
                            <a href="javascript:void(0);">Cancel</a>
                          </li>
                        </ul>
                      </div></td>
                    </tr>
                    <tr>
                      <td><a href="javascript:void(0);">Brazil</a></td>
                      <td>2,476</td>
                      <td class="text-align-center">
                      <div class="sparkline txt-color-blue text-align-center" data-sparkline-height="22px" data-sparkline-width="90px" data-sparkline-barwidth="2">
                        2700, 1877, 2500, 2577, 2000, 3631, 2471, -2700, -3631, 2471, 1300, 2100, 3000,
                      </div></td>
                      <td class="text-align-center hidden-xs ">741</td>
                      <td class="text-align-center">
                      <div class="sparkline display-inline" data-sparkline-type='pie' data-sparkline-piecolor='["#E979BB", "#57889C"]' data-sparkline-offset="90" data-sparkline-piesize="23px">
                        34,66
                      </div>
                      <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                        <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-cog fa-lg"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-xs pull-right">
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> <u>P</u>DF</a>
                          </li>
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> <u>D</u>elete</a>
                          </li>
                          <li class="divider"></li>
                          <li class="text-align-center">
                            <a href="javascript:void(0);">Cancel</a>
                          </li>
                        </ul>
                      </div></td>
                    </tr>
                    <tr>
                      <td><a href="javascript:void(0);">Turkey</a></td>
                      <td>1,476</td>
                      <td class="text-align-center">
                      <div class="sparkline txt-color-blue text-align-center" data-sparkline-height="22px" data-sparkline-width="90px" data-sparkline-barwidth="2">
                        1300, 1877, 2500, 2577, 2000, 2100, 3000, -2471, -2700, -3631, -2471, 2700, 3631
                      </div></td>
                      <td class="text-align-center hidden-xs">123</td>
                      <td class="text-align-center">
                      <div class="sparkline display-inline" data-sparkline-type='pie' data-sparkline-piecolor='["#E979BB", "#57889C"]' data-sparkline-offset="90" data-sparkline-piesize="23px">
                        75,25
                      </div>
                      <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                        <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-cog fa-lg"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-xs pull-right">
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> <u>P</u>DF</a>
                          </li>
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> <u>D</u>elete</a>
                          </li>
                          <li class="divider"></li>
                          <li class="text-align-center">
                            <a href="javascript:void(0);">Cancel</a>
                          </li>
                        </ul>
                      </div></td>
                    </tr>
                    <tr>
                      <td><a href="javascript:void(0);">Canada</a></td>
                      <td>146</td>
                      <td class="text-align-center">
                      <div class="sparkline txt-color-orange text-align-center" data-sparkline-height="22px" data-sparkline-width="90px" data-sparkline-barwidth="2">
                        5, 34, 10, 1, 4, 6, -9, -1, 0, 0, 5, 6, 7
                      </div></td>
                      <td class="text-align-center hidden-xs">23</td>
                      <td class="text-align-center">
                      <div class="sparkline display-inline" data-sparkline-type='pie' data-sparkline-piecolor='["#E979BB", "#57889C"]' data-sparkline-offset="90" data-sparkline-piesize="23px">
                        50,50
                      </div>
                      <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                        <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-cog fa-lg"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-xs pull-right">
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-file fa-lg fa-fw txt-color-greenLight"></i> <u>P</u>DF</a>
                          </li>
                          <li>
                            <a href="javascript:void(0);"><i class="fa fa-times fa-lg fa-fw txt-color-red"></i> <u>D</u>elete</a>
                          </li>
                          <li class="divider"></li>
                          <li class="text-align-center">
                            <a href="javascript:void(0);">Cancel</a>
                          </li>
                        </ul>
                      </div></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan=5>
                      <ul class="pagination pagination-xs no-margin">
                        <li class="prev disabled">
                          <a href="javascript:void(0);">Previous</a>
                        </li>
                        <li class="active">
                          <a href="javascript:void(0);">1</a>
                        </li>
                        <li>
                          <a href="javascript:void(0);">2</a>
                        </li>
                        <li>
                          <a href="javascript:void(0);">3</a>
                        </li>
                        <li class="next">
                          <a href="javascript:void(0);">Next</a>
                        </li>
                      </ul></td>
                    </tr>
                  </tfoot>
                </table>

                <!-- end content -->

              </div>

            </div>
            <!-- end widget div -->
          </div>
          <!-- end widget -->

          <!-- new widget -->
          <div class="jarviswidget jarviswidget-color-blue" id="wid-id-4" data-widget-editbutton="false" data-widget-colorbutton="false">

            <!-- widget options:
            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

            data-widget-colorbutton="false"
            data-widget-editbutton="false"
            data-widget-togglebutton="false"
            data-widget-deletebutton="false"
            data-widget-fullscreenbutton="false"
            data-widget-custombutton="false"
            data-widget-collapsed="true"
            data-widget-sortable="false"

            -->

            <header>
              <span class="widget-icon"> <i class="fa fa-check txt-color-white"></i> </span>
              <h2> ToDo's </h2>
              <!-- <div class="widget-toolbar">
              add: non-hidden - to disable auto hide

              </div>-->
            </header>

            <!-- widget div-->
            <div>
              <!-- widget edit box -->
              <div class="jarviswidget-editbox">
                <div>
                  <label>Title:</label>
                  <input type="text" />
                </div>
              </div>
              <!-- end widget edit box -->

              <div class="widget-body no-padding smart-form">
                <!-- content goes here -->
                <h5 class="todo-group-title"><i class="fa fa-warning"></i> Critical Tasks (<small class="num-of-tasks">1</small>)</h5>
                <ul id="sortable1" class="todo">
                  <li>
                    <span class="handle"> <label class="checkbox">
                        <input type="checkbox" name="checkbox-inline">
                        <i></i> </label> </span>
                    <p>
                      <strong>Ticket #17643</strong> - Hotfix for WebApp interface issue [<a href="javascript:void(0);" class="font-xs">More Details</a>] <span class="text-muted">Sea deep blessed bearing under darkness from God air living isn't. </span>
                      <span class="date">Jan 1, 2014</span>
                    </p>
                  </li>
                </ul>
                <h5 class="todo-group-title"><i class="fa fa-exclamation"></i> Important Tasks (<small class="num-of-tasks">3</small>)</h5>
                <ul id="sortable2" class="todo">
                  <li>
                    <span class="handle"> <label class="checkbox">
                        <input type="checkbox" name="checkbox-inline">
                        <i></i> </label> </span>
                    <p>
                      <strong>Ticket #1347</strong> - Inbox email is being sent twice <small>(bug fix)</small> [<a href="javascript:void(0);" class="font-xs">More Details</a>] <span class="date">Nov 22, 2013</span>
                    </p>
                  </li>
                  <li>
                    <span class="handle"> <label class="checkbox">
                        <input type="checkbox" name="checkbox-inline">
                        <i></i> </label> </span>
                    <p>
                      <strong>Ticket #1314</strong> - Call customer support re: Issue <a href="javascript:void(0);" class="font-xs">#6134</a><small>(code review)</small>
                      <span class="date">Nov 22, 2013</span>
                    </p>
                  </li>
                  <li>
                    <span class="handle"> <label class="checkbox">
                        <input type="checkbox" name="checkbox-inline">
                        <i></i> </label> </span>
                    <p>
                      <strong>Ticket #17643</strong> - Hotfix for WebApp interface issue [<a href="javascript:void(0);" class="font-xs">More Details</a>] <span class="text-muted">Sea deep blessed bearing under darkness from God air living isn't. </span>
                      <span class="date">Jan 1, 2014</span>
                    </p>
                  </li>
                </ul>

                <h5 class="todo-group-title"><i class="fa fa-check"></i> Completed Tasks (<small class="num-of-tasks">1</small>)</h5>
                <ul id="sortable3" class="todo">
                  <li class="complete">
                    <span class="handle" style="display:none"> <label class="checkbox state-disabled">
                        <input type="checkbox" name="checkbox-inline" checked="checked" disabled="disabled">
                        <i></i> </label> </span>
                    <p>
                      <strong>Ticket #17643</strong> - Hotfix for WebApp interface issue [<a href="javascript:void(0);" class="font-xs">More Details</a>] <span class="text-muted">Sea deep blessed bearing under darkness from God air living isn't. </span>
                      <span class="date">Jan 1, 2014</span>
                    </p>
                  </li>
                </ul>

                <!-- end content -->
              </div>

            </div>
            <!-- end widget div -->
          </div>
          <!-- end widget -->

        </article>

      </div>

      <!-- end row -->

    </section>
    <!-- end widget grid -->

  </div>
  <!-- END MAIN CONTENT -->
@stop

@section('formulario')
    {{-- @include( 'admin.mantenimiento.form.persona' )  --}}
@stop

@push('scripts_custom')
    <!-- PAGE RELATED PLUGIN(S) -->
    <script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
    <script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
    <script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
    <script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>


    <script src="/admin/main.js"></script>
@endpush