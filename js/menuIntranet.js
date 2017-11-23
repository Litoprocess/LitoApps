  $(document).ready(function() {
    $('.button-collapse').sideNav();

     if( <?php echo $_SESSION["MenuLibera"];?> != 1 ) {
      $('#aside-libera').hide();
      $('#panel-libera').hide();
  }
     if( <?php echo $_SESSION["MenuMaquilas"];?> != 1 ) {
      $('#aside-acabadom').hide();
      $('#panel-acabadom').hide();
  }
     if( <?php echo $_SESSION["MenuMuestras"];?> != 1 ) {
      $('#aside-controlm').hide();
      $('#panel-controlm').hide();
  }
     if( <?php echo $_SESSION["MenuRevBDD"];?> != 1 ) {
      $('#aside-muestreo').hide();
      $('#panel-muestreo').hide();
  }       
           
});