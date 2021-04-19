<h2 class="b-goods-f__title">Car Specifications</h2>
                <div class="row">
                  <div class="col-md-6">
                    <dl class="b-goods-f__descr row">
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Company</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['CarCompany'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Model</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['CarModel'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Body Style</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['CarBodytype'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Color</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['CarBodycolor'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Fuel Type</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['FuelType'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Max Power</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['MaxPower'];?></dd>
                    </dl>
                  </div>
                  <div class="col-md-6">
                    <dl class="b-goods-f__descr row">
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Fuel Capacity</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['FuelCapacity'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Mileage</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['Milage'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Transmission</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['TransmissionType'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Air Bags</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['AirBags'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">No. of Gear</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['NoofGear'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">No. Of Seats</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['Seatingcapacity'];?></dd>
                    </dl>
                  </div>
                </div>










				<div class="row" id="flash">
                  <?php  
                    $quer=mysqli_query($con,"select * from colour where car_id='$carid'");
                    while($row1=mysqli_fetch_array($quer)){?>
                    <div class="column" id="flasher">
                      <img src="upload/car/<?php echo $row1['image'];?>" alt="<?php echo $row1['colour'];?>" onclick="myFunction(this);">
                    </div>
                    <?php }?>
                  </div>