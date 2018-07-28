<template>
    <div class="container">
        <h1>hello</h1>
        <ul class="nav__left">

            <!-- Navigation Links -->
            <li><router-link to="/">Home</router-link></li>
            <li><router-link to="/cart">Cart</router-link></li>

        </ul>
        <router-view></router-view>
    </div>
</template>
<script type="text/javascript">
	export default {}
</script>