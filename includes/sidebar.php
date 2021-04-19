  <aside class="l-sidebar">
                  <div class="widget section-sidebar bg-light">

                    <h3 class="widget-title bg-dark"><i class="ic flaticon-car-4"></i>Search a car</h3>
                    <div class="widget-content">
                      <div class="widget-inner">
<form class="b-filter bg-light" method="post" name="search" action="car-search.php">
                         
                          <div class="b-filter__main">
                            <div class="b-filter__row">
<select class="selectpicker" data-style="ui-select" name="model" >
     <option value="">Select Model</option>
                                <?php 
 $query2=mysqli_query($con,"select name from tbl_car");
 while ($row2=mysqli_fetch_array($query2)) {


 ?>
                                <option><?php echo $row2['name'];?></option><?php } ?>
                                
                              </select>
                            </div>
                            <div class="b-filter__row">
<select class="selectpicker" title="Car Type" name="cartype" id="cartype" data-style="ui-select">
   <option value="">Select Car Type</option>
                                <?php 
 $query3=mysqli_query($con,"select distinct car_type from tbl_car");
 while ($row3=mysqli_fetch_array($query3)) {


 ?>
                                 <option><?php echo $row3['car_type'];?></option><?php } ?>
                              </select>
                            </div>
                            <div class="b-filter__row">
 <select class="selectpicker" data-width="100%" data-style="ui-select"   name="transmissiontype">
  <option value="">Transmission Type</option>
 <?php 
 $query4=mysqli_query($con,"select distinct type from tbl_transmission");
 while ($row4=mysqli_fetch_array($query4)) {


 ?>
                                 <option><?php echo $row4['type'];?></option><?php } ?>
                              </select>
                            </div>

                            <div class="b-filter__row">
                              <select class="selectpicker" data-width="100%" title="Fuel Type"  name="fueltype"  data-style="ui-select">
                              <option value="">Fuel Type</option>
                                <?php 
 $query6=mysqli_query($con,"select distinct fuel from tbl_transmission");
 while ($row6=mysqli_fetch_array($query6)) {


 ?>
                                 <option><?php echo $row6['fuel'];?></option><?php } ?>
                              </select>
                            </div>
                          </div>
                         
                          <button class="btn btn-primary w-100" type="submit" name="search">show results</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end .b-filter-->
                 
                </aside>