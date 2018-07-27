<template>
    <div class="container">
        <h1>Hello</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque blanditiis, culpa doloremque dolores
            eius facere id impedit inventore minus necessitatibus odio, praesentium, quaerat similique voluptatum. Iste
            odio quae quam.


        </p>
        <h2> {{$route.params.id}}</h2>


        <h3>{{ user.nom }}</h3>


        {{ user.prenom }}


    </div>
</template>

<script>
	import axios from 'axios'

	export default {
		data() {
			return {
				user: [],

			}

		},
		mounted() {
			this.created();

		},

		methods: {
			created() {
                let idUser = this.$route.params.id;
                console.log(idUser);
				axios.get('/api/user/'+ idUser)
					.then((response) => {
						console.log(response);
						this.user = response.data;

					})
					.then(function (response) {
						console.log(response);
					})
					.catch(function (error) {
						console.log(error);
					});

			},


		},

	}

</script>
