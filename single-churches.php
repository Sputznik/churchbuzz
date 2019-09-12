<?php get_header();?>
<div class='church-header'>
  <div class="container">
    <div class="row">
      <div class="col-sm-7">
        <h1><?php the_title();?></h1>
      </div>
    </div>
  </div>
</div>
<div class="church-info container">
  <div class="row">
    <div class="col-sm-5">
      <h3>Address</h3>
      <?php echo do_shortcode('[orbit_cf id="address"]');?>
      <?php $website = do_shortcode('[orbit_cf id="website"]');if( $website ):?>
      <p style="margin-top: 20px; "><a href="<?php _e( $website );?>" class="btn btn-default btn-church">Website</a></p>
      <?php endif; ?>
    </div>
    <div class="col-sm-6 col-sm-offset-1 church-map">
      <?php echo do_shortcode('[orbit_cf id="map"]');?>
    </div>
  </div>
</div>
<?php get_footer();?>
<style>
  .single-churches .header3{ min-height: 50px; }
  .church-header{
    background: #333;
    padding: 120px 0;
    color: #fff;
  }
  .church-info{
    padding: 50px 0;
  }
  .btn-church.btn-default{
    border: #333 solid 1px;
    color: #333;
    background: transparent;
    border-radius: 0;
    font-size: 20px;
    padding: 12px 25px;
  }
  .btn-church.btn-default:hover{
    background: #333;
    color: #fff;
  }
  @media( min-width: 960px ){
    .church-map{
      margin-top: -150px;
    }
  }

</style>
