jQuery('#usa').vectorMap({
    map: 'us_aea_en',
    backgroundColor: 'transparent',
    regionStyle: {
        initial: {
            fill: '#fc7242'
        }
    },
    markerStyle: {
        initial: {
            r: 9,
            'fill': '#fff',
            'fill-opacity': 1,
            'stroke': '#000',
            'stroke-width': 5,
            'stroke-opacity': 0.4
        },
    },
    enableZoom: true,
    hoverColor: '#0a89c1',
    markers: [{
        latLng: [21.00, 78.00],
        name: 'I Love My World'

      }],
    hoverOpacity: null,
    normalizeFunction: 'linear',
    scaleColors: ['#b6d6ff', '#005ace'],
    selectedColor: '#c9dfaf',
    selectedRegions: [],
    showTooltip: true,
    onRegionClick: function (element, code, region) {
        var message = 'You clicked "' +
            region +
            '" which has the code: ' +
            code.toUpperCase();

        alert(message);
    }
});