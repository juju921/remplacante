<template>

    <div class="panel panel-default columns is-mobile 	">
        <!--<router-view></router-view>-->
        <div class="columns">

            <div class="column">
                <div class="card-content column  is-half is-pulled-left	" v-for="user in users">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image is-48x48">
                                <img :src="`/images/${user.avatar}`" v-if="user.nom">
                            </figure>
                        </div>
                        <div class="media-content" v-on:mouseover="mouseOver(user)">
                            <p class="title is-4">{{user.nom}} {{user.prenom}}</p>
                            <p class="subtitle is-6">@johnsmith</p>
                        </div>
                    </div>

                    <div class="content">
                        Lorem ipsum dolor sit amet,

                        <!--<router-link  :to="1" class="button">Voir le profil-->
                        <!--</router-link>-->

                        <router-link class="btn btn-info btn-xs" v-bind:to="{name: 'user', params: {id: user.id}}"><i class="fa fa-eye" aria-hidden="true"></i> Show</router-link>




                        <br>

                    </div>
                </div>
            </div>
        </div>
        <div class="column is-half">
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
	import VueRouter from 'vue-router'

	export default {
		data() {
			return {
				users: [],
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
				// axios.get('/api/cities')
				//     .then(function(response) {
				//         //console.log(response.data);
				//         this.cities = response.data.cities
				//         console.log(this.users);
				//     });

				axios.get('/api/user')

					.then((res) => {
						this.users = res.data.users

						for (var i = 0; i < this.users.length; i++) {
							this.marker.push(
								{

									position: {
										lat: parseFloat(this.users[i].lat),
										lng: parseFloat(this.users[i].lng),


									},
									icon: 'images/icon.png',
									infoText: this.users[i].nom + this.users[i].prenom,

								});

						}

					})
			},
			// toggleInfo: function(marker, key) {
			// 	 //this.infoPosition = this.marker.position;
			// 	this.infoContent = marker.nom;
			// 	if (this.infoCurrentKey == key) {
			// 		this.infoOpened = !this.infoOpened;
			// 	} else {
			// 		this.infoOpened = true;
			// 		this.infoCurrentKey = key;
			// 	}
			// },
			toggleInfoWindow: function (marker, idx) {

				this.infoWindowPos = marker.position;
				this.infoContent = marker.infoText;

				//check if its the same marker that was selected if yes toggle
				if (this.currentMidx == idx) {
					this.infoWinOpen = !this.infoWinOpen;
				}
				//if different marker set infowindow to open and reset current marker index
				else {
					this.infoWinOpen = true;
					this.currentMidx = idx;
				}
			},

			mouseOver: function (user) {

				//console.log(user.nom);
			}


		},


	}


</script>