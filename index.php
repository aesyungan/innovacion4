<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script type="text/javascript" src="vista/js/jquery-3.1.0.min.js"></script>
    <script src="vista/js/angular.min.js" type="text/javascript"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDYTQEDTTAMXS6ZguW9o2zfdFLzdgjS8VM"></script>
<script src="https://code.angularjs.org/1.3.15/angular.js"></script>
<script src="https://rawgit.com/allenhwkim/angularjs-google-maps/master/build/scripts/ng-map.js"></script>
<!--bootstrap-->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Simple markers</title>
    <style>
        .header{
            
            background: #13b7de;
            height: 50px;
            color: white;
            padding-top: 1%;
          font-size: 20px;
          margin-bottom:6%; 
          
            
        }
      #map {
        height: 80%;
        width: 75%;
        float: left;
      
        
      }
        #datos {
        height: 80%;
        width: 20%;
        float: right;
        padding: 2% 2% 2% 1%;
        background: #344646;
        border:  1px solid red;
        border-radius: 2%;
            overflow-y: scroll;
            
 
        
      }
      .itemGps{
          background-color: #444141;
          color: white;
          display: inline-block;
         width: 100%;
          position: relative;
          margin-bottom: 1%;
              overflow: hidden;
              height: 100px;
      }
      .itemGps:hover{
          background-color: #46e4e4;  
          border-radius: 5%;
          height: 110px;
      }
       .dato1{
          float: right;
          width: 70%;
          
      }
       .foto{
          float: left;
          vertical-align: central;
          padding: 1%;
          width: 28%;
          position: absolute;
          height: 100%;
        
      }
      .imgTest{
          
          border-radius: 100%;
      }
      .description{
          position: absolute;
          display: inherit;
              
      }
      .buscar{
    border-bottom: 2px solid #14bfe6;
    margin-bottom: 2%;
    padding: 2%;
    
          
      }
      .textBuscar{
          width: 100%;
      }
    </style>
  </head>
  <body ng-app="myApp">
      
      <div class="header">
  <center >Lista de Gps  de Usuarios Registrados </center>   
  <img  class="imgTest" src="http://androtalk.es/wp-content/uploads/2014/05/google-maps-logo.png" width="50"  height="50">
      </div>    
  
  
  <div class="todo">

      
      <div  ng-controller="mapCntrl" id="map">
           <ng-map center="[-1.68506378,-78.63885724]" style="height: 480px;" zoom="4">
               <div ng-repeat="p in lista_clientGps">
       <!--            <marker icon="{{customIcon}}"  position="{{p.latitude}}, {{p.longitude}}" ></marker>-->
                   <marker  title="{{p.descripcion}}"  position="{{p.latitud}}, {{p.longitud}}" >
                      
                   </marker>
       
               </div>
           </ng-map>
                   
       </div>
         
      <div ng-controller="mapCntrl" id="datos"> 
          <div class="buscar">
              <input class="textBuscar form-control" type="text" placeholder="Buscar">
          </div>     
          <div ng-repeat="x in lista_clientGps" class="itemGps">
            
              <div class=" foto">
                      <img class="imgTest" src="http://www.zayedhotel.com/addons/default/themes/yoona/img/user.jpg" width="50px" height="50px"  />
                      <span class="description"> {{ x.descripcion }}</span>
              
              </div>
                  <div class=" dato1">
                 
                  <p>{{ x.latitud }}</p>
                  <p>{{ x.longitud }}</p>
                  </div>
              
          
          </div>
                  
                
      </div>
  </div>   
      
<!--  <div id="map"></div>-->
    
    <script>
     
         var app = angular.module('myApp', ['ngMap']);
         
              
                //otro controlador
                  app.controller('mapCntrl', function ($scope, $http) {
                      //recupera datos 
                      $http.get("http://findme.webcindario.com/vista/usuario_dispositivo_listar.php")
                    
                    .then(function (response) {
                        $scope.lista_clientGps = response.data.usuario_dispositivos;
                       
                       });
                    
                  
                  // pone los  puntos 
                  
                      $scope.points = [
                          { "name": "Canberra", "latitude": -35.282614, "longitude": 149.127775 },
                          { "name": "Melbourne", "latitude": -37.815482, "longitude": 144.983460 },
                          { "name": "Sydney", "latitude": -33.869614, "longitude": 151.187451 }
                      ];
                  
                  
//                      $scope.customIcon = {
//                          "scaledSize": [32, 32],
//                          "url": "http://simpleicon.com/wp-content/uploads/map-marker-2.png"
//                      };
                  
                  });
                
       



    </script>

  </body>
</html>