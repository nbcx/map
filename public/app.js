//获取当前位置
function localpos(success) {
    var b = function() {
        var geolocation = new BMap.Geolocation();
        geolocation.getCurrentPosition(function(r){
            console.log(r.point)
            if(this.getStatus() == BMAP_STATUS_SUCCESS){
                success(r.point.lng,r.point.lat);
            }
            else {
                alert('failed' + this.getStatus());
            }
        },{enableHighAccuracy: true})
    }
    //兼容写法
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            success(position.coords.longitude,position.coords.latitude);
        },function (error) {
            console.log(error);
            b();
        });
    }
    else {b();}
}
$("[confirm]").click(function(e) {
    var msg= $(this).attr("confirm");
    if(confirm(msg)) {
        return true;
    }
    return false;
})