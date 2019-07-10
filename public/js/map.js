function c(v) {
    console.log(v);
};

const DISTANCE = 1000;
const TRAVEL_MODEL = 'WALKING';

let users;

// user取得
async function getUsers() {
    await axios.get(`/jsonMap`)
        .then(res => {
            users = res.data;
            setGeo();
        })
        .catch(e => {
            alert(e.response.data.errors.content);
        });
}

// cooks取得
async function getCooks(lat, lng) {
    const params = {
        'lat': lat,
        'lng': lng
    };
    await axios.get(`/jsonCooks`, {params: params})
        .then(res => {
            renderCooks(res.data);
        })
        .catch(e => {
            alert(e.response.data.errors.content);
        });
}

// cooks描画
function renderCooks(cooks) {
    $('#cooksArea').html(cooks);
}


// 距離と時間の取得
async function getDistance(lat, lng, user) {
    const service = new google.maps.DistanceMatrixService();
    const origin = new google.maps.LatLng(lat, lng);
    const destination = new google.maps.LatLng(user.latitude, user.longitude);
    const cooks = user.cooks;

    service.getDistanceMatrix({
        origins: [origin],
        destinations: [destination],
        travelMode: TRAVEL_MODEL,
    }, callback);

    function callback(response, status) {
        const distance = response.rows[0].elements[0].distance.text;
        const duration = response.rows[0].elements[0].duration.text;

        cooks.forEach(cook => {
            renderDistance(cook.id, distance, duration)
        });
    }
}

// 距離と時間のレンダリング
function renderDistance(cook_id, distance, duration) {
    $(`.distance-${cook_id}`).html(distance);
    $(`.duration-${cook_id}`).html(duration);
};

// google maps script コールバックで起動
function setGeo() {
    navigator.geolocation.getCurrentPosition(geoInit, geoError, geoConf);
}

// setGeo() で使用する関数
const geoInit = async position => {
    let lat = position.coords.latitude;
    let lng = position.coords.longitude;

    initMap(lat, lng); // Map起動

    await getCooks(lat, lng); // cooks取得
    
    users.forEach(user => {
        getDistance(lat, lng, user); // 距離取得
    });
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

        var origin = new google.maps.LatLng(lat, lng);
        var destination = new google.maps.LatLng(user.latitude, user.longitude);

        let cookImages = "";
        user.cooks.forEach(cook => {
            cookImages += `<a href="cooks/show/${cook.id}">
                            <img src="storage/cook_image/${cook.image}" class="infoCookImg">
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