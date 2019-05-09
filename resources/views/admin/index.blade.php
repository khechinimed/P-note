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
          <div class="row tile_count">
            <div class="col-md-4 col-sm-4 col-xs-4 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Notes Created</span>
              <div class="count green"><?php echo $total_notes;?></div>

            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Notes Read</span>
              <div class="count"><?php echo $notes_read;?></div>

            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Notes Unread</span>
              <div class="count"><?php echo $notes_unread;?></div>

            </div>

          </div>
          <!-- /top tiles -->


		  <div style="clear:both;"></div>













		  <div class="row">


            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Recent Notes</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="widget_summary">


				   <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>

                      <th>

                          <p>Key</p>
                       </th>
					   <th>

                          <p>Content</p>

                      </th>

					  <th>

                          <p>Status</p>

                      </th>
                    </tr>

					<?php
					$ij = 1;
					foreach($notes as $note){?>
					<tr height="20"></tr>
                    <tr>



                      <td>
                       <?php echo $note->note_key;?>
                      </td>
                      <td>
                       <?php echo substr($note->note_desc,0,20).'...';?>
                      </td>



					  <td>
                       <?php echo $note->note_read_status;?>
                      </td>
                    </tr>
					<?php $ij++;} ?>
                  </table>
                </div>

                  </div>






                </div>
              </div>
            </div>




			<div class="col-md-6 col-sm-6 col-xs-12 bg-white">
                  <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Notes</h2>

                  <div class="clearfix"></div>
                </div>
               <?php
			   $read = ( $notes_read / $total_notes ) * 100;
			   $unread = ( $notes_unread / $total_notes ) * 100;
			   $totalread = ( $total_notes / $total_notes ) * 100;
			   ?>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Read Notes</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $read;?>"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Unread Notes</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $unread;?>"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Total Notes</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $totalread;?>"></div>
                        </div>
                      </div>
                    </div>

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
