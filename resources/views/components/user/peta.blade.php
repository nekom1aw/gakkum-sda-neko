@verbatim
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css" />
<script src="https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>

<div wire:ignore style="width:100%; height:500px;"
x-data='{
    map: null,
    markerLayer: null,
    layerLevel1: null,
    layerLevel5: null,
    zoomCount: 0,
    maxZoomClick: 5,
    baseZoom: 4.5,

    initMap() {
        this.map = L.map(this.$el, {
            zoomControl: false,
            minZoom: 4,
            maxZoom: 20,
            maxBounds: [[-11, 95], [6.5, 141]],
            maxBoundsViscosity: 1.0,
            preferCanvas: true,
            zoomSnap: 0.5,
            zoomDelta: 0.5,
            scrollWheelZoom: false,
            doubleClickZoom: false,
            touchZoom: false,
            boxZoom: false,
            keyboard: false
        });

        this.map.setView([-2.5, 118], this.baseZoom);
        this.map.getContainer().style.background = "#93c5fd";

        this.map.on("click", () => this.zoomIn());

        const self = this;
        L.Control.CustomZoom = L.Control.extend({
            onAdd() {
                const div = L.DomUtil.create("div", "leaflet-bar leaflet-control");
                div.innerHTML = `
                    <a href="#" id="zoom-in"  style="font-size:18px; display:flex; align-items:center; justify-content:center; width:30px; height:30px;">+</a>
                    <a href="#" id="zoom-out" style="font-size:18px; display:flex; align-items:center; justify-content:center; width:30px; height:30px;">−</a>
                `;
                L.DomEvent.on(div.querySelector("#zoom-in"), "click", L.DomEvent.stop, this);
                L.DomEvent.on(div.querySelector("#zoom-in"), "click", () => self.zoomIn());
                L.DomEvent.on(div.querySelector("#zoom-out"), "click", L.DomEvent.stop, this);
                L.DomEvent.on(div.querySelector("#zoom-out"), "click", () => self.zoomOut());
                return div;
            }
        });
        new L.Control.CustomZoom({ position: "topleft" }).addTo(this.map);

        // WMS level 1
        this.layerLevel1 = L.tileLayer.wms(
            "https://aws.simontini.id/geoserver/proteus/wms",
            {
                layers: "proteus:POLITICAL_LEVEL_1_dissolved",
                format: "image/png",
                transparent: true,
                version: "1.1.1",
                styles: ""
            }
        ).addTo(this.map);

        // WMS level 5 (tersembunyi dulu)
        this.layerLevel5 = L.tileLayer.wms(
            "https://aws.simontini.id/geoserver/proteus/wms",
            {
                layers: "proteus:POLITICAL_LEVEL_5_v2_dissolved",
                format: "image/png",
                transparent: true,
                version: "1.1.1",
                styles: ""
            }
        );

        this.loadMarker();
        this.map.invalidateSize();
    },

    async loadMarker() {
        const pinIcon = L.icon({
            iconUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png",
            shadowUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png",
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        try {
            const res = await fetch("/get-data");
            if (!res.ok) return;

            const geojson = await res.json();

            if (this.markerLayer) {
                this.map.removeLayer(this.markerLayer);
            }

            this.markerLayer = L.markerClusterGroup({
                spiderfyOnMaxZoom: false,
                showCoverageOnHover: false,
                zoomToBoundsOnClick: true,
                disableClusteringAtZoom: 14
            });

            const geoLayer = L.geoJSON(geojson, {
                pointToLayer: (feature, latlng) => {
                    return L.marker(latlng, { icon: pinIcon });
                },
                onEachFeature: (feature, layer) => {
                    const p = feature.properties || {};

                    const html = [
                        "<div style=\"font-size:12px; line-height:1.4;\">",
                        "<div style=\"font-weight:bold; font-size:14px; margin-bottom:6px;\">" + (p.nama ?? "-") + "</div>",
                        "<hr style=\"margin:6px 0;\">",
                        "<div><b>Luas:</b> " + (p.luas ?? "-") + "</div>",
                        "<div><b>Pulau:</b> " + (p.level_2 ?? "-") + "</div>",
                        "<div><b>Provinsi:</b> " + (p.level_3 ?? "-") + "</div>",
                        "<div><b>Kecamatan:</b> " + (p.level_4 ?? "-") + "</div>",
                        "<div><b>Desa:</b> " + (p.level_5 ?? "-") + "</div>",
                        "<div style=\"margin-top:10px;\">" +
                            "<a href=\"https://google.com\" target=\"_blank\" rel=\"noopener noreferrer\" " +
                            "style=\"display:inline-block; padding:6px 10px; background:#2563eb; color:white; text-decoration:none;\">" +
                            "Informasi lebih lanjut</a>" +
                        "</div>",
                        "</div>"
                    ].join("");

                    layer.bindPopup(html);
                }
            });

            this.markerLayer.addLayer(geoLayer);
            this.map.addLayer(this.markerLayer);

        } catch(e) {
            console.log("gagal load marker");
        }
    },

    zoomIn() {
        if (this.zoomCount >= this.maxZoomClick) return;
        this.zoomCount++;
        this.map.setZoom(this.baseZoom + (this.zoomCount * 2));

        if (this.zoomCount >= 1 && !this.map.hasLayer(this.layerLevel5)) {
            this.map.addLayer(this.layerLevel5);
        }
    },

    zoomOut() {
        if (this.zoomCount <= 0) return;
        this.zoomCount--;
        this.map.setZoom(this.baseZoom + (this.zoomCount * 2));

        if (this.zoomCount < 1 && this.map.hasLayer(this.layerLevel5)) {
            this.map.removeLayer(this.layerLevel5);
        }
    }
}' x-init="initMap()"></div>
@endverbatim