function c(v) {
    console.log(v);
};

var isset = function (data) {
    if (data === "" || data === null || data === undefined) {
        return false;
    } else {
        return true;
    }
};

let users;

// user取得
async function getUsers() {
    await axios.get(`/jsonMap`)
        .then(res => {
            users = res.data;

            // c(users.cooks[0].image.image)
            setGeo();
        })
        .catch(e => {
            alert(e.response.data.errors.content);
        });
}

// google maps script コールバックで起動
function setGeo() {
    navigator.geolocation.getCurrentPosition(geoInit, geoError, geoConf);
}

// setGeo() で使用する関数
const geoInit = position => {
    let lat = position.coords.latitude;
    let lng = position.coords.longitude;

    // Map起動
    initMap(lat, lng);
};
const geoError = error => {
    let e = "";
    if (error.code == 1) e = "位置情報が許可されてません";
    if (error.code == 2) e = "現在位置を特定できません";
    if (error.code == 3) e = "位置情報を取得する前にタイムアウトになりました";
    alert("エラー：" + e);
};
const geoConf = {
    enableHighAccuracy: true,
    maximumAge: 20000,
    timeout: 15000
};

// Map起動の関数
function initMap(lat, lng) {
    let zoom = 12;
    let center = {
        lat: lat,
        lng: lng
    };

    // map生成
    const map = new google.maps.Map(document.getElementById('map'), {
        zoom: zoom,
        center: center
    });

    // 現在位置マーカー
    const currentPositionMarker = new google.maps.Marker({
        map: map,
        position: center
    });

    // ユーザーマーカー
    users.forEach(user => {
        const marker = new google.maps.Marker({
            map: map,
            position: {
                lat: user.latitude,
                lng: user.longitude
            },
            icon: {
                url: `storage/user_icon/${user.icon}`,
                size: new google.maps.Size(46, 46),
                scaledSize: new google.maps.Size(46, 46),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(0, 0),
            },
            animation: google.maps.Animation.DROP
        });

        let cookImages = "";
        user.cooks.forEach(cook => {

            // c(cook.image.image)

            cookImages += `<a href="cooks/show/${cook.id}">
                            <img src="storage/cook_image/${cook.image.image}" class="infoCookImg">
                            </a>`;
        });

        const info = `<div>
                      <a href="users/show/${user.id}" class="infoCookName">${user.name}</a>
                      <p class="infoCookCount">投稿数: ${user.cooks.length}</p>
                      ${cookImages}
                      </div>`;

        markerInfo(marker, info);
    });

    // info(吹き出し)の生成
    function markerInfo(marker, info) {
        google.maps.event.addListener(marker, 'mouseover', () => {
            new google.maps.InfoWindow({
                content: info
            }).open(marker.getMap(), marker);
        });
    };
};