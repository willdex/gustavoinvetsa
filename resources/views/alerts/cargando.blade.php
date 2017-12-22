<style>
  
     .animated { 
        /*background-image: url({{asset("images/cargando.png")}});
        background-repeat: no-repeat;*/
        background-position: left top;
        padding-top:95px;
        margin-bottom:60px;
        -webkit-animation-duration: 5s;
        animation-duration: 5s; 
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both; 
     }
     
     @-webkit-keyframes bounceIn {
        0% {
           opacity: 0;
           -webkit-transform: scale(.3);
        }
        50% {
           opacity: 1;
           -webkit-transform: scale(1.05);
        }
        70% {
           -webkit-transform: scale(.9);
        }
        100% {
           -webkit-transform: scale(1);
        }
     }
     
     @keyframes bounceIn {
        0% {
           opacity: 0;
           transform: scale(.3);
        }
        50% {
           opacity: 1; 
           transform: scale(1.05);
        }
        70% {
           transform: scale(.9);
        }
        100% {
           transform: scale(1);
        }
     }
     
     .bounceIn {
        -webkit-animation-name: bounceIn; 
        animation-name: bounceIn;
     }
  </style>

<div id="loading">
<img class="animated bounceIn" src='{{asset("images/cargando.png")}}' width="450px" height="300px" style='margin:0 auto; position: absolute; top: 30%; left: 42%; margin: -30px 0 0 -30px; '>	
</div>



<?php /*<style type="text/css">

.girar {
  animation-duration: 1.5s;
  animation-name: slidein;
}

@keyframes slidein {
  to {
	-webkit-transition:1.5s;
	-webkit-transform:rotate(360deg);	
  }
}
</style>*/ ?>

<?php /*
<div id='loading' align="center">
<img class="girar" src='{{asset("images/cargando.png")}}' width="500px" height="300px" style='margin:0 auto; position: absolute; top: 30%; left: 42%; margin: -30px 0 0 -30px; '>
   <?php //<img src='{{asset('images/loading.gif')}}' style='margin:0 auto; position: absolute; top: 50%; left: 50%; margin: -30px 0 0 -30px; display: block'> ?>
</div>*/ ?>