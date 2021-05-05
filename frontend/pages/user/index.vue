<template>
  <div>
    <nuxt-link to="/" class="btn btn-outline-info">Home</nuxt-link>
    <div class="row">
      <div class="col-4">Email : {{$auth.user.email}}</div>
      <div class="col-4">Country : {{$auth.user.country}}</div>
      <div class="col-4">Admin : {{$auth.user.is_admin ? 'Yes' : 'No'}}</div>
    </div>
    <button class="btn btn-danger" @click="loggedOut">Logout</button>
  </div>
</template>

<script>
export default {
  name: "index",
  middleware: 'auth',
  methods: {
    async loggedOut(){
      let res = this.$auth.logout()
      if (res.success === true){
        await this.$router.push('/login')
      }
    }
  }

}
</script>

<style scoped>

</style>
