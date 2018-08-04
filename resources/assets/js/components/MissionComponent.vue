<template>
    <div class="container">
        <div class="bloc">
            <div class="column is-three-quarters">
                <div class="bloc">
                    <h1>Votre proposition de mission</h1>
                    <h1>{{ users.nom }} {{ users.prenom }}</h1>
                    <figure class="image is-128x128">
                        <img class="is-rounded" :src="`${users.avatar}`" alt="">
                    </figure>

                    <p>{{users.adresse}}, {{users.ville}}</p>

                </div>

            </div>

            <div class="bloc">
                <h2>Durée de la mission</h2>
                <form >
                    <input
                            type="text"
                            id="datepicker-trigger"
                            placeholder="Choisir vos dates"
                            :value="formatDates(dateOne, dateTwo)"

                    >

                    <AirbnbStyleDatepicker
                            :trigger-element-id="'datepicker-trigger'"
                            :mode="'range'"
                            :fullscreen-mobile="true"
                            :date-one="dateOne"
                            :date-two="dateTwo"
                            @date-one-selected="val => { dateOne = val }"
                            @date-two-selected="val => { dateTwo = val }"
                            v-model="form.start_date"
                    />
                    <button class="button is-primary" v-on:click="saveForm()">Continuer</button>

                </form>
            </div>
        </div>
    </div>

</template>
<script>
	import format from 'date-fns/format'


	export default {
		data() {
			return {
				dateFormat: 'D MMM',
				dateOne: '',
				dateTwo: '',
				users: {
					id: '',
					nom: '',
					prenom: '',
					adresse: '',
					avatar: '',
					vile: '',
					lat: '',
					lng: '',
				},
				form: {
					from_id: '',
					to_id: '',
					start_date: '',
					end_data: ''
				},
				storeURL: `/api/mission`,
				error: {},
				isProcessing: false
			}
		},
		mounted() {
			this.created();
		},
		methods: {
			created() {
				let idUser = this.$route.params.id;
				axios.get('/api/user/' + idUser)
					.then((response) => {
						this.users = response.data.users;
					})
			},
			formatDates(dateOne, dateTwo) {
				let formattedDates = ''
				if (dateOne) {
					formattedDates = format(dateOne, this.dateFormat)
				}
				if (dateTwo) {
					formattedDates += ' - ' + format(dateTwo, this.dateFormat)
				}
				return formattedDates
			},

			saveForm() {
				event.preventDefault();

				axios.patch('/mission/' )
					.then(function (resp) {
						console.log(this.dateOne);
						this.$router.replace('/mission/');
					})
					.catch(function (resp) {
						console.log(resp);
						alert("Could not create your company");
					});
			}
		}

	}


</script>