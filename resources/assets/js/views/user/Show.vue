<template>
    <div class="container">
        <div class="box" >
            <div class="columns">
                <div class="column ">
                    <figure class="image is-128x128 ">
                        <img :src="`${users.avatar}`" alt="">
                    </figure>
                </div>

                    <div class="column is-three-quarters">

                        <h1>{{ users.nom }} {{ users.prenom }}</h1>


                        <p>{{users.adresse}}, {{users.ville}}</p>
                        <p>Disponible</p>

                        <router-link :to="{name: 'mission', params: {id: users.id}}" class="list-group-item d-flex justify-content-between align-items-center">
                            Envoyer un message
                        </router-link>
                        <!--<button class="button is-primary">Envoyer un message</button>-->

                    </div>

            </div>

        </div>
        <div class="box">
            <h2>Description</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci ducimus, fugit incidunt minima minus natus nobis provident! Aut autem, dicta dolorem iusto natus nemo qui quod reiciendis sed tenetur?</p>
        </div>

        <div class="box">
            <h2>Formations</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci ducimus, fugit incidunt minima minus natus nobis provident! Aut autem, dicta dolorem iusto natus nemo qui quod reiciendis sed tenetur?</p>
        </div>
        <div class="box">
            <h2>FORMATIONS</h2>


        </div>
        <div class="box">
            <h2>Avis et commentaires</h2>
        </div>

        <div class="box">
            <h2>Localisation</h2>


            <GmapMap
                    :center="center"
                    :zoom="5"

                    style="width: 100%; height: 300px"
                    icon="https://www.googl.dk/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png"
            >
                <gmap-info-window :options="infoOptions" :position="infoWindowPos" :opened="infoWinOpen"
                                  @closeclick="infoWinOpen=false">
                    {{infoContent}}
                </gmap-info-window>

                <GmapMarker
                        :key="index"
                        v-for="(m, index) in marker"
                        :position="m.position"
                        :clickable="true"
                        :draggable="true"
                        :icon="m.icon"
                        @click="toggleInfoWindow(m, index)"

                />
            </GmapMap>
        </div>
    </div>
</template>

<script>
	import axios from 'axios'
	import * as VueGoogleMaps from 'vue2-google-maps'



	export default {
		data() {
			return {

				users: {
					id:'',
					nom: '',
					prenom:'',
					adresse:'',
                    avatar:'',
                    vile:'',
                    lat:'',
                    lng:'',
				},
				center: {
					lat: 46.227638,
					lng: 2.213749000000007
				},
				infoWindowPos: {
					lat: 0,
					lng: 0
				},
				infoContent: '',
				infoWinOpen: false,
				currentMidx: null,
				//optional: offset infowindow so it visually sits nicely on top of our marker
				infoOptions: {
					pixelOffset: {
						width: 0,
						height: -35
					}
				},
				marker: [{
					position: {
						lat: '',
						lng: '',


					},
					icon: 'images/icon.png',
					infoText: '',
				},],
				infoPosition: null,
				infoContent: null,
				infoOpened: false,
				infoCurrentKey: null,

			}

		},
		mounted() {
			this.created();

		},


		methods: {
			created() {
				let idUser = this.$route.params.id;

				axios.get('/api/user/'+ idUser)
					.then((response) => {
						this.users = response.data.users;
						this.marker.push(
							{

								position: {
									lat: parseFloat(this.users.lat),
									lng: parseFloat(this.users.lng),


								},
								icon: 'images/icon.png',
								infoText: this.users.nom + this.users.prenom,

							});


					})


			},


		},

	}

</script>
