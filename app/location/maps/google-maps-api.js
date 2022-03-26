export function display_map(latitude, longitude, name) {
    let marker = new google.maps.Marker({
        map: new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: latitude,
                lng: longitude
            },
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }),
        animation: google.maps.Animation.DROP,
        position: {
            lat: latitude,
            lng: longitude
        },
        title: name
    });
    marker.addListener("click", function (){
        if (marker.getAnimation() !== null ? marker.setAnimation(null) : marker.setAnimation(google.maps.Animation.BOUNCE));
    });
}