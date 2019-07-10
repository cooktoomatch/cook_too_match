const initIcon = async icon => {
    if (icon.width() > icon.height()) {
        icon.css({
            'position': 'absolute',
            'height': '100%',
            'width': 'auto',
            'transform': 'translateX(-50%)'
        });
    } else if (icon.width() < icon.height()) {
        icon.css({
            'position': 'absolute',
            'height': 'auto',
            'width': '100%',
            'transform': 'translate(-50%, -16%)'
        });
    } else {
        icon.css({'width': '100%'});
    }
};

const setIcon = async icon => {
    await initIcon(icon);
    icon.fadeIn();
}