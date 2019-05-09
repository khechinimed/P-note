<!DOCTYPE html>
<html lang="en">
  <head>

   @include('admin.title')

    @include('admin.style')

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            @include('admin.sitename');

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('admin.welcomeuser')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('admin.menu')




            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
       @include('admin.top')

		<?php $url = URL::to("/"); ?>


        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->






		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Messages</h2>
                    <ul class="nav navbar-right panel_toolbox">

                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>

                  </div>




				  <div class="x_content">
                   <form action="{{ route('admin.notes') }}" method="post">
				   <div class="text-right">
				    <?php if(config('global.demosite')=="yes"){?>

				   <a href="#" class="btn btn-danger btndisable">Delete All</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				   <input type="submit" value="Delete All" class="btn btn-danger" id="checkBtn" onclick="return confirm('Are you sure you want to delete?');">
				  <?php } ?>

				   </div>


				   {{ csrf_field() }}
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
						<th>
          <button type="button" id="selectAll" class="main">
          <span class="sub"></span> Select All </button></th>

                          <th>Sno</th>

						  <th>Key</th>
                          <th>Content</th>
                          <th>Status</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  $i=1;
					  foreach ($notes as $note) { ?>


                        <tr>
						<td><input type="checkbox" name="note_id[]" value="<?php echo $note->id;?>"/></td>

						 <td><?php echo $i;?></td>

						 <td><?php echo $note->note_key;?></td>

                          <td><div style="width:300px;overflow:hidden;"><?php echo $note->note_desc.'...';?></div></td>

						  <?php if($note->note_read_status=="read"){ $color = "color:#ABCBFF;"; }
						  if($note->note_read_status=="unread"){ $color = "color:#4285F4;font-weight:bolder;"; }
						  ?>
						  <td style="<?php echo $color;?>"><?php echo $note->note_read_status;?></td>


						  <td>
						  <?php if(config('global.demosite')=="yes"){?>
						  <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  <a href="<?php echo $url;?>/admin/notes/{{ $note->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
				  <?php } ?>
						  </td>
                        </tr>
                        <?php $i++;} ?>

                      </tbody>
                    </table>
					</form>

                  </div>




                </div>
              </div>







        </div>
        <!-- /page content -->

      @include('admin.footer')
      </div>
    </div>



  </body>
</html>
