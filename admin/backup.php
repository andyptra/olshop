<div class="zitems">
					<div class="zitem">
						<a href="product.php?id=<?php echo $data['id']; ?>">
							<img title="<?php echo $data['product_name']; ?>" src="foto/<?php echo $data['image']; ?>"  />
						</a>
                        <?php
						if ($data[diskon]!= "0"){
						   echo"<div class='prod_price'><span style='text-decoration:line-through;' class='price'>Rp. $data[price],- <br />
						</span>&nbsp;<span class='price3'>Diskon $data[diskon]% 
						 <br /><span class='price2'>Rp. <b>$hargadisc,-</b></span></div>                        
						</div>";
						  }else{
						echo"<div class='prod_price'><span class='price'> <br /></span>&nbsp;<span class='price'> Rp. <b>$hargadisc,-</b></span></div>
						";
						  } 

						?>
						<br class="clearfloat" />
                        </div>
						<?php if($data[stok]!=="0")
					{ 
						echo"<div class='title' align='center'><a href=product.php?id=$data[id]>Produk $data[product_name]</a></div>";
						
						}
					else{
						echo "<img src=images/sold-out.png style=margin-left:7px;margin-top:-168px; width=170px; height=161px;>";
						
						}
                  	?>  
				</div>