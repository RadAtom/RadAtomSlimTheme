<script>
  function hsnavmenu() 
  {
  var button = document.getElementById('navbutton'); // Assumes element with id='button'

  button.onclick = function() {
    var div = document.getElementById('nav-menu');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
    }
    else {  
        div.style.display = 'block';
    }
  };
  }
</script>