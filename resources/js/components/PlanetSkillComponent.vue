<template>
    <div class="planet-container">
        <div id="planet" class="planet d-flex justify-content-center flex-wrap col-12 col-sm-6 col-md-4 col-lg-3" ref="planet"></div>
    </div>
</template>

<script>
import * as THREE from 'three';

export default {
    name: 'PlanetSkillComponent',
    props: {
        width: {
            type: Number,
            default: 150
        },
        height: {
            type: Number,
            default: 150
        }
    },
    mounted() {
        this.createPlanet();
        window.addEventListener('resize', this.onResize); // Gestione ridimensionamento
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.onResize); // Pulizia dell'evento al distruggere il componente
    },
    methods: {
        createPlanet() {
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, this.width / this.height, 0.1, 1000);  // Calcolo corretto del rapporto d'aspetto
            const renderer = new THREE.WebGLRenderer({ alpha: true }); // Assicurati che il renderer sia trasparente
            renderer.setSize(this.width, this.height); // Imposta la dimensione dinamica
            document.getElementById('planet').appendChild(renderer.domElement);

            // Creiamo una geometria sferica (pianeta)
            const geometry = new THREE.SphereGeometry(1, 64, 64); // Maggiore risoluzione
            const textureLoader = new THREE.TextureLoader();
            const texture = textureLoader.load('/images/texture/eris.jpg'); // Sostituisci con il percorso della tua immagine del pianeta

            // Materiale del pianeta
            const material = new THREE.MeshStandardMaterial({
                map: texture,
                metalness: 0.5,
                roughness: 0.2,
            });

            const sphere = new THREE.Mesh(geometry, material);
            scene.add(sphere);

            // Luci
            const light = new THREE.PointLight(0xffffff, 1, 100);
            light.position.set(10, 10, 10);
            scene.add(light);

            const ambientLight = new THREE.AmbientLight(0x404040, 0.5);
            scene.add(ambientLight);

            const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
            directionalLight.position.set(10, 10, 10);
            scene.add(directionalLight);

            camera.position.z = 5;

            // Animazione per far ruotare il pianeta
            const animate = () => {
                requestAnimationFrame(animate);
                sphere.rotation.x += 0.01;
                sphere.rotation.y += 0.01;
                renderer.render(scene, camera);
            };

            animate();

            this.renderer = renderer;
            this.camera = camera;
            this.scene = scene;
        },
        onResize() {
            if (this.renderer && this.camera) {
                const width = this.$refs.planet.offsetWidth;
                const height = this.$refs.planet.offsetHeight;
                this.renderer.setSize(width, height);
                this.camera.aspect = width / height;
                this.camera.updateProjectionMatrix();
            }
        }
    }
}
</script>

<style scoped>
.planet-container {
    margin: 10px auto;
    width: 100%;
    height: 100%;
}

#planet {
    width: 100%;
    height: 100%;
    background-color: transparent;  /* Imposta il background trasparente */
}
</style>
