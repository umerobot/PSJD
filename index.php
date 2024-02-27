<!DOCTYPE html>
<html>
  <body onload = "getLocation()">
      <script>
          function distance(lat1,lat2, lon1, lon2)
              {
            
                  // The math module contains a function
                  // named toRadians which converts from
                  // degrees to radians.
                  lon1 =  lon1 * Math.PI / 180;
                  lon2 = lon2 * Math.PI / 180;
                  lat1 = lat1 * Math.PI / 180;
                  lat2 = lat2 * Math.PI / 180;
            
                  // Haversine formula 
                  let dlon = lon2 - lon1; 
                  let dlat = lat2 - lat1;
                  let a = Math.pow(Math.sin(dlat / 2), 2)
                          + Math.cos(lat1) * Math.cos(lat2)
                          * Math.pow(Math.sin(dlon / 2),2);
                        
                  let c = 2 * Math.asin(Math.sqrt(a));
            
                  // Radius of earth in kilometers. Use 3956 
                  // for miles
                  let r = 6371;
            
                  // calculate the result
                  return(c * r);
              }
          function getLocation() {
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
              x.innerHTML = "Geolocation is not supported by this browser.";
            }
          }

          function showPosition(position) {
            var lat1 = 13.567538;
            var lon1 = 100.564077;
            var lat2 = position.coords.latitude;
            var lon2 = position.coords.longitude;
            let ReKM = distance(lat1, lat2,lon1, lon2);
            let ReM = ReKM * 1000;
            
            //document.getElementById("demo").innerHTML = ReKM + " KM.";
            //document.getElementById("test").innerHTML = ReM + " M.";
            
            if(ReM <= 100){
              window.location.href="https://psjdcol-activity.mdbgo.io/mainHome.php";
            }else{
              alert("คุณไม่ได้อยู่ในพื้นที่เข้าแถวหน้าเสาธง กรุณาเช็คชื่อในบริเวณหน้าเสาธง");
              window.close();
            }      
          }
      </script>
  </body>
</html>