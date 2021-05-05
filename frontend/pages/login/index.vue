<template>
  <div>
    <div class="form-header text-center p-2">
      <h2>Sign Up</h2>
    </div>
    <form @submit.prevent="submitForm" class="p-3">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" v-model="form.email" placeholder="email">
          </div>
        </div>

        <div class="col-md-12 col-sm-12">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" v-model="form.password" placeholder="password">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-success col-md-12 col-sm-12">Submit</button>
    </form>
  </div>
</template>

<script>

export default {
  name: "index",
  layout: 'authLayout',
  middleware: 'auth',
  data() {
    return {
      form: {
        email: 'r@email.com',
        password: '123456',
      },
      response: {}
    }
  },
  methods: {
    async submitForm() {
      try {
        let res = await this.$auth.loginWith('local', {data: this.form})
        console.log(res)
        if (res.data.success === true) {
          this.$bvToast.toast('Login successful', {
            title: 'Success',
            variant: 'success',
            solid: true
          })
          this.$auth.setUser(res.data.user)
          await this.$router.push('/user')
        } else {
          this.$bvToast.toast('Login error', {
            title: 'Error',
            variant: 'danger',
            solid: true
          })

          this.form = {}
        }
      } catch (err) {
        console.log(err)
      }
    }
  }
}
</script>

<style scoped>

</style>
